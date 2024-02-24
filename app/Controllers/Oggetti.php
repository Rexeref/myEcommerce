<?php 

namespace App\Controllers;
use App\Models\OggettiModel;

class Oggetti extends BaseController {
    public function index()
    {
        $model = model(OggettiModel::class);

        $data = [
            'oggetti'  => $model->getOggetti(),
            'title' => 'Prodotti',
        ];

        return view('list', $data);
    }
}