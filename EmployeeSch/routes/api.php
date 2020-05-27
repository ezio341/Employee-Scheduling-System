<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Employee Schedule
Route::get('/Schedule', 'api\EmpSchedule@index');
Route::get('/Schedule/user/{user_id}', 'api\EmpSchedule@getUser');
Route::get('/Schedule/id/{id}', 'api\EmpSchedule@getId');
Route::post('/Schedule', 'api\EmpSchedule@create');
Route::put('/Schedule/update/{id}', 'api\EmpSchedule@update');
Route::delete('/Schedule/delete/{id}', 'api\EmpSchedule@delete');
//Employee User
Route::get('/User', 'api\EmpUser@index');
Route::get('/User/{id}', 'api\EmpUser@getId');
Route::post('/User', 'api\EmpUser@create');
Route::put('/User/update/{id}', 'api\EmpUser@update');
Route::delete('/User/delete/{id}', 'api\EmpUser@delete');
//Employee Profile
Route::get('/Emp', 'api\Emp@index');
Route::get('/Emp/user/{user_id}', 'api\Emp@getUser');
Route::get('/Emp/id/{id}', 'api\Emp@getId');
Route::post('/Emp', 'api\Emp@create');
Route::put('/Emp/update/{id}', 'api\Emp@update');
Route::delete('/Emp/delete/{id}', 'api\Emp@delete');