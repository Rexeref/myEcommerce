<?php

namespace App\Controllers;

use App\Models\ProdottiModel;

class Prodotti extends BaseController
{
    public function listAll()
    {
        $model = model(ProdottiModel::class);

        $data = [
            'prodotti' => $model->getProdotti(),
            'title' => 'Prodotti',
        ];

        return view('templates/header', $data)
            . view('v_list', $data)
            . view('templates/footer');
    }

    public function search()
    {
        $model = model(ProdottiModel::class);

        $data = [
            'prodotti' => $model->cerca($this->request->getGet("search")),
            'title' => 'Prodotti',
        ];

        return view('templates/header', $data)
            . view('v_list', $data)
            . view('templates/footer');
    }

    public function listBest()
    {
        $model = model(ProdottiModel::class);

        $data = [
            'prodotti' => $model->getMigliori(),
            'title' => 'Prodotti',
        ];

        return view('templates/header', $data)
            . view('v_list', $data)
            . view('templates/footer');
    }

    public function details()
    {
        $model = model(ProdottiModel::class);

        $id = $this->request->getGet('id');

        $item = $model->getProdottoConTuttiOggetti($id);

        if (!is_null($item) && isset($item[0])) {
            $data = [
                'oggetti' => $item,
                'title' => $item[0]->nome,
            ];

            return view('templates/header', $data)
                . view('v_product', $data)
                . view('templates/footer');
        } else {
            return redirect()->to("/");
        }
    }

    public function modifyProduct()
    {
        $session = session();
        if ($session->livello > 4) {
            $model = model(ProdottiModel::class);
            $id = $this->request->getGet('id');

            $data = [
                'title' => "Modifica Prodotto",
                'prodotto_singolo' => $model->getProdottoConTuttiOggetti($id),
                'categorie' => $model->getCategorie(),
                'prodotti' => $model->getProdottiOggetti()
            ];

            return view('templates/header', $data)
                . view('special/v_modProduct', $data)
                . view('templates/footer');
        } else {
            return redirect()->to("/");
        }

    }

    public function addProduct()
    {
        $session = session();
        if ($session->livello > 4) {
            $model = model(ProdottiModel::class);
            $data = [
                'title' => "Nuovo Prodotto",
                'categorie' => $model->getCategorie(),
                'prodotti' => $model->getProdottiOggetti()
            ];

            return view('templates/header', $data)
                . view('special/v_newProduct', $data)
                . view('templates/footer');
        } else {
            return redirect()->to("/");
        }

    }

    public function addProductConfirm()
    {
        $session = session();
        if ($session->livello > 4) {
            $imageFile = $this->request->getFile('image');
            $newName = null;
            if ($imageFile && !$imageFile->hasMoved()) {
                $newName = $imageFile->getRandomName();
                $imageFile->move(ROOTPATH . 'public/uploads', $newName);
            }

            $model = model(ProdottiModel::class);
            $product = (object) [
                'nome' => $this->request->getPost('nome'),
                'descrizione' => $this->request->getPost('descrizione'),
                'prezzo' => $this->request->getPost('prezzo'),
                'id_categoria' => $this->request->getPost('id_categoria'),
                'immagine' => $newName,
                'id_accessorio' => $this->request->getPost('id_accessorio'),
            ];
            $error = $model->insertNewProduct($product);
        }

        return redirect()->to("/");

    }


}