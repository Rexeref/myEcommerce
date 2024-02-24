<?php 

namespace App\Controllers;
use App\Models\ProdottiModel;

class Prodotti extends BaseController {
    public function index()
    {
        $model = model(ProdottiModel::class);

        $data = [
            'prodotti'  => $model->getProdotti(),
            'title' => 'Prodotti',
        ];

        return view('list', $data);
    }
}