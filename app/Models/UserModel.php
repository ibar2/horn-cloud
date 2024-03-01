<?php

namespace App\Models;

class UserModel extends \CodeIgniter\Model {
    protected $table = 'user';
    protected $allowedFields = ['username', 'password', 'email', 'hash_activate', 'is_active',
'profile_url'];
    protected $returnType = 'App\Entities\User';

    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[user.email]',
        'username' => 'required|min_length[3]',
        'password' => 'required|min_length[3]',
        'password_confirm' => 'matches[password]'

    ];
    protected $validationMessages = [
        'password_confirm' => [
            'matches' => "the password doesn't match"
        ],
        'email' => [
            'is_unique' => 'the email exists'
        ]

    ];
    protected $beforeInsert = ['hashPassword'];
    
    protected function hashPassword(array $data){
        if (isset($data['data']['password'])){
            $data['data']['hash_password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

            unset($data['data']['password']);
        }
        return $data;
    }
}