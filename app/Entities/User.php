<?php

namespace App\Entities;

class User extends \CodeIgniter\Entity {

    public function hash_save(){
        $token = bin2hex(random_bytes(16));
        $hash = hash_hmac('sha256', $token, 'SJuK4kjDzBwzQdz6uDg68D939Yl3zbzX' );
        $this->token = $token;
        $this->hash_activate = $hash;
    }
}