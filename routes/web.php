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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 社員管理
Route::get('/employees', 'EmployeesController@index')->name('employees.index');
Route::get('/employees/new', 'EmployeesController@new')->name('employees.new');
Route::post('/employees/create', 'EmployeesController@create')->name('employees.create');
Route::get('/employees/edit/{employee}', 'EmployeesController@edit')->name('employees.edit');
Route::post('/employees/update/{employee}', 'EmployeesController@update')->name('employees.update');
