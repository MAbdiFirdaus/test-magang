<?php

namespace App\Controllers;

use App\Models\EmployeesModel;
use Myth\Auth\Models\UserModel; 
use CodeIgniter\Controller;

class EmployeesController extends Controller
{
    public function index()
    {
        $model = new EmployeesModel();
        $data['employees'] = $model->findAll();
        return view('employees/index', $data);
    }

    public function create()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll(); // Ambil semua data pengguna
        
        return view('employees/create', $data);
    }

    public function store()
    {
        $model = new EmployeesModel();
        $userModel = new UserModel();
        $userId = $this->request->getVar('user_id');
        if (!$userModel->find($userId)) {
            return redirect()->back()->withInput()->with('errors', ['user_id' => 'User ID tidak valid']);
        }
        $data = [
            'user_id' => $userId,
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
            'address' => $this->request->getVar('address'),
            'phone_number' => $this->request->getVar('phone_number'),
            'email' => $this->request->getVar('email'),
            'job_title' => $this->request->getVar('job_title'),
            'department' => $this->request->getVar('department'),
            'hire_date' => $this->request->getVar('hire_date'),
            'salary' => $this->request->getVar('salary'),
            'allowances' => $this->request->getVar('allowances'),
            'deductions' => $this->request->getVar('deductions'),
        ];
        if ($model->save($data)) {
            return redirect()->to('/employees')->with('success', 'Data berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }

    public function edit($id)
    {
        $model = new EmployeesModel();
        $data['employee'] = $model->find($id);
        return view('employees/edit', $data);
    }

    public function update($id)
    {
        $model = new EmployeesModel();
        $data = [
            'user_id' => $this->request->getVar('user_id'),
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
            'address' => $this->request->getVar('address'),
            'phone_number' => $this->request->getVar('phone_number'),
            'email' => $this->request->getVar('email'),
            'job_title' => $this->request->getVar('job_title'),
            'department' => $this->request->getVar('department'),
            'hire_date' => $this->request->getVar('hire_date'),
            'salary' => $this->request->getVar('salary'),
            'allowances' => $this->request->getVar('allowances'),
            'deductions' => $this->request->getVar('deductions'),
        ];
        $model->update($id, $data);
        return redirect()->to('/employees');
    }

    public function delete($id)
    {
        $model = new EmployeesModel();
        $model->delete($id);
        return redirect()->to('/employees');
    }
}
