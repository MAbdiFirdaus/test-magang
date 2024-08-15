<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Payroll extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'employee_id'   => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'pay_period'    => ['type' => 'varchar', 'constraint' => 50],
            'basic_salary'  => ['type' => 'decimal', 'constraint' => '15,2'],
            'allowances'    => ['type' => 'decimal', 'constraint' => '15,2', 'null' => true],
            'deductions'    => ['type' => 'decimal', 'constraint' => '15,2', 'null' => true],
            'net_salary'    => ['type' => 'decimal', 'constraint' => '15,2'],
            'generated_at'  => ['type' => 'datetime', 'null' => true],
            'paid_at'       => ['type' => 'datetime', 'null' => true],
            'created_at'    => ['type' => 'datetime', 'null' => true],
            'updated_at'    => ['type' => 'datetime', 'null' => true],
        ]);
    
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('employee_id', 'employees', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('payroll', true);
    }
    

    public function down()
    {
        $this->forge->dropTable('payroll',true);
    }
}
