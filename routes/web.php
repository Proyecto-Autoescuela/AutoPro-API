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

// Rutas funcionalidades students
Route::middleware('auth:web')->get('/home/students/search', 'StudentController@listByName');
Route::middleware('auth:web')->post('/home/students/add','StudentController@addStudent');
Route::middleware('auth:web')->put('/home/students/modify','StudentController@updateStudent');
Route::middleware('auth:web')->delete('/home/students/delete','StudentController@deleteStudent');


//Views teachers
Route::middleware('auth:web')->get('/home/teachers/all', 'TeacherController@searchTeachers')->name('searchTeachers');
Route::middleware('auth:web')->get('/home/teachers/add', 'TeacherController@addTeachers')->name('addTeachers');
Route::middleware('auth:web')->get('/home/teachers/modify', 'TeacherController@modifyTeachers')->name('modifyTeachers');
Route::middleware('auth:web')->get('/home/teachers/delete', 'TeacherController@deleteTeachers')->name('deleteTeachers');

// Rutas funcionalidades teachers
Route::middleware('auth:web')->get('/home/teachers/search', 'TeacherController@listByName');
Route::middleware('auth:web')->post('/home/teachers/add', 'TeacherController@addTeacher');
Route::middleware('auth:web')->put('/home/teachers/modify', 'TeacherController@updateTeacher');
Route::middleware('auth:web')->delete('/home/teachers/delete', 'TeacherController@deleteTeacher');


// CRUD Temas
Route::middleware('auth:web')->get('/home/unit', 'UnitController@listAllUnit');
Route::middleware('auth:web')->get('/home/unit/{id}', 'UnitController@listAllUnit');
Route::middleware('auth:web')->post('/home/unit/add','UnitController@addUnit');
Route::middleware('auth:web')->put('/home/unit/update/{id}','UnitController@updateUnit');
Route::middleware('auth:web')->delete('/home/unit/delete/{id}','UnitController@deleteUnit');