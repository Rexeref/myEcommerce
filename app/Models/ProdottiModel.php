<?php

namespace App\Models;
use CodeIgniter\Model;

class ProdottiModel extends Model
{
    protected $table = 'prodotti';

    public function getProdottiOggetti()
    {   
        $result = $this->db->query("SELECT *
        FROM prodotti
        INNER JOIN oggetti ON(oggetti.id_prodotto = prodotti.id)
        ");
        return $result->getResult();
    }

    public function getMigliori()
    {   
        // Prende un prodotto per
        $sql = "SELECT *
        FROM (
            SELECT
                prodotti.*,
                oggetti.sconto,
                oggetti.id as id_oggetto,
                ROW_NUMBER() OVER (PARTITION BY prodotti.id ORDER BY oggetti.sconto DESC) AS rn
            FROM prodotti
            JOIN oggetti ON prodotti.id = oggetti.id_prodotto
            WHERE id_ordine IS NULL
        ) AS subquery
        WHERE rn = 1;
        ";

        $result = $this->db->query($sql, null);
        return $result->getResult();
    }

    public function cerca($ricerca)
    {   
        // Prende un prodotto per
        $sql = "SELECT *
        FROM (
            SELECT
                prodotti.*,
                oggetti.sconto,
                oggetti.id as id_oggetto,
                ROW_NUMBER() OVER (PARTITION BY prodotti.id ORDER BY oggetti.sconto DESC) AS rn
            FROM prodotti
            JOIN oggetti ON prodotti.id = oggetti.id_prodotto
            WHERE id_ordine IS NULL AND nome LIKE ?
        ) AS subquery
        WHERE rn = 1;
        ";
        $binds = ["%" . $ricerca . "%"];
        $result = $this->db->query($sql, $binds);
        return $result->getResult();
    }

    public function getProdotto($value)
    {
        $result = $this->db->table('prodotti')->where('id', $value)->get();
        return $result->getResult();
    }

    public function getProdottoConTuttiOggetti($value)
    {
        $sql = "SELECT *
        FROM prodotti
        INNER JOIN oggetti ON (prodotti.id = oggetti.id_prodotto)
        WHERE prodotti.id = ? AND oggetti.id_ordine IS NULL";
        $binds = [$value];

        $result = $this->db->query($sql, $binds);
        return $result->getResult();
    }

    public function getCategorie()
    {
        $sql = "SELECT * FROM categorie";
        $result = $this->db->query($sql, null);
        return $result->getResult();
    }

    public function insertNewProduct($product)
    {
        $sql = "INSERT INTO prodotti (nome, descrizione, prezzo, id_categoria, immagine, id_prodotto)
        VALUES
        (?, ?, ?, ?, ?, ?)
        ";
        $binds = [$product->nome, $product->descrizione, $product->prezzo, $product->id_categoria, is_null($product->immagine) ? "noimage.jpg" : $product->immagine, $product->id_accessorio];
        $result = $this->db->query($sql, $binds);
        //// Pur di farlo funzionare
        $sql = "INSERT INTO oggetti (id_prodotto)
        SELECT MAX(id) FROM prodotti;
        ";
        $result = $this->db->query($sql, null);
        ////
        return;
    }
}