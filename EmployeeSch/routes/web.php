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

//route for schedule
Route::get('/EmpSchedule', 'EmpSchedule@index');
Route::get('/EmpSchedule/schedule/{id}', 'EmpSchedule@schedule');
Route::get('/EmpSchedule/emp/{user_id}/add', 'EmpSchedule@add');
Route::post('/EmpSchedule/emp/{user_id}/save', 'EmpSchedule@save');
Route::get('/EmpSchedule/emp/{user_id}/edit/{id}', 'EmpSchedule@edit');
Route::post('/EmpSchedule/emp/{user_id}/update', 'EmpSchedule@update');
Route::get('/EmpSchedule/emp/{user_id}/delete/{id}', 'EmpSchedule@delete');


//route for Users
Route::get('/Users', ['uses'=>'UserController@index', 'as'=>'users.index']);
Route::get('/Users/details/{id}', 'UserController@details');
Route::get('/Users/edit/{id}', 'UserController@edit');
Route::get('/Users/add', 'UserController@add');
Route::post('/Users/update/{id}', 'UserController@update');
Route::post('/Users/save', 'UserController@save');
Route::get('Users/resetpass/user/{id}', 'UserController@resetPass');
Route::get('Users/delete/user/{id}', 'UserController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
