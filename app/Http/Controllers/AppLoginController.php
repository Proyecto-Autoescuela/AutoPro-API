<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AppLoginController extends Controller
{
    public function logingApp(Request $req){
        $student = Student::where('email', $req->email)->first();
        if(!empty($student)){
            $pass = Hash::make($req->password);
            if($student->password == $pass){
                $response = array('error_code' => 200, 'error_msg' => 'Alumno');
            }
            else{
                $response = array('error_code' => 404, 'error_msg' => 'Contraseña erronea');
            }
        }
        else{
            $teacher = Teacher::where('email', $req->email)->first();
            if(!empty($teacher)){
                $pass = Hash::make($req->password);
                if($teacher->password == $pass){
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
