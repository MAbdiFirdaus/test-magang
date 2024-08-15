<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Attendance extends Migration
{
    public function up()
{
    $this->forge->addField([
        'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
        'employee_id'   => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
        'date'          => ['type' => 'date'],
        'status'        => ['type' => 'enum', 'constraint' => ['Present', 'Absent', 'Leave', 'Late', 'Sick']],
        'check_in_time' => ['type' => 'time', 'null' => true],
        'check_out_time'=> ['type' => 'time', 'null' => true],
        'created_at'    => ['type' => 'datetime', 'null' => true],
        'updated_at'    => ['type' => 'datetime', 'null' => true],
    ]);

    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('employee_id', 'employees', 'id', 'CASCADE', 'CASCADE');
    $this->forge->createTable('attendance', true);
}


    public function down()
    {
        $this->forge->dropTable('attendance',true);
    }
}
