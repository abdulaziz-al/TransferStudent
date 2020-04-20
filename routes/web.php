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

Route::get('/setlocation', 'AdminController@location');
Route::get('/setCourse', 'AdminController@stuCourse');
Route::get('/stuset', 'AdminController@StuTable');
Route::get('/passCourse', 'AdminController@passCourse');
Route::get('/sethead', 'AdminController@Head');
Route::get('/setdepartment', 'AdminController@HeadOfDepartment');

Route::post('/min', 'AdminController@Minper')->name('Minper');

Route::get('/showallstu', 'AdminController@showAllTransferStu');

Route::get('/showResult', 'AdminController@ShowResoult');







////////////////////////////////////////////////////////////////

Route::get('/alldep', 'AdminController@AllDepartment');
Route::post('/sets', 'AdminController@setdefault')->name('setdefault');




Route::post('/seeResult','AdminController@ResultStudent')->name('ResultStudent');



/////////////////student//////
Route::post('/setbackground', 'StuController@setbackground')->name('setbackground');
Route::get('/profile','StuController@ProfilStu');
Route::get('/background','StuController@showBG');
Route::get('/allDepartment','StuController@ShowAllDepartment');
Route::post('/allDepartment','StuController@selectDepartment')->name('selectDepartment');
Route::get('/seeallstu','StuController@setAllsetudent');//for give wishes
Route::get('/StuResult','StuController@StuResult');//for give wishes





//////////head//////
Route::get('/ResultStudent', 'HeadController@ResultStudent');
Route::get('/info','HeadController@ProfileHead');
Route::get('/department','HeadController@Department');// show weight 
Route::post('/department', 'HeadController@setweighted')->name('department');//set weight
Route::get('/headbackgound','HeadController@ShowStuBG'); 
Route::post('/AcceptBG','HeadController@Accept')->name('Accept'); 
Route::post('/rejectBG','HeadController@Reject')->name('Reject'); 







