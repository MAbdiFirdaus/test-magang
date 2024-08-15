<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PerformanceReviews extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'employee_id'   => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'review_period' => ['type' => 'varchar', 'constraint' => 50],
            'score'         => ['type' => 'int', 'constraint' => 11],
            'comments'      => ['type' => 'text', 'null' => true],
            'reviewed_by'   => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'created_at'    => ['type' => 'datetime', 'null' => true],
            'updated_at'    => ['type' => 'datetime', 'null' => true],
        ]);
    
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('employee_id', 'employees', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('reviewed_by', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('performance_reviews', true);
    }
    

    public function down()
    {
        $this->forge->dropTable('performance_reviews',true);
    }
}
