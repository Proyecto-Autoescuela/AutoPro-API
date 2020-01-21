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

//Views menus
Route::middleware('auth:web')->get('/home', 'HomeController@index')->name('home');
Route::middleware('auth:web')->get('/home/students', 'HomeController@students')->name('students');
Route::middleware('auth:web')->get('/home/teachers', 'HomeController@teachers')->name('teachers');

//Views students
Route::middleware('auth:web')->get('/home/students/all', 'StudentController@search')->name('search');
Route::middleware('auth:web')->get('/home/students/add', 'StudentController@add')->name('add');
Route::middleware('auth:web')->get('/home/students/modify', 'StudentController@modify')->name('modify');
Route::middleware('auth:web')->get('/home/students/delete', 'StudentController@delete')->name('delete');


Route::middleware('auth:web')->post('home/students/add','StudentController@addStudent');