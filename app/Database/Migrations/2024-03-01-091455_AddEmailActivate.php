<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEmailActivate extends Migration
{
    public function up()
    {
        $this->forge->addColumn('user', [
            'email' => [
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => 255
            ],
            'hash_activate' => [
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => 255
            ],
            'is_active' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'default' => false
            ]
            ]);
    }

    public function down()
    {
        //
    }
}
