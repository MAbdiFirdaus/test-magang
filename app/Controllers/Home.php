<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (logged_in()) {
            if (in_groups('hrd')) {
                return redirect()->to(base_url('/employees'));
            } if (in_groups('karyawan')) {
                return redirect()->to(base_url('/leave_requests/create'));
            } if (in_groups('manager')) {
                return redirect()->to(base_url('/leave_requests/create'));
            } 
        } else {
            return view('job_openings/index');
        }
    }
}
