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

Auth::routes([ 'register' => false ]);

//Views menus
Route::middleware('auth:web')->get('/home', 'HomeController@index')->name('home');
Route::middleware('auth:web')->get('/home/students', 'HomeController@students')->name('students');
Route::middleware('auth:web')->get('/home/teachers', 'HomeController@teachers')->name('teachers');
Route::middleware('auth:web')->get('/home/admins', 'HomeController@admins')->name('admins');
Route::middleware('auth:web')->get('/home/units', 'HomeController@units')->name('units');

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

//Views admins
Route::middleware('auth:web')->get('/home/admins/all', 'UserController@searchAdmins')->name('searchAdmins');
Route::middleware('auth:web')->get('/home/admins/add', 'UserController@addAdmins')->name('addAdmins');
Route::middleware('auth:web')->get('/home/admins/modify', 'UserController@modifyAdmins')->name('modifyAdmins');
Route::middleware('auth:web')->get('/home/admins/delete', 'UserController@deleteAdmins')->name('deleteAdmins');

// Rutas funcionalidades admins
Route::middleware('auth:web')->get('/home/admins/search', 'UserController@listByName');
Route::middleware('auth:web')->post('/home/admins/add', 'UserController@addAdmin');
Route::middleware('auth:web')->put('/home/admins/modify', 'UserController@updateAdmin');
Route::middleware('auth:web')->delete('/home/admins/delete', 'UserController@deleteAdmin');

//Views units
Route::middleware('auth:web')->get('/home/units/all', 'UnitController@searchUnits')->name('searchUnits');
Route::middleware('auth:web')->get('/home/units/addUnits', 'UnitController@addUnits')->name('addUnits');
Route::middleware('auth:web')->get('/home/units/addLessons', 'UnitController@addLessons')->name('addLessons');
Route::middleware('auth:web')->get('/home/units/modify', 'UnitController@modifyUnits')->name('modifyUnits');
Route::middleware('auth:web')->get('/home/units/delete', 'UnitController@deleteUnits')->name('deleteUnits');

// Rutas funcionalidades units
Route::middleware('auth:web')->get('/home/units/search', 'UnitController@listByID');
Route::middleware('auth:web')->post('/home/unit/add','UnitController@addUnit');
Route::middleware('auth:web')->put('/home/unit/update','UnitController@updateUnit');
Route::middleware('auth:web')->delete('/home/unit/delete','UnitController@deleteUnit');

// Rutas funcionalidades Lesson
Route::middleware('auth:web')->get('/lesson', 'LessonController@listAllLessons');
Route::middleware('auth:web')->get('/lesson/{id}', 'LessonController@listByID');
Route::middleware('auth:web')->post('/lesson/add','LessonController@addLesson');
Route::middleware('auth:web')->put('/lesson/update/{id}','UnitController@updateLesson');
Route::middleware('auth:web')->delete('/lesson/delete/{id}','LessonController@deleteLesson');

Route::get('prueba', 'TestController@generateTest');
Route::get('prueba2', 'TestController@listForPass');