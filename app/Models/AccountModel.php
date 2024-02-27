<?php

namespace App\Models;
use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = 'utenti';

    # Autore Funzione: Scott Arciszewski
    private function random_str(
        int $length = 64,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }

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
        $salt = $this->random_str();

        $data = [
            "salt" => $salt,
            "username" => hash('sha256', $nickname),
            "password" => password_hash($password . $salt, PASSWORD_DEFAULT),
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
            'status' => 'false',
            'userId' =>  0
        ];

        if ($account && password_verify(password_hash($password . $account['salt'], PASSWORD_DEFAULT), $account['password'])) {
            $data['status'] = 'true';
            $data['userId'] = $account['id'];
        }

        return $data;
    }

}