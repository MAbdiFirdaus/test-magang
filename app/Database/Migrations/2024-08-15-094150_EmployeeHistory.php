<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EmployeeHistory extends Migration
{
    public function up()
{
    $this->forge->addField([
        'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
        'employee_id'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
        'field_changed'    => ['type' => 'varchar', 'constraint' => 100],
        'old_value'        => ['type' => 'text'],
        'new_value'        => ['type' => 'text'],
        'changed_by'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
        'changed_at'       => ['type' => 'datetime', 'null' => true],
    ]);

    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('employee_id', 'employees', 'id', 'CASCADE', 'CASCADE');
    $this->forge->addForeignKey('changed_by', 'users', 'id', 'CASCADE', 'CASCADE');
    $this->forge->createTable('employee_history', true);
}


    public function down()
    {
        $this->forge->dropTable('employee_history',true);
    }
}
