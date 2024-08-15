<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AttendanceModel;
use Myth\Auth\Models\UserModel; 
use App\Models\EmployeesModel;
use App\Models\LeaveRequestsModel;
class AttendanceController extends BaseController
{
    protected $db;

    public function __construct()
    {
        // Inisialisasi database
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        // Load the Attendance model
        $attendanceModel = new AttendanceModel();
        
        // Query to get attendance data with employee names
        $data['attendance'] = $attendanceModel->join('employees', 'employees.id = attendance.employee_id') // Ganti 'attendance.employee_id' dengan nama kolom yang sesuai
                                              ->select('attendance.*, employees.first_name, employees.last_name')
                                              ->findAll();
        
        $data['leave_requests'] = $this->db->table('leave_requests')
                                              ->select('leave_requests.*, employees.first_name, employees.last_name')
                                              ->join('employees', 'employees.id = leave_requests.employee_id') // Gantilah user_id dengan employee_id atau kolom yang sesuai
                                              ->get()
                                              ->getResultArray();
        
        // Load the view with attendance and leave requests data
        return view('attendance/index', $data);
    }

    public function create()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        return view('attendance/create', $data);
    }

    public function store()
    {
        $attendanceModel = new AttendanceModel();
        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'date' => $this->request->getPost('date'),
            'check_in_time' => $this->request->getPost('check_in_time'),
            'check_out_time' => $this->request->getPost('check_out_time'),
        ];
        $attendanceModel->save($data);
        return redirect()->to('/attendance')->with('success', 'Attendance recorded successfully.');
    }

    public function edit($id)
    {
        $attendanceModel = new AttendanceModel();
        $userModel = new UserModel();
        $data['attendance'] = $attendanceModel->find($id);
        $data['users'] = $userModel->findAll();
        return view('attendance/edit', $data);
    }

    public function update($id)
    {
        $attendanceModel = new AttendanceModel();
        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'date' => $this->request->getPost('date'),
            'check_in_time' => $this->request->getPost('check_in_time'),
            'check_out_time' => $this->request->getPost('check_out_time'),
        ];
        $attendanceModel->update($id, $data);
        return redirect()->to('/attendance')->with('success', 'Attendance updated successfully.');
    }

    public function delete($id)
    {
        $attendanceModel = new AttendanceModel();
        $attendanceModel->delete($id);
        return redirect()->to('/attendance')->with('success', 'Attendance deleted successfully.');
    }
}
