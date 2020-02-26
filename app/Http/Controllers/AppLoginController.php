<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AppLoginController extends Controller
{
    public function logingApp(Request $req){
        $students = Student::where('email', $req->email)->first();
        if(!empty($students)){
            $pass = ($req->password);
            if(Hash::check($pass, $students->password)){
                $student = Student::where('email', $req->email)->first(['id', 'name', 'email', 'teacher_id', 'license']);
                $response = array('error_code' => 200, 'error_msg' => 'Alumno', 'student' => $student);
            }
            else{
                $response = array('error_code' => 404, 'error_msg' => 'Contraseña erronea');
            }
        }
        else{
            $teachers = Teacher::where('email', $req->email)->first();
            if(!empty($teachers)){
                $pass = $req->password;
                if(Hash::check($pass, $teachers->password)){
                    $teacher = Teacher::where('email', $req->email)->first(['id', 'name', 'email']);
                    $response = array('error_code' => 200, 'error_msg' => 'Profesor', 'teacher' => $teacher);
                }
                else{
                    $response = array('error_code' => 404, 'error_msg' => 'Contraseña erronea');
                }
            }
            else{
                $response = array('error_code' => 404, 'error_msg' => 'email erroneo');
            }
        }
        return response() -> json($response);
    }
}


