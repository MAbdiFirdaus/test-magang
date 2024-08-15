<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employee extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'first_name'       => ['type' => 'varchar', 'constraint' => 100],
            'last_name'        => ['type' => 'varchar', 'constraint' => 100],
            'address'          => ['type' => 'text', 'null' => true],
            'phone_number'     => ['type' => 'varchar', 'constraint' => 20],
            'email'            => ['type' => 'varchar', 'constraint' => 100],
            'job_title'        => ['type' => 'varchar', 'constraint' => 100],
            'department'       => ['type' => 'varchar', 'constraint' => 100],
            'hire_date'        => ['type' => 'date'],
            'salary'           => ['type' => 'decimal', 'constraint' => '15,2'],
            'allowances'       => ['type' => 'decimal', 'constraint' => '15,2', 'null' => true],
            'deductions'       => ['type' => 'decimal', 'constraint' => '15,2', 'null' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);
    
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('employees', true);
    }
    
    public function down()
    {
        $this->forge->dropTable('employees',true);
    }
}
