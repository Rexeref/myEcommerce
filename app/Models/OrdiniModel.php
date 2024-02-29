<?php

namespace App\Models;
use CodeIgniter\Model;

class OrdiniModel extends Model
{
    protected $table = 'ordini';

    private function createCarrello()
    {
        $session = session();
        if(!$this->hasACarrello())
        {
            $sql = "INSERT INTO ordini (id_utente, carrello) VALUES
            (?, 1)
            ";
            $binds = [$session->userId];
            $this->db->query($sql, $binds);
        }
    }

    private function hasACarrello()
    {
        $session = session();
        $sql = "SELECT *
        FROM ordini
        WHERE id_utente = ? AND carrello = 1";
        $binds = [$session->userId];
        
        $result = $this->db->query($sql, $binds);
    
        return ($result->getNumRows() > 0);
    }    

    public function getCarrello()
    {   
        $this->createCarrello();
        $session = session();
        $sql = "SELECT *, oggetti.id AS id_oggetto
        FROM ordini
        INNER JOIN oggetti ON (oggetti.id_ordine = ordini.id)
        INNER JOIN prodotti ON (prodotti.id = oggetti.id_prodotto)
        WHERE ordini.id_utente = ? AND ordini.carrello = 1
        ";
        $binds = [$session->userId];
        return $this->db->query($sql, $binds)->getResult();
    }

    public function addOggettoToCart($id)
    {
        $sql ="UPDATE oggetti 
        SET id_ordine = (
            SELECT ordini.id
            FROM ordini
            WHERE id_utente = ? AND carrello = 1
        )
        WHERE  id = ?;
        ";

        $session = session();
        $binds = [$session->userId, $id];
        $this->db->query($sql, $binds);
    }

    public function removeOggettoFromCart($id)
    {
        $session = session();
        
        $sql = "SELECT ordini.id_utente
                FROM oggetti
                INNER JOIN ordini ON oggetti.id_ordine = ordini.id
                WHERE oggetti.id = ?";
        
        $binds = [$id];
        $getter = $this->db->query($sql, $binds);
        $result = $getter->getResult();
    
        if (!empty($result) && $session->userId == $result[0]->id_utente) {
            $updateSql = "UPDATE oggetti 
                          SET id_ordine = NULL
                          WHERE  id = ?";
            
            $this->db->query($updateSql, $binds);
        }
    }
    

    public function carrelloToOrder()
    {
        $session = session();
        $sql = "UPDATE ordini
        SET ordini.carrello = 0
        WHERE id_utente = ? AND carrello = 1
        ";
        $binds = [$session->userId];
        $this->db->query($sql, $binds);
        $this->createCarrello();
    }

}