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
Route::get('/students', 'StudentController@listAllStudent');
Route::post('/students/add', 'StudentController@addStudent');
Route::put('/students/update/{id}', 'StudentController@updateStudent');
Route::delete('/students/delete/{id}', 'StudentController@deleteStudent');

//CRUD Profesores
Route::get('/teachers', 'TeacherController@listAllTeacher');
Route::post('/teachers/add', 'TeacherController@addTeacher');
Route::put('/teachers/update/{id}', 'TeacherController@updateTeacher');
Route::delete('/teachers/delete/{id}', 'TeacherController@deleteTeacher');

//CRUD Admin
Route::get('/admins', 'AdminController@listAllAdmin');
Route::post('/admins/add', 'AdminController@addAdmin');
Route::put('/admins/update/{id}', 'AdminController@updateAdmin');
Route::delete('/admins/delete/{id}', 'AdminController@deleteAdmin');

//Filtros
Route::get('/students/{$license}', 'StudentController@listByLicense');
