<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();
Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'company'], function () {
        Route::get('/', 'CompaniesController@index')->name('company.index');
        Route::post('/', 'CompaniesController@store')->name('company.store');
        Route::put('/', 'CompaniesController@store')->name('company.store');
        Route::get('/{company}', 'CompaniesController@destroy')->name('company.destroy');
    });
    Route::group(['prefix' => 'employee'], function () {
        Route::get('/', 'EmployeesController@index')->name('employee.index');
        Route::post('/', 'EmployeesController@store')->name('employee.store');
        Route::put('/', 'EmployeesController@store')->name('employee.store');
        Route::get('/{employee}', 'EmployeesController@destroy')->name('employee.destroy');
    });
});
