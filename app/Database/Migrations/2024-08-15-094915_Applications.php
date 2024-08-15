<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Applications extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'job_opening_id'   => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'applicant_name'   => ['type' => 'varchar', 'constraint' => 255],
            'applicant_email'  => ['type' => 'varchar', 'constraint' => 255],
            'resume'           => ['type' => 'text', 'null' => true],
            'status'           => ['type' => 'enum', 'constraint' => ['Pending', 'Interview', 'Rejected', 'Hired']],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
        ]);
    
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('job_opening_id', 'job_openings', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('applications', true);
    }
    

    public function down()
    {
        $this->forge->dropTable('applications',true);
    }
}
