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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//////////////////////////////////////////////abdulaziz////////////////////////////




///////   for Admin

Route::get('/setlocation','AdminController@location');
Route::get('/setCourse','AdminController@stuCourse');
Route::get('/stuset','AdminController@StuTable');
Route::get('/passCourse','AdminController@passCourse');
Route::get('/sethead','AdminController@Head');
Route::get('/setdepartment','AdminController@HeadOfDepartment');




////////////////////////////////////////////////////////////////

Route::get('/transfer','AdminController@StudentTable');
Route::get('/alldep','AdminController@AllDepartment');
Route::post('/sets','AdminController@setdefault')->name('setdefault');
