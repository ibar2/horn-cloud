<?php

namespace App\Models;

class TaskModel extends \CodeIgniter\Model {
    protected $table = 'task';
    protected $allowedFields = ['descripsion', 'user_id'];
    protected $validationRules = [
        'descripsion' => 'required'
    ];

    protected $validationMessages = [
        'descripsion' => [
            'required' => "the descripsion field should not be empty"
        ]
        ];
}
