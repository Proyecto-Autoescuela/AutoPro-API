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
Route::get('/home/students', 'HomeController@students')->name('students');
Route::get('/home/teachers', 'HomeController@teachers')->name('teachers');

//Views
Route::get('/home/students/all', 'StudentController@search')->name('search');
Route::get('/home/students/add', 'StudentController@add')->name('add');
Route::get('/home/students/modify', 'StudentController@modify')->name('modify');
Route::get('/home/students/delete', 'StudentController@delete')->name('delete');


//Actions
Route::get('StudentController@listAllStudent')->name('listStudents');
Route::post('StudentController@addStudent')->name('addStudent');