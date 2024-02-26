<?php

namespace App\Models;
use CodeIgniter\Model;

class Account extends Model
{
    protected $table = 'utenti';

    public function getList()
    {
        return $this->findAll();
    }
}