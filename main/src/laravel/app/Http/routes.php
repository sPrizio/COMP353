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

//  define word constants
define("DEPARTMENTS", 'departments');
define("DEPARTMENT", 'department');
define("EMPLOYEES", 'employees');
define("EMPLOYEE", 'employee');
define("LOCATIONS", 'locations');
define("LOCATION", 'location');
define("PROJECTS", 'projects');
define("FIRST_NAME", 'first_name');
define("LAST_NAME", 'last_name');
define("GENDER", 'gender');
define("DEPENDENTS", 'dependents');
define("PROJECT", 'project');
define("SUPERVISOR", 'supervisor');
define("FEMALE", "female");
define("MALE", "male");
define("ADDRESS", 'address');


//  define SQL constants
define("SINGLE_DEPARTMENT_SELECT", 'SELECT * FROM department WHERE id = :id');
define("DEPARTMENT_SELECT", 'SELECT * FROM department ORDER BY id');
define("LOCATIONS_SELECT", 'SELECT * FROM location ORDER BY id');
define("EMPLOYEE_SELECT", 'SELECT * FROM employee WHERE id = :id');
define("EMPLOYEES_SELECT", 'SELECT * FROM employee ORDER BY id');
define("EMPLOYEE_DEPENDENTS", 'SELECT * FROM dependent WHERE employee_id = :id ORDER BY last_name');
define("EMPLOYEE_PROJECT", 'SELECT * FROM project, works_on WHERE id = works_on.project_id AND works_on.employee_id = :id');
define("EMPLOYEE_SUPERVISOR", 'SELECT * FROM role, employee WHERE employee.id = supervisor_id AND employee_id = :id');
define("DEPENDENT_SELECT", 'SELECT * FROM dependent WHERE id = :id');
define("PROJECTS_SELECT", 'SELECT * FROM project ORDER BY id');
define("PROJECT_SELECT", 'SELECT * FROM project WHERE id = :id');
define("LOCATION_SELECT", 'SELECT * FROM location WHERE id = :id');
define("SUPERVISORS_SELECT", 'SELECT * FROM employee WHERE id IN (SELECT supervisor_id FROM role)');
define("SUPERVISOR_SELECT", 'SELECT * FROM employee WHERE id = (SELECT DISTINCT supervisor_id FROM role WHERE supervisor_id = :id)');
define("SUPERVISOR_INSERTION", 'INSERT INTO role(employee_id, supervisor_id) VALUES (?, ?)');

//  define template/message constants
define("EMPLOYEE_NOT_FOUND", 'No Employee was found with that ID.');
define("EMPLOYEES_TEMPLATE", 'employee/employees');
define("EMPLOYEE_TEMPLATE", 'employee/employee');
define("DEPARTMENT_NOT_FOUND", 'No Department was found with that ID.');
define("DEPARTMENTS_TEMPLATE", 'department/departments');
define("BAD_SIN", 'A Social Insurance Number must be exactly 9 digits.');
define("DUPLICATE_SIN", 'Duplicate SIN detected!');
define("BAD_DOB", 'That was not a date of birth');
define("DOB_REGEX", "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/");
define("DEPENDENT_NOT_FOUND", 'No Dependent was found with that ID.');
define("PROJECT_NOT_FOUND", 'No Project was found with that ID.');
define("PROJECTS_TEMPLATE", 'project/projects');
define("LOCATIONS_TEMPLATE", 'location/locations');
define("LOCATION_NOT_FOUND", 'No Location was found with that ID.');
define("SUPERVISORS_TEMPLATE", 'supervisor/supervisors');
define("SUPERVISOR_NOT_FOUND", 'No Supervisor was found with that ID.');

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
        $dependents = DB::select(EMPLOYEE_DEPENDENTS, ['id' => $id]);
        $departments = DB::select(DEPARTMENT_SELECT);

        //  get project employee is currently working on
        $project = DB::select(EMPLOYEE_PROJECT, ['id' => $id]);
        $supervisor = DB::select(EMPLOYEE_SUPERVISOR, ['id' => $id]);

        //  checks if the employee is assigned to a project
        if (!count($project)) {
            $project = null;
        }

        //  checks if the employee has a supervisor
        if (!count($supervisor)) {
            $supervisor[0] = null;
        }

        return view(EMPLOYEE_TEMPLATE, [EMPLOYEE => $employee[0], DEPARTMENTS => $departments, DEPENDENTS => $dependents, PROJECT => $project[0], SUPERVISOR => $supervisor[0]]);
    }

    return EMPLOYEE_NOT_FOUND;
});

//  create employee page
Route::get('/employee/create', function () {
    $departments = DB::select(DEPARTMENT_SELECT);

    return view('employee/create', [DEPARTMENTS => $departments]);
});

//  create the employee via HTTP POST
Route::post('/employee/create', function () {
    $error = false;
    $msg = "";

    $first_name = Input::get(FIRST_NAME);
    $last_name = Input::get(LAST_NAME);
    $sin = Input::get('sin');
    $dob = Input::get('dob');
    $address = Input::get(ADDRESS);
    $phone = Input::get('phone');
    $salary = Input::get('salary');
    $gender = Input::get(GENDER);
    $department = Input::get(DEPARTMENT);

    if ($sin > 999999999 || $sin < 100000000) {
        $msg = BAD_SIN;

        $error = true;
    }

    if (Helper::duplicateSINChecker(intval($sin))) {
        $msg = DUPLICATE_SIN;

        $error = true;
    }

    if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
        $msg = 'That was not a valid phone number';

        $error = true;
    }

    if (!preg_match(DOB_REGEX, $dob)) {
        $msg = BAD_DOB;

        $error = true;
    }

    //  display error message for incorrect form submission
    if ($error) {
        return $msg;
    }

    $departments = DB::select(DEPARTMENT_SELECT);

    $g = null;
    $dept = Helper::getDepartmentId($department, $departments);

    if ($gender == MALE) {
        $g = "M";
    } else if ($gender == FEMALE) {
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

        $first_name = Input::get(FIRST_NAME);
        $last_name = Input::get(LAST_NAME);
        $sin = Input::get('sin');
        $dob = Input::get('dob');
        $address = Input::get(ADDRESS);
        $phone = Input::get('phone');
        $salary = Input::get('salary');
        $gender = Input::get(GENDER);
        $department = Input::get(DEPARTMENT);

        if ($sin > 999999999 || $sin < 100000000) {
            $msg = BAD_SIN;

            $error = true;
        }

        if (Helper::duplicateSINChecker(intval($sin))) {
            $msg = DUPLICATE_SIN;

            $error = true;
        }

        if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
            $msg = 'That was not a valid phone number';

            $error = true;
        }

        if (!preg_match(DOB_REGEX, $dob)) {
            $msg = BAD_DOB;

            $error = true;
        }

        //  display error message for incorrect form submission
        if ($error) {
            return $msg;
        }

        $departments = DB::select(DEPARTMENT_SELECT);

        $g = null;
        $dept = Helper::getDepartmentId($department, $departments);

        if ($gender == MALE) {
            $g = "M";
        } else if ($gender == FEMALE) {
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

//  SUPERVISORS

//  view all supervisors
Route::get('/supervisors', function () {
    $supervisors = DB::select(SUPERVISORS_SELECT);
    $departments = DB::select(DEPARTMENT_SELECT);

    return view(SUPERVISORS_TEMPLATE, [DEPARTMENTS => $departments, EMPLOYEES => $supervisors]);
});

//  view a supervisor
Route::get('/supervisor/view/{id}', function ($id) {
    $supervisor = DB::select(SUPERVISOR_SELECT, ['id' => $id]);
    $subs = DB::select('SELECT * FROM employee WHERE id IN (SELECT employee_id FROM role WHERE supervisor_id = :id)', ['id' => $id]);
    $departments = DB::select(DEPARTMENT_SELECT);

    if (count($supervisor)) {
        return view('supervisor/supervisor', ['supervisor' => $supervisor[0], 'subordinates' => $subs, DEPARTMENTS => $departments]);
    }

    return SUPERVISOR_NOT_FOUND;
});

//  create supervisor page
Route::get('/supervisor/create', function () {
    $employees = DB::select('SELECT * FROM employee WHERE id NOT IN (SELECT supervisor_id FROM role) ORDER BY last_name');

    return view('supervisor/create', [EMPLOYEES => $employees]);
});

//  create supervisor via HTTP POST
Route::post('/supervisor/create', function () {
    $id = Input::get('id');

    DB::insert(SUPERVISOR_INSERTION, [0, $id]);

    $supervisors = DB::select(SUPERVISORS_SELECT);
    $departments = DB::select(DEPARTMENT_SELECT);

    return view(SUPERVISORS_TEMPLATE, [DEPARTMENTS => $departments, EMPLOYEES => $supervisors]);
});

//  add subordinate page
Route::get('/supervisor/{id}/employee/create', function ($id) {
    $supervisor = DB::select(SUPERVISOR_SELECT, ['id' => $id]);

    if (count($supervisor)) {
        $employees = DB::select('SELECT * FROM employee WHERE id NOT IN (SELECT employee_id FROM role) AND id <> :id', ['id' => $id]);

        return view('supervisor/add_employee', [EMPLOYEES => $employees, 'id' => $id]);
    }

    return SUPERVISOR_NOT_FOUND;
});

//  add subordinate via HTTP POST
Route::post('/supervisor/{id}/employee/create', function ($id) {
    $supervisor = DB::select(SUPERVISOR_SELECT, ['id' => $id]);

    if (count($supervisor)) {
        $e_id = Input::get('id');

        DB::delete('DELETE FROM role WHERE supervisor_id = ? AND employee_id = 0', [$id]);
        DB::insert(SUPERVISOR_INSERTION, [$e_id, $id]);

        $supervisors = DB::select(SUPERVISORS_SELECT);
        $departments = DB::select(DEPARTMENT_SELECT);

        return view(SUPERVISORS_TEMPLATE, [DEPARTMENTS => $departments, EMPLOYEES => $supervisors]);
    }

    return SUPERVISOR_NOT_FOUND;
});

//  deletes a subordinate
Route::post('/supervisor/{sid}/employee/{id}/delete', function ($sid, $id) {
    DB::delete('DELETE FROM role WHERE employee_id = ? AND supervisor_id = ?', [$id, $sid]);

    $supervisors = DB::select(SUPERVISORS_SELECT);
    $departments = DB::select(DEPARTMENT_SELECT);

    $sup = DB::select('SELECT * FROM role WHERE supervisor_id = :id', ['id' => $sid]);

    if (!count($sup)) {
        DB::insert(SUPERVISOR_INSERTION, [0, $sid]);
    }

    return view(SUPERVISORS_TEMPLATE, [DEPARTMENTS => $departments, EMPLOYEES => $supervisors]);

});

//  deletes a supervisor
Route::post('/supervisor/{id}/delete', function ($id) {
    $supervisor = DB::select(SUPERVISOR_SELECT, ['id' => $id]);

    if (count($supervisor)) {
        DB::delete('DELETE FROM role WHERE supervisor_id = :id', ['id' => $supervisor[0]->id]);

        $supervisors = DB::select(SUPERVISORS_SELECT);
        $departments = DB::select(DEPARTMENT_SELECT);

        return view(SUPERVISORS_TEMPLATE, [DEPARTMENTS => $departments, EMPLOYEES => $supervisors]);
    }

    return SUPERVISOR_NOT_FOUND;
});

//  DEPARTMENTS

//  view all departments
Route::get('/departments', function () {
    $departments = DB::select(DEPARTMENT_SELECT);
    $employees = DB::select(EMPLOYEES_SELECT);

    return view(DEPARTMENTS_TEMPLATE, [DEPARTMENTS => $departments, EMPLOYEES => $employees]);
});

//  view a department by id
Route::get('/department/view/{id}', function ($id) {
    $department = DB::select(SINGLE_DEPARTMENT_SELECT, ['id' => $id]);
    $employee_list = DB::select(EMPLOYEES_SELECT);

    if (count($department)) {
        $locations = DB::select('SELECT * FROM located_in, location WHERE location_id = id AND department_id = :id', ['id' => $id]);
        $projects = DB::select('SELECT * FROM responsible_for, project WHERE project_id = id AND department_id = :id ORDER BY project_id', ['id' => $id]);
        $employees = DB::select('SELECT * FROM comp353_main_project.employee WHERE department_id = :id ORDER BY last_name', ['id' => $id]);

        return view('department/department', [DEPARTMENT => $department[0], 'employee_list' => $employee_list, LOCATIONS => $locations, PROJECTS => $projects, EMPLOYEES => $employees]);
    }

    return DEPARTMENT_NOT_FOUND;
});

//  add department location page
Route::get('/department/{id}/add_department_location', function ($id) {
    $locations = DB::select('SELECT * FROM location WHERE id NOT IN (SELECT location_id FROM located_in WHERE department_id = :id);', ['id' => $id]);

    return view('department/add_department_location', [LOCATIONS => $locations, 'id' => $id]);
});

//  add department location via HTTP POST
Route::post('/department/{id}/add_department_location', function ($id) {
    $department = DB::select(SINGLE_DEPARTMENT_SELECT, ['id' => $id]);

    if (count($department)) {
        $loc_id = Input::get('id');

        DB::insert('INSERT INTO located_in(location_id, department_id) VALUES (?, ?)', [$loc_id, $id]);

        $departments = DB::select(DEPARTMENT_SELECT);
        $employees = DB::select(EMPLOYEES_SELECT);

        return view(DEPARTMENTS_TEMPLATE, [DEPARTMENTS => $departments, EMPLOYEES => $employees]);
    }

    return DEPARTMENT_NOT_FOUND;
});

//  delete department location via HTTP POST
Route::post('/department/{dept_id}/location/{loc_id}/delete', function ($dept_id, $loc_id) {
    $department = DB::select(SINGLE_DEPARTMENT_SELECT, ['id' => $dept_id]);

    if (count($department)) {
        DB::delete('DELETE FROM located_in WHERE department_id = ? AND location_id = ?', [$dept_id, $loc_id]);

        $departments = DB::select(DEPARTMENT_SELECT);
        $employees = DB::select(EMPLOYEES_SELECT);

        return view(DEPARTMENTS_TEMPLATE, [DEPARTMENTS => $departments, EMPLOYEES => $employees]);
    }

    return DEPARTMENT_NOT_FOUND;
});

//  delete department project via HTTP POST
Route::post('/department/{dept_id}/project/{pro_id}/delete', function ($dept_id, $pro_id) {
    $department = DB::select(SINGLE_DEPARTMENT_SELECT, ['id' => $dept_id]);

    if (count($department)) {
        DB::delete('DELETE FROM responsible_for WHERE department_id = ? AND project_id = ?', [$dept_id, $pro_id]);

        $departments = DB::select(DEPARTMENT_SELECT);
        $employees = DB::select(EMPLOYEES_SELECT);

        return view(DEPARTMENTS_TEMPLATE, [DEPARTMENTS => $departments, EMPLOYEES => $employees]);
    }

    return DEPARTMENT_NOT_FOUND;
});

//  add project to department page
Route::get('department/{id}/project/create', function ($id) {
    $projects = DB::select('SELECT * FROM project WHERE id NOT IN (SELECT project_id FROM responsible_for)');

    return view('department/add_project', [PROJECTS => $projects, 'id' => $id]);
});

//  add project to department via HTTP POST
Route::post('/department/{id}/project/create', function ($id) {
    $p_id = Input::get('id');

    DB::insert('INSERT INTO responsible_for(department_id, project_id) VALUES (?, ?)', [$id, $p_id]);

    $departments = DB::select(DEPARTMENT_SELECT);
    $employees = DB::select(EMPLOYEES_SELECT);

    return view(DEPARTMENTS_TEMPLATE, [DEPARTMENTS => $departments, EMPLOYEES => $employees]);
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
    $start = Input::get('start');

    DB::insert('INSERT INTO department(name, manager_id, start_date) VALUES (?, ?, ?)', [$name, $manager_id, $start]);

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
Route::post('department/{id}/edit', function ($id) {
    $department = DB::select(SINGLE_DEPARTMENT_SELECT, ['id' => $id]);

    if (count($department)) {
        $name = Input::get('name');
        $manager = Input::get('manager');
        $start = Input::get('start');

        DB::update('UPDATE department SET name = ?, manager_id = ?, start_date = ? WHERE id = ?', [$name, $manager, $start, $department[0]->id]);

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

//  DEPENDENTS

//  add dependent page
Route::get('/employee/{id}/dependent/create', function ($id) {
    $employee = DB::select(EMPLOYEE_SELECT, ['id' => $id]);

    if (count($employee)) {
        return view('dependent/create', [EMPLOYEE => $employee[0]]);
    }

    return EMPLOYEE_NOT_FOUND;
});

//  add dependent via HTTP POST
Route::post('/employee/{id}/dependent/create', function ($id) {
    $employee = DB::select(EMPLOYEE_SELECT, ['id' => $id]);

    if (count($employee)) {
        $error = false;
        $msg = "";

        $first_name = Input::get(FIRST_NAME);
        $last_name = Input::get(LAST_NAME);
        $sin = Input::get('sin');
        $dob = Input::get('dob');
        $gender = Input::get(GENDER);

        if ($sin > 999999999 || $sin < 100000000) {
            $msg = BAD_SIN;

            $error = true;
        }

        if (Helper::duplicateSINChecker(intval($sin))) {
            $msg = DUPLICATE_SIN;

            $error = true;
        }

        if (!preg_match(DOB_REGEX, $dob)) {
            $msg = BAD_DOB;

            $error = true;
        }

        //  display error message for incorrect form submission
        if ($error) {
            return $msg;
        }

        $g = null;

        if ($gender == MALE) {
            $g = "M";
        } else if ($gender == FEMALE) {
            $g = "F";
        } else {
            $g = "O";
        }

        DB::insert('INSERT INTO dependent(first_name, last_name, sin, date_of_birth, gender, employee_id) VALUES (?, ?, ?, ?, ?, ?)', [$first_name, $last_name, $sin, $dob, $g, $employee[0]->id]);

        //  get employee's dependents
        $dependents = DB::select(EMPLOYEE_DEPENDENTS, ['id' => $id]);
        $departments = DB::select(DEPARTMENT_SELECT);

        //  get project employee is currently working on
        $project = DB::select(EMPLOYEE_PROJECT, ['id' => $id]);
        $supervisor = DB::select(EMPLOYEE_SUPERVISOR, ['id' => $id]);

        //  checks if the employee is assigned to a project
        if (!count($project)) {
            $project = null;
        }

        //  checks if the employee has a supervisor
        if (!count($supervisor)) {
            $supervisor[0] = null;
        }

        return view(EMPLOYEE_TEMPLATE, [EMPLOYEE => $employee[0], DEPARTMENTS => $departments, DEPENDENTS => $dependents, PROJECT => $project[0], SUPERVISOR => $supervisor[0]]);
    }

    return EMPLOYEE_NOT_FOUND;
});

//  edit dependent page
Route::get('/dependent/{id}/edit', function ($id) {
    $dependent = DB::select(DEPENDENT_SELECT, ['id' => $id]);

    if (count($dependent)) {
        return view('dependent/edit', ['dependent' => $dependent[0]]);
    }

    return DEPENDENT_NOT_FOUND;
});

//  update dependent via HTTP POST
Route::post('/dependent/{id}/edit', function ($id) {
    $dependent = DB::select(DEPENDENT_SELECT, ['id' => $id]);

    if (count($dependent)) {
        $error = false;
        $msg = "";

        $first_name = Input::get(FIRST_NAME);
        $last_name = Input::get(LAST_NAME);
        $sin = Input::get('sin');
        $dob = Input::get('dob');
        $gender = Input::get(GENDER);

        if ($sin > 999999999 || $sin < 100000000) {
            $msg = BAD_SIN;

            $error = true;
        }

        if (Helper::duplicateSINChecker(intval($sin))) {
            $msg = DUPLICATE_SIN;

            $error = true;
        }

        if (!preg_match(DOB_REGEX, $dob)) {
            $msg = BAD_DOB;

            $error = true;
        }

        //  display error message for incorrect form submission
        if ($error) {
            return $msg;
        }

        $g = null;

        if ($gender == MALE) {
            $g = "M";
        } else if ($gender == FEMALE) {
            $g = "F";
        } else {
            $g = "O";
        }

        DB::update('UPDATE dependent SET first_name = ?, last_name = ?, sin = ?, date_of_birth = ?, gender = ? WHERE id = ?', [$first_name, $last_name, $sin, $dob, $g, $dependent[0]->id]);

        //  get dependent's employee
        $employee = DB::select(EMPLOYEE_SELECT, ['id' => $dependent[0]->employee_id]);

        //  get employee's dependents
        $departments = DB::select(DEPARTMENT_SELECT);

        //  get project employee is currently working on
        $project = DB::select(EMPLOYEE_PROJECT, ['id' => $id]);
        $supervisor = DB::select(EMPLOYEE_SUPERVISOR, ['id' => $id]);

        //  checks if the employee is assigned to a project
        if (!count($project)) {
            $project = null;
        }

        //  checks if the employee has a supervisor
        if (!count($supervisor)) {
            $supervisor[0] = null;
        }

        //  minor bug here causing the page refresh to not show dependents, which forces us to
        //  have to refresh the page by navigating to /employee/view/id
        $dependents = DB::select(EMPLOYEE_DEPENDENTS, ['id' => $id]);

        return view(EMPLOYEE_TEMPLATE, [EMPLOYEE => $employee[0], DEPARTMENTS => $departments, DEPENDENTS => $dependents, PROJECT => $project[0], SUPERVISOR => $supervisor[0]]);
    }

    return DEPENDENT_NOT_FOUND;
});

//  delete dependent
Route::post('/dependent/{id}/delete', function ($id) {
    $dependent = DB::select(DEPENDENT_SELECT, ['id' => $id]);

    if (count($dependent)) {
        $employees = DB::select(EMPLOYEES_SELECT);
        $departments = DB::select(DEPARTMENT_SELECT);

        DB::delete('DELETE FROM dependent WHERE id = :id', ['id' => $id]);

        return view(EMPLOYEES_TEMPLATE, [EMPLOYEES => $employees, DEPARTMENTS => $departments]);
    }

    return DEPENDENT_NOT_FOUND;
});

//  PROJECTS

//  view all projects
Route::get('/projects', function () {
    $projects = DB::select(PROJECTS_SELECT);
    $locations = DB::select(LOCATIONS_SELECT);

    return view(PROJECTS_TEMPLATE, [PROJECTS => $projects, LOCATIONS => $locations]);
});

//  view a project by id
Route::get('/project/view/{id}', function ($id) {
    $project = DB::select(PROJECT_SELECT, ['id' => $id]);

    if (count($project)) {
        $locations = DB::select(LOCATIONS_SELECT);
        $departments = DB::select(DEPARTMENT_SELECT);
        $department = DB::select('SELECT * FROM responsible_for, department WHERE department_id = id AND project_id = :id;', ['id' => $id]);
        $employees = DB::select('SELECT * FROM works_on, employee WHERE id = employee_id AND project_id = :id ORDER BY id', ['id' => $id]);
        $sum_employees = DB::select('SELECT COUNT(id) FROM works_on, employee WHERE id = employee_id AND project_id = :id', ['id' => $id]);
        $sum_hours = DB::select('SELECT SUM(hours_worked) FROM works_on, employee WHERE id = employee_id AND project_id = :id', ['id' => $id]);;

        $dept = null;

        if (count($department)) {
            $dept = $department[0];
        }

        return view('project/project', [PROJECT => $project[0], DEPARTMENT => $dept, LOCATIONS => $locations, DEPARTMENTS => $departments, EMPLOYEES => $employees, 'sum_employees' => $sum_employees[0]->{'COUNT(id)'}, 'sum_hours' => $sum_hours[0]->{'SUM(hours_worked)'}]);
    }

    return PROJECT_NOT_FOUND;
});

//  create project page
Route::get('/project/create', function () {
    $locations = DB::select('SELECT * FROM location ORDER BY name');
    $departments = DB::select('SELECT * FROM department ORDER BY name');

    return view('project/create', [LOCATIONS => $locations, DEPARTMENTS => $departments]);
});

//  create project via HTTP POST
Route::post('/project/create', function () {
    $name = Input::get('name');
    $location = Input::get(LOCATION);
    $dept = Input::get(DEPARTMENT);

    DB::insert('INSERT INTO project(name, location_id) VALUES (?, ?)', [$name, $location]);
    $p_id = DB::select('SELECT * FROM project WHERE name = :n AND location_id = :id', ['n' => $name, 'id' => $location]);

    DB::insert('INSERT INTO responsible_for(department_id, project_id) VALUES (?, ?)', [$dept, $p_id[0]->id]);

    $projects = DB::select(PROJECTS_SELECT);
    $locations = DB::select(LOCATIONS_SELECT);

    return view(PROJECTS_TEMPLATE, [PROJECTS => $projects, LOCATIONS => $locations]);
});

//  edit project page
Route::get('/project/{id}/edit', function ($id) {
    $project = DB::select(PROJECT_SELECT, ['id' => $id]);

    if (count($project)) {
        $locations = DB::select('SELECT * FROM location ORDER BY name');
        $departments = DB::select('SELECT * FROM department ORDER BY name');

        return view('project/edit', [PROJECT => $project[0], LOCATIONS => $locations, DEPARTMENTS => $departments]);
    }

    return PROJECT_NOT_FOUND;
});

//  edit project via HTTP POST
Route::post('/project/{id}/edit', function ($id) {
    $project = DB::select(PROJECT_SELECT, ['id' => $id]);

    if (count($project)) {
        $name = Input::get('name');
        $location = Input::get(LOCATION);
        $dept = Input::get(DEPARTMENT);

        DB::update('UPDATE project SET name = ?, location_id = ? WHERE id = ?', [$name, $location, $project[0]->id]);
        DB::update('UPDATE responsible_for SET department_id = ? WHERE project_id = ?', [$dept, $project[0]->id]);

        $projects = DB::select(PROJECTS_SELECT);
        $locations = DB::select(LOCATIONS_SELECT);

        return view(PROJECTS_TEMPLATE, [PROJECTS => $projects, LOCATIONS => $locations]);
    }

    return PROJECT_NOT_FOUND;
});

//  delete project via HTTP POST
Route::post('/project/{id}/delete', function ($id) {
    $project = DB::select(PROJECT_SELECT, ['id' => $id]);

    if (count($project)) {
        DB::delete('DELETE FROM project WHERE id = :id', ['id' => $project[0]->id]);
        DB::delete('DELETE FROM responsible_for WHERE project_id = :id', ['id' => $project[0]->id]);

        $projects = DB::select(PROJECTS_SELECT);
        $locations = DB::select(LOCATIONS_SELECT);

        return view(PROJECTS_TEMPLATE, [PROJECTS => $projects, LOCATIONS => $locations]);
    }

    return PROJECT_NOT_FOUND;
});

//  add employee to project page
Route::get('/project/{id}/employee/create', function ($id) {
    $employees = DB::select('SELECT * FROM employee WHERE id NOT IN (SELECT employee_id FROM works_on)');

    return view('project/add_employee', [EMPLOYEES => $employees, 'id' => $id]);
});

//  add employee to project via HTTP POST
Route::post('/project/{id}/employee/create', function ($id) {
    $project = DB::select(PROJECT_SELECT, ['id' => $id]);

    if (count($project)) {
        $e_id = Input::get('id');
        $hours = Input::get('hours');

        DB::insert('INSERT INTO works_on(project_id, employee_id, hours_worked) VALUES (?, ?, ?)', [$id, $e_id, $hours]);

        $projects = DB::select(PROJECTS_SELECT);
        $locations = DB::select(LOCATIONS_SELECT);

        return view(PROJECTS_TEMPLATE, [PROJECTS => $projects, LOCATIONS => $locations]);
    }

    return PROJECT_NOT_FOUND;
});

//  edit project employee page
Route::get('/project/{id}/employee/{eid}/edit', function ($id, $eid) {
    $employee = DB::select('SELECT * FROM works_on WHERE employee_id = :eid AND project_id = :id', ['eid' => $eid, 'id' => $id]);

    if (count($employee)) {
        return view('project/edit_employee', [EMPLOYEE => $employee[0], 'id' => $id]);
    }

    return EMPLOYEE_NOT_FOUND;
});

//  edit project employee via HTTP POST
Route::post('/project/{id}/employee/{eid}/edit', function ($id, $eid) {
    $employee = DB::select('SELECT * FROM works_on WHERE employee_id = :eid AND project_id = :id', ['eid' => $eid, 'id' => $id]);

    if (count($employee)) {
        $hours = Input::get('hours');

        DB::update('UPDATE works_on SET hours_worked = ? WHERE employee_id = ? AND project_id = ?', [$hours, $eid, $id]);

        $projects = DB::select(PROJECTS_SELECT);
        $locations = DB::select(LOCATIONS_SELECT);

        return view(PROJECTS_TEMPLATE, [PROJECTS => $projects, LOCATIONS => $locations]);
    }

    return EMPLOYEE_NOT_FOUND;
});

//  delete project employee via HTTP POST
Route::post('/project/{id}/employee/{eid}/delete', function ($id, $eid) {
    $employee = DB::select('SELECT * FROM works_on WHERE employee_id = :eid AND project_id = :id', ['eid' => $eid, 'id' => $id]);

    if (count($employee)) {
        DB::delete('DELETE FROM works_on WHERE employee_id = :eid AND project_id = :id;', ['eid' => $eid, 'id' => $id]);

        $projects = DB::select(PROJECTS_SELECT);
        $locations = DB::select(LOCATIONS_SELECT);

        return view(PROJECTS_TEMPLATE, [PROJECTS => $projects, LOCATIONS => $locations]);
    }

    return EMPLOYEE_NOT_FOUND;
});

//  LOCATIONS

//  view all locations
Route::get('/locations', function () {
    $locations = DB::select(LOCATIONS_SELECT);

    return view(LOCATIONS_TEMPLATE, [LOCATIONS => $locations]);
});

//  view a location by id
Route::get('/location/view/{id}', function ($id) {
    $location = DB::select(LOCATION_SELECT, ['id' => $id]);

    if (count($location)) {
        $departments = DB::select('SELECT * FROM department WHERE id IN (SELECT department_id FROM located_in WHERE location_id = :id)', ['id' => $id]);
        $projects = DB::select('SELECT * FROM project WHERE id IN (SELECT project_id FROM responsible_for WHERE department_id IN (SELECT department_id FROM located_in WHERE location_id = :id)) AND location_id = :id2', ['id' => $id, 'id2' => $id]);
        $locations = DB::select('SELECT * FROM location');

        return view('location/location', [LOCATION => $location[0], DEPARTMENTS => $departments, PROJECTS => $projects, LOCATIONS => $locations]);
    }

    return LOCATION_NOT_FOUND;
});

//  create location page
Route::get('/location/create', function () {
    return view('location/create');
});

//  create location via HTTP POST
Route::post('/location/create', function () {
    $name = Input::get('name');
    $address = Input::get(ADDRESS);

    DB::insert('INSERT INTO location(name, address) VALUES (?, ?)', [$name, $address]);

    $locations = DB::select(LOCATIONS_SELECT);

    return view(LOCATIONS_TEMPLATE, [LOCATIONS => $locations]);
});

//  edit location page
Route::get('/location/{id}/edit', function ($id) {
    $location = DB::select(LOCATION_SELECT, ['id' => $id]);

    if (count($location)) {
        return view('location/edit', [LOCATION => $location[0]]);
    }

    return LOCATION_NOT_FOUND;
});

//  edit location via HTTP POST
Route::post('/location/{id}/edit', function ($id) {
    $location = DB::select(LOCATION_SELECT, ['id' => $id]);

    if (count($location)) {
        $name = Input::get('name');
        $address = Input::get(ADDRESS);

        DB::update('UPDATE location SET name = ?, address = ? WHERE id = ?', [$name, $address, $location[0]->id]);

        $locations = DB::select(LOCATIONS_SELECT);

        return view(LOCATIONS_TEMPLATE, [LOCATIONS => $locations]);
    }

    return LOCATION_NOT_FOUND;
});

//  delete location via HTTP POST
Route::post('/location/{id}/delete', function ($id) {
    $location = DB::select(LOCATION_SELECT, ['id' => $id]);

    if (count($location)) {
        DB::delete('DELETE FROM location WHERE id = :id', ['id' => $id]);

        $locations = DB::select(LOCATIONS_SELECT);

        return view(LOCATIONS_TEMPLATE, [LOCATIONS => $locations]);
    }

    return LOCATION_NOT_FOUND;
});