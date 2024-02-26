<?php 

namespace App\Controllers;
use App\Models\m_Prodotti;

class Prodotti extends BaseController {
    public function index()
    {
        $model = model(m_Prodotti::class);

        $data = [
            'prodotti'  => $model->getProdotti(),
            'title' => 'Prodotti',
        ];

        return view('templates/header', $data)
                .view('v_list', $data)
                .view('templates/footer');
    }
}