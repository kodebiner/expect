<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddGallery extends Migration
{
    public function up()
    {
        $fields = [
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'image'             => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'        => ['type' => 'DATETIME'],
            'updated_at'        => ['type' => 'DATETIME'],
            'deleted_at'        => ['type' => 'DATETIME', 'null' => true],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('gallery', true);
    }

    public function down()
    {
        $this->forge->dropTable('gallery');
    }
}
