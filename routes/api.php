<?php

use Illuminate\Http\Request;

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

//CRUD Estudiantes
Route::middleware('auth:api')->get('/students','StudentController@listAllStudent');
Route::middleware('auth:api')->post('/students/add','StudentController@addStudent');
Route::middleware('auth:api')->put('/students/update/{id}','StudentController@updateStudent');
Route::middleware('auth:api')->delete('/students/delete/{id}','StudentController@deleteStudent');

//CRUD Profesores
Route::middleware('auth:api')->get('/teachers','TeacherController@listAllTeacher');
Route::middleware('auth:api')->post('/teachers/add','TeacherController@addTeacher');
Route::middleware('auth:api')->put('/teachers/update/{id}','TeacherController@updateTeacher');
Route::middleware('auth:api')->delete('/teachers/delete/{id}','TeacherController@deleteTeacher');

//CRUD User
Route::middleware('auth:api')->get('/users','UserController@listAllUser');
Route::middleware('auth:api')->post('/users/add','UserController@addUser');
Route::middleware('auth:api')->put('/users/update/{id}','UserController@updateUser');
Route::middleware('auth:api')->delete('/users/delete/{id}','UserController@deleteUser');

// Login App
Route::middleware('auth:api')->get('/loginApp','AppLoginController@logingApp');

// CRUD Temas
Route::middleware('auth:api')->get('/unit', 'UnitController@listAllUnit');
Route::middleware('auth:api')->get('/unit/{id}', 'UnitController@listByID');
Route::middleware('auth:api')->post('/unit/add','UnitController@addUnit');
Route::middleware('auth:api')->put('/unit/update/{id}','UnitController@updateUnit');
Route::middleware('auth:api')->delete('/unit/delete/{id}','UnitController@deleteUnit');

// CRUD Lesson
Route::middleware('auth:api')->get('/lesson', 'LessonController@listAllLessons');
Route::middleware('auth:api')->get('/lesson/{id}', 'LessonController@findByID');
Route::middleware('auth:api')->post('/lesson/add','LessonController@addLesson');
Route::middleware('auth:api')->put('/lesson/update/{id}','UnitController@updateLesson');
Route::middleware('auth:api')->delete('/lesson/delete/{id}','LessonController@deleteLesson');
// //Filtros AppLoginController
// Route::middleware('auth:api')->get('/students/{$license}', 'StudentController@listByLicense');
Route::post('prueba/add', 'TestController@saveTest');