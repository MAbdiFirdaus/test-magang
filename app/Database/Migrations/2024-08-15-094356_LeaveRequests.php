<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LeaveRequests extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'employee_id'   => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'leave_type'    => ['type' => 'enum', 'constraint' => ['Annual', 'Sick', 'Maternity', 'Paternity', 'Unpaid']],
            'start_date'    => ['type' => 'date'],
            'end_date'      => ['type' => 'date'],
            'reason'        => ['type' => 'text', 'null' => true],
            'status'        => ['type' => 'enum', 'constraint' => ['Pending', 'Approved', 'Rejected']],
            'approved_by'   => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'approved_at'   => ['type' => 'datetime', 'null' => true],
            'created_at'    => ['type' => 'datetime', 'null' => true],
            'updated_at'    => ['type' => 'datetime', 'null' => true],
        ]);
    
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('employee_id', 'employees', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('approved_by', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('leave_requests', true);
    }
    

    public function down()
    {
        $this->forge->dropTable('leave_requests',true);
    }
}
