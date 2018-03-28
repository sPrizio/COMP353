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

//  define constants
define("DEPARTMENTS", 'departments');
define("DEPARTMENT", 'department');
define("EMPLOYEES", 'employees');

//  home page
Route::get('/', function () {
    return view('welcome');
});

//  view all employees
Route::get('/employees', function() {
    $employees = DB::select('SELECT * FROM employee ORDER BY id');
    $departments = DB::select('SELECT * FROM department');

    return view('employee/employees', [EMPLOYEES => $employees, DEPARTMENTS => $departments]);
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

        return view('employee/employee', ['employee' => $employee[0], DEPARTMENTS => $departments, 'dependents' => $dependents, 'project' => $project[0], 'supervisor' => $supervisor[0]]);
    }

    return 'No Employee was found with that ID.';
});

//  view all departments
Route::get('/departments', function() {
    $departments = DB::select('SELECT * FROM department ORDER BY id');
    $employees = DB::select('SELECT * FROM employee');

    return view('department/departments', [DEPARTMENTS => $departments, EMPLOYEES => $employees]);
});

//  view a department by id
Route::get('/department/view/{id}', function($id) {
    $department = DB::select('SELECT * FROM department WHERE id = :id', ['id' => $id]);
    $employee_list = DB::select('SELECT * FROM employee');
    
    if (count($department)) {
        $locations = DB::select('SELECT * FROM located_in, location WHERE location_id = id AND department_id = :id', ['id' => $id]);
        $projects = DB::select('SELECT * FROM responsible_for, project WHERE project_id = id AND department_id = :id ORDER BY project_id', ['id' => $id]);
        $employees = DB::select('SELECT * FROM comp353_main_project.employee WHERE department_id = :id ORDER BY last_name', ['id' => $id]);

        return view('department/department', [DEPARTMENT => $department[0], 'employee_list' => $employee_list, 'locations' => $locations, 'projects' => $projects, EMPLOYEES => $employees]);
    }
    
    return 'No Department was found with that ID.';
});

//  view all projects
Route::get('/projects', function() {
    $projects = DB::select('SELECT * FROM project ORDER BY id');
    $locations = DB::select('SELECT * FROM location');

    return view('project/projects', ['projects' => $projects, 'locations' => $locations]);
});

//  view a project by id
