<?php

namespace App\Controllers;

use App\Models\LeaveRequestsModel;
use CodeIgniter\Controller;
use Myth\Auth\Models\UserModel;
use App\Models\EmployeesModel;

class LeaveRequestsController extends Controller
{
    public function index()
    {
        $leaveRequestsModel = new LeaveRequestsModel();
        $employeesModel = new EmployeesModel();
        
        // Fetch all leave requests
        $leave_requests = $leaveRequestsModel->findAll();
        
        // Fetch all employees
        $employees = $employeesModel->findAll();
        
        // Create a map of employee IDs to names for quick lookup
        $employeeMap = [];
        foreach ($employees as $employee) {
            $employeeMap[$employee['id']] = $employee['first_name'] . ' ' . $employee['last_name'];
        }
        
        // Add employee names to leave requests
        foreach ($leave_requests as &$request) {
            $request['employee_name'] = $employeeMap[$request['employee_id']] ?? 'Unknown';
        }
        
        $data['leave_requests'] = $leave_requests;
        return view('leave_requests/index', $data);
    }

    public function create()
    {
          $employeeModel = new EmployeesModel();
        $data['employees'] = $employeeModel->findAll(); // Fetch all employees
        return view('leave_requests/create', $data);
    }

    public function store()
    {
        $model = new LeaveRequestsModel();
        $data = [
            'employee_id' => $this->request->getVar('employee_id'),
            'leave_type' => $this->request->getVar('leave_type'),
            'start_date' => $this->request->getVar('start_date'),
            'end_date' => $this->request->getVar('end_date'),
            'status' => 'pending', // Default status for new requests
        ];

        if ($model->save($data)) {
            return redirect()->to('/leave_requests')->with('success', 'Cuti berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }

    public function edit($id)
    {
        $model = new LeaveRequestsModel();
        $data['leave_request'] = $model->find($id);
        return view('leave_requests/edit', $data);
    }

    public function updateStatus($id)
    {

        $model = new LeaveRequestsModel();
        $leaveRequest = $model->find($id);

        if (!$leaveRequest) {
            return redirect()->to('/leave_requests')->with('error', 'Leave request not found.');
        }

        $data = [
            'status' => $this->request->getVar('status'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/leave_requests')->with('success', 'Status cuti berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }
}
