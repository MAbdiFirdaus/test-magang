<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JobOpenings extends Migration
{
    public function up()
{
    $this->forge->addField([
        'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
        'title'            => ['type' => 'varchar', 'constraint' => 255],
        'description'      => ['type' => 'text'],
        'requirements'     => ['type' => 'text'],
        'department'       => ['type' => 'varchar', 'constraint' => 100],
        'location'         => ['type' => 'varchar', 'constraint' => 255],
        'status'           => ['type' => 'enum', 'constraint' => ['Open', 'Closed']],
        'created_at'       => ['type' => 'datetime', 'null' => true],
        'updated_at'       => ['type' => 'datetime', 'null' => true],
    ]);

    $this->forge->addKey('id', true);
    $this->forge->createTable('job_openings', true);
}


    public function down()
    {
        $this->forge->dropTable('job_openings',true);
    }
}
