<?php

namespace App\Models;
use CodeIgniter\Model;

class OggettiModel extends Model
{
    protected $table = 'oggetti';

    public function getOggetti()
    {
        return $this->findAll();
    }
}