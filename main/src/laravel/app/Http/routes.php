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

use Illuminate\Support\Facades\Input;

//  define constants
define("DEPARTMENTS", 'departments');
define("DEPARTMENT", 'department');
define("EMPLOYEES", 'employees');
define("EMPLOYEE", 'employee');
define("LOCATIONS", 'locations');
define("PROJECTS", 'projects');

define("SINGLE_DEPARTMENT_SELECT", 'SELECT * FROM department WHERE id = :id');
define("DEPARTMENT_SELECT", 'SELECT * FROM department ORDER BY id');
define("LOCATION_SELECT", 'SELECT * FROM location');
define("EMPLOYEE_SELECT", 'SELECT * FROM employee WHERE id = :id');
define("EMPLOYEES_SELECT", 'SELECT * FROM employee ORDER BY id');

define("EMPLOYEE_NOT_FOUND", 'No Employee was found with that ID.');
define("EMPLOYEES_TEMPLATE", 'employee/employees');
define("DEPARTMENT_NOT_FOUND", 'No Department was found with that ID.');
define("DEPARTMENTS_TEMPLATE", 'department/departments');

//  home page
Route::get('/', function () {
    return view('welcome');
});

//  EMPLOYEES

//  view all employees
Route::get('/employees', function () {
    $employees = DB::select(EMPLOYEES_SELECT);
    $departments = DB::select(DEPARTMENT_SELECT);

    return view(EMPLOYEES_TEMPLATE, [EMPLOYEES => $employees, DEPARTMENTS => $departments]);
});

//  view an employee by id
Route::get('/employee/view/{id}', function ($id) {
    $employee = DB::select(EMPLOYEE_SELECT, ['id' => $id]);

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

        return view('employee/employee', [EMPLOYEE => $employee[0], DEPARTMENTS => $departments, 'dependents' => $dependents, 'project' => $project[0], 'supervisor' => $supervisor[0]]);
    }

    return EMPLOYEE_NOT_FOUND;
});

//  create employee page
Route::get('/employee/create', function() {
    $departments = DB::select(DEPARTMENT_SELECT);

    return view('employee/create', [DEPARTMENTS => $departments]);
});

//  create the employee via HTTP POST
Route::post('/employee/create', function() {
    $error = false;
    $msg = "";

    $first_name = Input::get('first_name');
    $last_name = Input::get('last_name');
    $sin = Input::get('sin');
    $dob = Input::get('dob');
    $address = Input::get('address');
    $phone = Input::get('phone');
    $salary = Input::get('salary');
    $gender = Input::get('gender');
    $department = Input::get(DEPARTMENT);

    if ($sin > 999999999 || $sin < 100000000) {
        $msg = 'A Social Insurance Number must be exactly 9 digits.';

        $error = true;
    }

    if (Helper::duplicateSINChecker(intval($sin))) {
        $msg = 'Duplicate SIN detected!';

        $error = true;
    }

    if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
        $msg = 'That was not a valid phone number';

        $error = true;
    }

    if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $dob)) {
        $msg = 'That was not a date of birth';

        $error = true;
    }

    if ($salary < 30000) {
        $msg = 'Salary cannot be less than $30,000.';

        $error = true;
    }

    //  display error message for incorrect form submission
    if ($error) {
        return $msg;
    }

    $departments = DB::select(DEPARTMENT_SELECT);

    $g = null;
    $dept = Helper::getDepartmentId($department, $departments);

    if ($gender == "male") {
        $g = "M";
    } else if ($gender == "female") {
        $g = "F";
    } else {
        $g = "O";
    }

    //  insert the employee to the DB
    DB::insert('INSERT INTO employee (first_name, last_name, sin, date_of_birth, address, phone, salary, gender, department_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)', [$first_name, $last_name, $sin, $dob, $address, $phone, $salary, $g, $dept]);

    return view('employee/create', [DEPARTMENTS => $departments]);
});

//  edit employee page
Route::get('employee/{id}/edit', function ($id) {
    $employee = DB::select(EMPLOYEE_SELECT, ['id' => $id]);

    if (count($employee)) {
        $departments = DB::select(DEPARTMENT_SELECT);

        return view('employee/edit', [EMPLOYEE => $employee[0], DEPARTMENTS => $departments]);
    }

    return EMPLOYEE_NOT_FOUND;
});

//  update the employee via HTTP POST
Route::post('employee/{id}/edit', function ($id) {
    $employee = DB::select(EMPLOYEE_SELECT, ['id' => $id]);

    if (count($employee)) {
        $error = false;
        $msg = "";

        $first_name = Input::get('first_name');
        $last_name = Input::get('last_name');
        $sin = Input::get('sin');
        $dob = Input::get('dob');
        $address = Input::get('address');
        $phone = Input::get('phone');
        $salary = Input::get('salary');
        $gender = Input::get('gender');
        $department = Input::get(DEPARTMENT);

        if ($sin > 999999999 || $sin < 100000000) {
            $msg = 'A Social Insurance Number must be exactly 9 digits.';

            $error = true;
        }

        if (Helper::duplicateSINChecker(intval($sin))) {
            $msg = 'Duplicate SIN detected!';

            $error = true;
        }

        if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
            $msg = 'That was not a valid phone number';

            $error = true;
        }

        if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $dob)) {
            $msg = 'That was not a date of birth';

            $error = true;
        }

        if ($salary < 30000) {
            $msg = 'Salary cannot be less than $30,000.';

            $error = true;
        }

        //  display error message for incorrect form submission
        if ($error) {
            return $msg;
        }

        $departments = DB::select(DEPARTMENT_SELECT);

        $g = null;
        $dept = Helper::getDepartmentId($department, $departments);

        if ($gender == "male") {
            $g = "M";
        } else if ($gender == "female") {
            $g = "F";
        } else {
            $g = "O";
        }

        DB::update('UPDATE employee SET first_name = ?, last_name = ?, sin = ?, date_of_birth = ?, address = ?, phone = ?, salary = ?, gender = ?, department_id = ? WHERE id = ?', [$first_name, $last_name, $sin, $dob, $address, $phone, $salary, $g, $dept, $employee[0]->id]);

        $employees = DB::select(EMPLOYEES_SELECT);

        return view(EMPLOYEES_TEMPLATE, [EMPLOYEES => $employees, DEPARTMENTS => $departments]);
    }

    return EMPLOYEE_NOT_FOUND;
});

//  deletes an employee from the db
Route::post('/employee/{id}/delete', function ($id) {
    $employee = DB::select(EMPLOYEE_SELECT, ['id' => $id]);

    if (count($employee)) {
        DB::delete('DELETE FROM employee WHERE id = :id', ['id' => $id]);

        $employees = DB::select(EMPLOYEES_SELECT);
        $departments = DB::select(DEPARTMENT_SELECT);

        return view(EMPLOYEES_TEMPLATE, [EMPLOYEES => $employees, DEPARTMENTS => $departments]);
    }

    return EMPLOYEE_NOT_FOUND;
});

//  DEPARTMENTS

//  view all departments
Route::get('/departments', function () {
    $departments = DB::select(DEPARTMENT_SELECT);
    $employees = DB::select('SELECT * FROM employee');

    return view(DEPARTMENTS_TEMPLATE, [DEPARTMENTS => $departments, EMPLOYEES => $employees]);
});

//  view a department by id
Route::get('/department/view/{id}', function ($id) {
    $department = DB::select(SINGLE_DEPARTMENT_SELECT, ['id' => $id]);
    $employee_list = DB::select('SELECT * FROM employee');

    if (count($department)) {
        $locations = DB::select('SELECT * FROM located_in, location WHERE location_id = id AND department_id = :id', ['id' => $id]);
        $projects = DB::select('SELECT * FROM responsible_for, project WHERE project_id = id AND department_id = :id ORDER BY project_id', ['id' => $id]);
        $employees = DB::select('SELECT * FROM comp353_main_project.employee WHERE department_id = :id ORDER BY last_name', ['id' => $id]);

        return view('department/department', [DEPARTMENT => $department[0], 'employee_list' => $employee_list, LOCATIONS => $locations, PROJECTS => $projects, EMPLOYEES => $employees]);
    }

    return DEPARTMENT_NOT_FOUND;
});

//  create department page
Route::get('/department/create', function () {
    $employees = DB::select('SELECT * FROM employee ORDER BY last_name');

    return view('department/create', [EMPLOYEES => $employees]);
});

//  create department via HTTP POST
Route::post('/department/create', function () {
    $name = Input::get('name');
    $manager_id = Input::get('manager');

    DB::insert('INSERT INTO department(name, manager_id) VALUES (?, ?)', [$name, $manager_id]);

    $employees = DB::select('SELECT * FROM employee ORDER BY last_name');

    return view('department/create', [EMPLOYEES => $employees]);
});

//  edit department page
Route::get('department/{id}/edit', function ($id) {
    $department = DB::select(SINGLE_DEPARTMENT_SELECT, ['id' => $id]);

    if (count($department)) {
        $employees = DB::select(EMPLOYEES_SELECT);

        return view('department/edit', [DEPARTMENT => $department[0], EMPLOYEES => $employees]);
    }

    return DEPARTMENT_NOT_FOUND;
});

//  updates department via HTTP POST
Route::post('department/{id}/edit', function($id) {
    $department = DB::select(SINGLE_DEPARTMENT_SELECT, ['id' => $id]);

    if (count($department)) {
        $name = Input::get('name');
        $manager = Input::get('manager');

        DB::update('UPDATE department SET name = ?, manager_id = ? WHERE id = ?', [$name, $manager, $department[0]->id]);

        $employees = DB::select(EMPLOYEES_SELECT);
        $departments = DB::select(DEPARTMENT_SELECT);

        return view(DEPARTMENTS_TEMPLATE, [DEPARTMENTS => $departments, EMPLOYEES => $employees]);
    }

    return DEPARTMENT_NOT_FOUND;
});

//  delete a department
Route::post('/department/{id}/delete', function ($id) {
    $department = DB::select(SINGLE_DEPARTMENT_SELECT, ['id' => $id]);

    if (count($department)) {
        DB::delete('DELETE FROM department WHERE id = :id', ['id' => $id]);

        $employees = DB::select(EMPLOYEES_SELECT);
        $departments = DB::select(DEPARTMENT_SELECT);

        return view(DEPARTMENTS_TEMPLATE, [DEPARTMENTS => $departments, EMPLOYEES => $employees]);
    }

    return DEPARTMENT_NOT_FOUND;
});

//  PROJECTS

//  view all projects
Route::get('/projects', function () {
    $projects = DB::select('SELECT * FROM project ORDER BY id');
    $locations = DB::select(LOCATION_SELECT);

    return view('project/projects', [PROJECTS => $projects, LOCATIONS => $locations]);
});

//  view a project by id
Route::get('/project/view/{id}', function ($id) {
    $project = DB::select('SELECT * FROM project WHERE id = :id', ['id' => $id]);

    if (count($project)) {
        $locations = DB::select(LOCATION_SELECT);
        $departments = DB::select(DEPARTMENT_SELECT);
        $department = DB::select('SELECT * FROM responsible_for, department WHERE department_id = id AND project_id = :id;', ['id' => $id]);
        $employees = DB::select('SELECT * FROM works_on, employee WHERE id = employee_id AND project_id = :id ORDER BY id', ['id' => $id]);

        return view('project/project', ['project' => $project[0], DEPARTMENT => $department[0], LOCATIONS => $locations, DEPARTMENTS => $departments, EMPLOYEES => $employees]);
    }

    return 'No Project was found with that ID.';
});

//  LOCATIONS

//  view all locations
Route::get('/locations', function () {
    $locations = DB::select('SELECT * FROM location ORDER BY id');

    return view('location/locations', [LOCATIONS => $locations]);
});

//  view a location by id
Route::get('/location/view/{id}', function ($id) {
    $location = DB::select('SELECT * FROM location WHERE id = :id', ['id' => $id]);

    if (count($location)) {
        $departments = DB::select('SELECT * FROM department WHERE id IN (SELECT department_id FROM located_in WHERE location_id = :id)', ['id' => $id]);
        $projects = DB::select('SELECT * FROM project WHERE id IN (SELECT project_id FROM responsible_for WHERE department_id IN (SELECT department_id FROM located_in WHERE location_id = :id)) AND location_id = :id2', ['id' => $id, 'id2' => $id]);
        $locations = DB::select('SELECT * FROM location');

        return view('location/location', ['location' => $location[0], DEPARTMENTS => $departments, PROJECTS => $projects, LOCATIONS => $locations]);
    }

    return ('No Location was found with that ID.');
});