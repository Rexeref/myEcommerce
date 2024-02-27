<?php 

namespace App\Models;
use CodeIgniter\Model;

class ProdottiModel extends Model
{
    protected $table = 'prodotti';

    public function getProdotti()
    {
        $result = $this->db->table('prodotti')->join('oggetti', 'prodotti.id = oggetti.id_prodotto')->where('prodotti.id_prodotto', null)->get();
        return $result->getResult();
    }

    public function getProdotto($value)
    {
        $result = $this->db->table('prodotti')->where('id', $value)->get();
        return $result->getResult();
    }
}