<?php 

namespace App\Controllers;
use App\Models\ProdottiModel;

class Prodotti extends BaseController {
    public function listAll()
    {
        $model = model(ProdottiModel::class);

        $data = [
            'prodotti'  => $model->getProdotti(),
            'title' => 'Prodotti',
        ];

        return view('templates/header', $data)
                .view('v_list', $data)
                .view('templates/footer');
    }

    public function listBest()
    {
        $model = model(ProdottiModel::class);

        $data = [
            'prodotti'  => $model->getMigliori(),
            'title' => 'Prodotti',
        ];

        return view('templates/header', $data)
                .view('v_list', $data)
                .view('templates/footer');
    }

    public function details()
    {
        $model = model(ProdottiModel::class);
    
        $id = $this->request->getGet('id');
    
        $item = $model->getProdottoConTuttiOggetti($id);
    
        if (!is_null($item) && isset($item[0])) {
            $data = [
                'oggetti' => $item,
                'title'   => $item[0]->nome,
            ];
    
            return view('templates/header', $data)
                 . view('v_product', $data)
                 . view('templates/footer');
        } else {
            return redirect()->to("/");
        }
    }
    
}