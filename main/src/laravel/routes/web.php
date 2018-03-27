<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//  home page
Route::get('/', function () {
    return view('welcome');
});

//  view all employees
Route::get('/employees', function() {
    $employees = DB::select('SELECT * FROM employee ORDER BY id');
    $departments = DB::select('SELECT * FROM department');

    return view('employee/employees', ['employees' => $employees, 'departments' => $departments]);
});

//  view an employee by id
Route::get('/employee/view/{id}', function($id) {
    $employee = DB::select('SELECT * FROM employee WHERE id = :id', ['id' => $id]);

    if (count($employee)) {
        //  get employee's dependents
        $dependents = DB::select('SELECT * FROM dependent WHERE employee_id = :id ORDER BY last_name', ['id' => $id]);
        $departments = DB::select('SELECT * FROM department');

        //  get project employee is currently working on
        $project = DB::select('SELECT * FROM project, works_on WHERE id = works_on.project_id AND works_on.employee_id = :id', ['id' => $id]);
        $supervisor = DB::select('SELECT * FROM role, employee WHERE employee.id = supervisor_id AND employee_id = :id', ['id' => $id]);

        //  checks if the employee is assigned to a project
        if (!count($project)) {
            $project = null;
        }

        //  checks if the employee has a supervisor
        if (!count($supervisor)) {
            $supervisor[0] = null;
        }

        return view('employee/employee', ['employee' => $employee[0], 'departments' => $departments, 'dependents' => $dependents, 'project' => $project[0], 'supervisor' => $supervisor[0]]);        
    }

    return 'No Employee was found with that ID.';
});

//  create employee endpoint
Route::get('/employee/create', function() {
    return view('employee/create');
});

//  view all departments
Route::get('/departments', function() {
    $departments = DB::select('SELECT * FROM department ORDER BY id');
    $employees = DB::select('SELECT * FROM employee');

    return view('department/departments', ['departments' => $departments, 'employees' => $employees]);
});

//  view a department by id
Route::get('/department/view/{id}', function($id) {
    return 'YUPPERS';
});

//  view all projects
Route::get('/projects', function() {

});

//  view a project by id
Route::get('/project/view/{id}', function($id) {

});