<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Rute untuk HRD (Pengelolaan Karyawan)
$routes->group('', ['filter' => 'role:hrd'], function($routes) {
    $routes->get('/employees', 'EmployeesController::index');
    $routes->get('/employees/create', 'EmployeesController::create');
    $routes->post('/employees/store', 'EmployeesController::store');
    $routes->get('/employees/edit/(:num)', 'EmployeesController::edit/$1');
    $routes->post('/employees/update/(:num)', 'EmployeesController::update/$1');
    $routes->get('/employees/delete/(:num)', 'EmployeesController::delete/$1');
    $routes->get('/employees/export', 'ExportController::export');
    $routes->get('/employees/export-pdf', 'ExportController::exportPdf');
});

// Rute untuk Pengelolaan Cuti Karyawan
$routes->get('/leave_requests', 'LeaveRequestsController::index', ['filter' => 'role:hrd']);
$routes->get('/leave_requests/create', 'LeaveRequestsController::create', ['filter' => 'role:karyawan']);
$routes->post('/leave_requests/store', 'LeaveRequestsController::store', ['filter' => 'role:karyawan']);
$routes->post('/leave_requests/update_status/(:num)', 'LeaveRequestsController::updateStatus/$1', ['filter' => 'role:hrd']);

$routes->get('/attendance', 'AttendanceController::index', ['filter' => 'role:hrd']);
$routes->get('/attendance/create', 'AttendanceController::create', ['filter' => 'role:hrd']);
$routes->post('/attendance/store', 'AttendanceController::store');
$routes->get('/attendance/edit/(:num)', 'AttendanceController::edit/$1', ['filter' => 'role:hrd']);
$routes->post('/attendance/update/(:num)', 'AttendanceController::update/$1', ['filter' => 'role:hrd']);
$routes->get('/attendance/delete/(:num)', 'AttendanceController::delete/$1', ['filter' => 'role:hrd']);

$routes->get('/job_openings/table', 'JobOpeningsController::index2', ['filter' => 'role:hrd']);
$routes->get('/job_openings', 'JobOpeningsController::index');
$routes->get('/job_openings/create', 'JobOpeningsController::create', ['filter' => 'role:hrd']);
$routes->post('/job_openings/store', 'JobOpeningsController::store');
$routes->get('/job_openings/edit/(:num)', 'JobOpeningsController::edit/$1', ['filter' => 'role:hrd']);
$routes->post('/job_openings/update/(:num)', 'JobOpeningsController::update/$1');
$routes->get('/job_openings/delete/(:num)', 'JobOpeningsController::delete/$1', ['filter' => 'role:hrd']);

$routes->get('/applications', 'ApplicationsController::index');
$routes->get('/applications/create', 'ApplicationsController::create');
$routes->post('/applications/store', 'ApplicationsController::store');
$routes->post('/applications/update_status/(:num)', 'ApplicationsController::updateStatus/$1', ['filter' => 'role:hrd']);



