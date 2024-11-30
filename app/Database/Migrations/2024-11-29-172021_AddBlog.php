<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBlog extends Migration
{
    public function up()
    {
        $fields = [
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title'             => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug'              => ['type' => 'VARCHAR', 'constraint' => 255],
            'content'           => ['type' => 'MEDIUMTEXT'],
            'images'            => ['type' => 'VARCHAR', 'constraint' => 255],
            'description'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'featured'          => ['type' => 'INT', 'constraint' => 8],
            'highlight'         => ['type' => 'INT', 'constraint' => 8],
            'created_at'        => ['type' => 'DATETIME'],
            'updated_at'        => ['type' => 'DATETIME'],
            'deleted_at'        => ['type' => 'DATETIME', 'null' => true],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('blog', true);
    }
    
    public function down()
    {
        $this->forge->dropTable('blog');
    }
}