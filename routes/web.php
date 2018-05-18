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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 社員管理
Route::name('employees.')->group(function () {
    Route::get('/employees', 'EmployeesController@index')->name('index');
    Route::get('/employees/new', 'EmployeesController@new')->name('new');
    Route::post('/employees', 'EmployeesController@create')->name('create');
    Route::get('/employees/edit/{employee}', 'EmployeesController@edit')->name('edit');
    Route::patch('/employees/{employee}', 'EmployeesController@update')->name('update');
    Route::delete('/employees/{employee}', 'EmployeesController@destroy')->name('destroy');
});
