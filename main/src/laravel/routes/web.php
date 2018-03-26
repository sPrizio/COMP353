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
    $employees = DB::select('SELECT * FROM employee');
    $departments = DB::select('SELECT * FROM department');
    return view('employee/employees', ['employees' => $employees, 'departments' => $departments]);
});

//  view an employee by id
Route::get('/employee/{id}', function($id) {
    $employee = DB::select('SELECT * FROM employee WHERE id=:id', ['id' => $id]);
    return view('employee/employee');
});

//  view all departments
Route::get('/departments', function() {

});

//  view a department by id
Route::get('/department/{id}', function($id) {
    return 'YUPPERS';
});

//  view all projects
Route::get('/projects', function() {

});

//  view a project by id
Route::get('/project/{id}', function($id) {

});