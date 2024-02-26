<?php 

namespace App\Controllers;
use App\Models\m_Account;

class c_Login extends BaseController {
    public function index()
    {
        $model = model(Account::class);

        $data = [
            'accounts'  => $model->getList(),
            'title' => 'Login',
        ];

        return view('templates/header', $data)
                .view('v_login', $data)
                .view('templates/footer');
    }
}