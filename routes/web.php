<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/createdept', 'DepartmentController@create')->name('dept.create');
Route::post('/storedept', 'DepartmentController@store')->name('dept.store');
Route::get('/dept/{department}/edit', 'DepartmentController@edit')->name('dept.edit');
Route::put('/dept/{department}', 'DepartmentController@update')->name('dept.update');
Route::delete('/dept/{department}', 'DepartmentController@destroy')->name('dept.delete');
Route::get('/dept/{department}/show', 'DepartmentController@show')->name('dept.show');
Route::get('/dept/{department}/employeecreate', 'EmployeeController@create')->name('emp.create');
Route::post('/dept/{department}/employeestore', 'EmployeeController@store')->name('emp.store');
Route::get('/dept/{department}/emp/{employee}/edit', 'EmployeeController@edit')->name('emp.edit');
Route::put('/dept/{department}/emp/{employee}', 'EmployeeController@update')->name('emp.update');
Route::delete('/dept/{department}/emp/{employee}', 'EmployeeController@destroy')->name('emp.delete');