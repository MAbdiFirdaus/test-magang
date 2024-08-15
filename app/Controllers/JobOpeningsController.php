<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JobOpeningsModel;
use CodeIgniter\HTTP\ResponseInterface;

class JobOpeningsController extends BaseController
{

    public function index2()
    {
        $model = new JobOpeningsModel();
        $data['job_openings'] = $model->findAll();
        return view('job_openings/table_job', $data);
    }
    public function index()
    {
        $model = new JobOpeningsModel();
        $data['job_openings'] = $model->findAll();
        return view('job_openings/index', $data);
    }

    public function create()
    {
        return view('job_openings/create');
    }

    public function store()
    {
        $model = new JobOpeningsModel();
        $data = [
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'requirements' => $this->request->getVar('requirements'),
            'status' => $this->request->getVar('status'),
        ];
        $model->save($data);
        return redirect()->to('/job_openings')->with('success', 'Job opening created successfully.');
    }

    public function edit($id)
    {
        $model = new JobOpeningsModel();
        $data['job_opening'] = $model->find($id);
        return view('job_openings/edit', $data);
    }

    public function update($id)
    {
        $model = new JobOpeningsModel();
        $data = [
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'requirements' => $this->request->getVar('requirements'),
            'status' => $this->request->getVar('status'),
        ];
        $model->update($id, $data);
        return redirect()->to('/job_openings')->with('success', 'Job opening updated successfully.');
    }

    public function delete($id)
    {
        $model = new JobOpeningsModel();
        $model->delete($id);
        return redirect()->to('/job_openings')->with('success', 'Job opening deleted successfully.');
    }
}
