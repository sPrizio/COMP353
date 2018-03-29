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
define("LOCATIONS", 'locations');

define("DEPARTMENT_SELECT", 'SELECT * FROM department');

//  home page
Route::get('/', function () {
    return view('welcome');
});

//  view all employees
Route::get('/employees', function () {
    $employees = DB::select('SELECT * FROM employee ORDER BY id');
    $departments = DB::select(DEPARTMENT_SELECT);

    return view('employee/employees', [EMPLOYEES => $employees, DEPARTMENTS => $departments]);
});

//  view an employee by id
Route::get('/employee/view/{id}', function ($id) {
    $employee = DB::select('SELECT * FROM employee WHERE id = :id', ['id' => $id]);

    if (count($employee)) {
        //  get employee's dependents
        $dependents = DB::select('SELECT * FROM dependent WHERE employee_id = :id ORDER BY last_name', ['id' => $id]);
        $departments = DB::select(DEPARTMENT_SELECT);

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
Route::get('/departments', function () {
    $departments = DB::select('SELECT * FROM department ORDER BY id');
    $employees = DB::select('SELECT * FROM employee');

    return view('department/departments', [DEPARTMENTS => $departments, EMPLOYEES => $employees]);
});

//  view a department by id
Route::get('/department/view/{id}', function ($id) {
    $department = DB::select('SELECT * FROM department WHERE id = :id', ['id' => $id]);
    $employee_list = DB::select('SELECT * FROM employee');

    if (count($department)) {
        $locations = DB::select('SELECT * FROM located_in, location WHERE location_id = id AND department_id = :id', ['id' => $id]);
        $projects = DB::select('SELECT * FROM responsible_for, project WHERE project_id = id AND department_id = :id ORDER BY project_id', ['id' => $id]);
        $employees = DB::select('SELECT * FROM comp353_main_project.employee WHERE department_id = :id ORDER BY last_name', ['id' => $id]);

        return view('department/department', [DEPARTMENT => $department[0], 'employee_list' => $employee_list, LOCATIONS => $locations, 'projects' => $projects, EMPLOYEES => $employees]);
    }

    return 'No Department was found with that ID.';
});

//  view all projects
Route::get('/projects', function () {
    $projects = DB::select('SELECT * FROM project ORDER BY id');
    $locations = DB::select('SELECT * FROM location');

    return view('project/projects', ['projects' => $projects, LOCATIONS => $locations]);
});

//  view a project by id
Route::get('/project/view/{id}', function ($id) {
    $project = DB::select('SELECT * FROM project WHERE id = :id', ['id' => $id]);

    if (count($project)) {
        $locations = DB::select('SELECT * FROM location');
        $departments = DB::select(DEPARTMENT_SELECT);
        $department = DB::select('SELECT * FROM responsible_for, department WHERE department_id = id AND project_id = :id;', ['id' => $id]);
        $employees = DB::select('SELECT * FROM works_on, employee WHERE id = employee_id AND project_id = :id ORDER BY id', ['id' => $id]);

        return view('project/project', ['project' => $project[0], 'department' => $department[0], LOCATIONS => $locations, 'departments' => $departments, EMPLOYEES => $employees]);
    }

    return 'No Project was found with that ID.';
});

//  view all locations
Route::get('/locations', function () {
    $locations = DB::select('SELECT * FROM location ORDER BY id');

    return view('location/locations', ['locations' => $locations]);
});

//  view a location by id
Route::get('/location/view/{id}', function ($id) {
    $location = DB::select('SELECT * FROM location WHERE id = :id', ['id' => $id]);

    if (count($location)) {
        $departments = DB::select('SELECT * FROM department WHERE id IN (SELECT department_id FROM located_in WHERE location_id = :id)', ['id' => $id]);
        $projects = DB::select('SELECT * FROM project WHERE id IN (SELECT project_id FROM responsible_for WHERE department_id IN (SELECT department_id FROM located_in WHERE location_id = :id)) AND location_id = :id2', ['id' => $id, 'id2' => $id]);
        $locations = DB::select('SELECT * FROM location');

        return view('location/location', ['location' => $location[0], 'departments' => $departments, 'projects' => $projects, 'locations' => $locations]);
    }

    return ('No Location was found with that ID.');
});