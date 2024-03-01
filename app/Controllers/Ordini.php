<?php 

namespace App\Controllers;
use App\Models\OrdiniModel;

class Ordini extends BaseController {

    private function checkIfLogged()
    {
        $session = session();
        if (empty($session->active) || $session->active == false){
            return redirect()->to("login");
        }
    }

    public function seeCarrello()
    {
        $this->checkIfLogged();
        $model = model(OrdiniModel::class);

        $data = [
            'title' => 'Carrello',
            'oggetti' => $model->getCarrello(),
            'ordini' => $model->getOrdini()
        ];

        return view('templates/header', $data)
                .view('v_cart', $data)
                .view('v_orders', $data)
                .view('templates/footer');
    }

    public function addOggettoToCart() // TODO: Fare in modo che non basti essere loggati per mandare la query nella barra di ricerca e cancellare dal carrello di qualcun'altro un oggetto
    {
        $this->checkIfLogged();
        $model = model(OrdiniModel::class);

        $model->addOggettoToCart($this->request->getGet("id"));
        return redirect()->to("/");
    }

    public function removeOggettoFromCart() // TODO: Fare in modo che non basti essere loggati per mandare la query nella barra di ricerca e cancellare dal carrello di qualcun'altro un oggetto
    {
        $this->checkIfLogged();
        $model = model(OrdiniModel::class);

        $model->removeOggettoFromCart($this->request->getGet("id"));
        return redirect()->to("cart");
    }

    public function carrelloToOrder()
    {
        $this->checkIfLogged();
        $model = model(OrdiniModel::class);
        $model->carrelloToOrder();
        return redirect()->to("cart");
    }

}