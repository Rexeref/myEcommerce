<?php

namespace App\Models;
use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = 'utenti';

    public function getList()
    {
        return $this->findAll();
    }

    public function isNickUnique($value)
    {
        return $this->db->table('utenti')->where('username', $value)->countAllResults() ==  0;
    }

    public function registerNewUser($nickname, $password)
    {

        $data = [
            "username" => hash('sha256', $nickname),
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "id_ruolo" => 3,
        ];

        $status = false;

        if( $this->isNickUnique($data['username']) )
        {
            $this->db->table('utenti')->insert($data);
            $status = true;
        }

        return $status;
    }

    public function checkNickPass(string $nickname, string $password): array
    {

        $nicknameHash = hash('sha256', $nickname);

        $account = $this->table('utenti')->where('username', $nicknameHash)->first();

        $data = [
            'status' => false,
            'userId' =>  0,
            'username' => null,
        ];

        if ( isset($account) && password_verify($password, $account['password'])) { 
            $data['status'] = true;
            $data['userId'] = $account['id'];
            $data['username'] = $nickname;
        }

        return $data;
    }

}