<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminTable extends Migration
{
    public function up()
    {
        $fields = [
            "id" => [
                "type"=> "INT",
                "unsigned"=> true,
                "auto_increment"=> true,
            ],
            "name" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
            ],
            "email" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
            ],
            "password" => [
                "type"=> "TEXT",
            ]
        ];
        $this->forge->addKey('id', true);
        $this->forge->addKey('email', false, true); // Uniqe Key
        $this->forge->addField($fields);
        $this->forge->createTable('admins', true); //If NOT EXISTS create table products
    }

    public function down()
    {
        $this->forge->dropTable('admins', true); //If Exists drop table products
    }
}
