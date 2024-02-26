<?php 

namespace App\Controllers;
use App\Models\AccountModel;

class Login extends BaseController {
    public function index($error = 0)
    {
        $data = [
            'title' => 'Login',
            'error' => $error
        ];

        return view('templates/header', $data)
                .view('v_login', $data)
                .view('templates/footer');
    }

    public function registerForm()
    {
        $data = [
            'title' => 'Register',
        ];

        return view('templates/header', $data)
                .view('v_register')
                .view('templates/footer');
    }

    public function challengeResponse()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($username == '')
        {
            return redirect()->to("/login?e=1"); // Nickname Vuoto
        }
        if ($password == '')
        {
            return redirect()->to("/login?e=2"); // Password Vuota
        }

        $model = model(AccountModel::class);
        $accountData = $model->checkNickPass($username, $password);

        if(!$accountData['status']) // esegui se status == false
        {
            return redirect()->to("/login?e=3"); // Login Errato
        }

        $session = session();
        $session->active = $accountData['status'];
        $session->userId = $accountData['userId'];

        return redirect()->to("/");
    }

    public function register()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($username == '' or $password == '')
        {
            return redirect()->to("/register"); // todo: Inserire cose con il get per mostrare dov'è il login è in errore (eg. username vuoto)
        }

        $model = model(AccountModel::class);
        $status = $model->registerNewUser($username, $password);

        if(!$status) // esegui se status == false
        {
            return redirect()->to("/register"); // todo: Inserire cose con il get per mostrare che il username è giò stato registrato e di sceglienerne un'altro
        }

        return redirect()->to("login"); // todo: Inserire cose con il get per indicare di loggarsi
    }

    public function logout()
    {
        $session = session();
        $session->active = false;
        return redirect()->to("/");
    }
}