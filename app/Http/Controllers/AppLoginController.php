<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AppLoginController extends Controller
{
    public function logingApp(Request $req){
        $students = Student::where('email', $req->email)->get();
        $student = $students[0];
        if(!empty($student)){
            $pass = hash('sha256', $req->password);
            if($student->password == $pass){
                $response = array('error_code' => 200, 'error_msg' => 'Alumno');
            }
            else{
                $response = array('error_code' => 404, 'error_msg' => 'Contraseña erronea');
            }
        }
        else{
            $teachers = Teacher::where('email', $req->email)->get();
            $teacher = $teachers[0];
            if(!empty($teacher)){
                echo "1";
                die;
                $pass = Hash::make($req->input('password'));
                if($teacher->password== $pass){
                    $response = array('error_code' => 200, 'error_msg' => 'Profesor');
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
