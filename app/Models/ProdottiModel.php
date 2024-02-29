<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdottiModel extends Model
{
    protected $table = 'prodotti';

    public function getProdotti()
    {   
        // Prende un prodotto per
        $result = $this->db->query("SELECT *
        FROM (
            SELECT
                prodotti.*,
                oggetti.sconto,
                ROW_NUMBER() OVER (PARTITION BY prodotti.id ORDER BY oggetti.sconto) AS rn
            FROM prodotti
            JOIN oggetti ON prodotti.id = oggetti.id_prodotto
        ) AS subquery
        WHERE rn = 1;
        ");
        return $result->getResult();
    }

    public function getProdotto($value)
    {
        $result = $this->db->table('prodotti')->where('id', $value)->get();
        return $result->getResult();
    }
}