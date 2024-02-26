<?php 

namespace App\Models;
use CodeIgniter\Model;

class Prodotti extends Model
{
    protected $table = 'prodotti';

    public function getProdotti()
    {
        $result = $this->db->table('prodotti')->join('oggetti', 'prodotti.id = oggetti.id_prodotto')->get();
        return $result->getResult();
    }
}