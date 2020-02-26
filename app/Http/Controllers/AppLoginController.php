<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AppLoginController extends Controller
{
    public function logingApp(Request $req){
        $student = Student::where('email', $req->email)->first(['id', 'name', 'email', 'teacher_id', 'license']);
        if(!empty($student)){
            $pass = ($req->password);
            if(Hash::check($pass, $student->password)){
                $response = array('error_code' => 200, 'error_msg' => 'Alumno', 'student' => $student);
            }
            else{
                $response = array('error_code' => 404, 'error_msg' => 'Contraseña erronea');
            }
        }
        else{
            $teacher = Teacher::where('email', $req->email)->first(['id', 'name', 'email']);
            if(!empty($teacher)){
                $pass = $req->password;
                if(Hash::check($pass, $teacher->password)){
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


