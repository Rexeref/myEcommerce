<?php 

namespace App\Controllers;
use App\Models\m_Account;

class Login extends BaseController {
    public function index()
    {
        $data = [
            'title' => 'Login',
        ];

        return view('templates/header', $data)
                .view('v_login')
                .view('templates/footer');
    }

    public function challengeResponse()
    {
        $nickname = $this->request->getPost('nickname');
        $password = $this->request->getPost('password');

        if ($nickname == '' or $password == '')
        {
            return redirect()->redirect("/login"); // TODO: Inserire cose con il get per mostrare dov'è il login è in errore (eg. nickname vuoto)
        }

        $model = model(m_Account::class);
        $accounts = $model->getList();

        echo("il tuo nickname:" . $nickname);
    }
}