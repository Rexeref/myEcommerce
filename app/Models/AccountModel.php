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
        return $this->db->table($this->table)->where('nickname', $value)->countAllResults() ==  0;
    }

    public function registerNewUser($nickname, $password)
    {
        $salt = random_string(16);

        $data = [
            "salt" => $salt,
            "nickname" => hash('sha256', $nickname . $salt),
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ];

        $status = false;

        if( $this->isNickUnique($data['nickname']) )
        {
            $this->db->table('utenti')->insert($data);
            $status = true;
        }

        return $status;
    }

    public function checkNickPass(string $nickname, string $password): array
    {
        $nicknameHash = hash('sha256', $nickname);

        $account = $this->table('utenti')->where('nickname', $nicknameHash)->first();

        $data = [
            'status' => 'false',
            'userId' =>  0
        ];

        if ($account && password_verify($password, $account['password'])) {
            $data['status'] = 'true';
            $data['userId'] = $account['id'];
        }

        return $data;
    }

}