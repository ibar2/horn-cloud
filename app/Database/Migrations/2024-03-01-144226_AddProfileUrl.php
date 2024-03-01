<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProfileUrl extends Migration
{
    public function up()
    {
        $this->forge->addColumn('user', [
            'profile_url' => [
                'type' => 'VARCHAR',
                'constraint' => '256'
            ]
            ]);
    }

    public function down()
    {
        //
    }
}
