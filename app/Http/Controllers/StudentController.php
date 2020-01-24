<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class StudentController extends Controller
{

    // Listar estudiantes
    public function listAllStudent()
    {
        $students = Student::all(['name', 'email', 'teacher_id', 'license']);
        if(empty($students)){
            $students = array('error_code' => 400, 'error_msg' => 'No hay estudiantes encontrados');
        }else{
            return response()->json($students);
        }
    }

    // Buscar por ID
    public function listByID(Request $req)
    {
        $id = $req->id;
        $response = array('error_code' => 404, 'error_msg' => 'Nombre ' .$id. ' no encontrado');
        $response = Student::where('id', $id)->get();
        return response() -> json($response);
    }

    // Buscar por nombre
    public function listByName()
    {   
        $name = ucfirst(Input::get ('name'));
        $response = array('error_code' => 404, 'error_msg' => 'Nombre ' .$name. ' no encontrado');
        $response = Student::where('name', $name)->get(['name', 'email', 'teacher_id', 'license']);
        return response() -> json($response);
    }

    // Buscar por email
    public function listByMail($email)
    {
        $response = array('error_code' => 404, 'error_msg' => 'email ' .$email. ' no encontrada');
        $response = Student::where('email', $email)->get();
        return response() -> json($response);
    }

    // Buscar por licencia
    public function listByLicense($license)
    {
        $response = array('error_code' => 404, 'error_msg' => 'Licencia ' .$license. ' no encontrada');
        $response = Student::where('license', $license)->get();
        return response() -> json($response);
    }

    // Añadir estudiante
    public function addStudent(Request $req)
    {
        $response = array('error_code' => 400, 'error_msg' => 'Error inserting info');
        $students = new Student;
        
        if(!$req->name){
            $response['error_msg'] = 'Name is required';
        }
        elseif(!$req->email)
        {
            $response['error_msg'] = 'Email is required';
        }
        elseif(!$req->password)
        {
            $response['error_msg'] = 'Password is required';
        }
        elseif(!$req->teacher_id)
        {
            $response['error_msg'] = 'Teacher_id is required';
        }
        elseif(!$req->license)
        {
            $response['error_msg'] = 'License is required';
        }
        else
        {
            try{
                $students->name = $req->input('name');
                $students->email = $req->input('email') ;
                $pass = hash('sha256', $req->password);
                $students->password = $pass;
                $students->teacher_id = $req->input('teacher_id');
                $students->license = $req->input('license');
                $students->save();
                $response = array('error_code' => 200, 'error_msg' => '');
            }
            catch(\Exception $e){
                $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
            }
        }
        return response()->json($response);
    }

    // Editar estudiante
    public function updateStudent(Request $req,$id)
    {
        $response = array('error_code' => 404, 'error_msg' => 'Estudiante '.$id.' no encontrado');
        $students = Student::find($id);
        if(!empty($students)){
            $dataOk = true;
            $error_msg = "";
            if(empty($req->name)){
                $dataOk = false;
                $error_msg = "Name can't be empty";
            }else{
                $students->name = $req->name;
            }
            if(empty($req->email)){
                $dataOk = false;
                $error_msg = "Email can't be empty";
            }else{
                $students->email = $req->email;
            }
            if(empty($req->password)){
                $dataOk = false;
                $error_msg = "Paswword can't be empty";
            }else{
                $students->password = $req->password;
            }
            if(empty($req->teacher_id)){
                $dataOk = false;
                $error_msg = "Teacher_id can't be empty";
            }else{
                $students->teacher_id = $req->teacher_id;
            }
            if(empty($req->license)){
                $dataOk = false;
                $error_msg = "License can't be empty";
            }else{
                $students->license = $req->license;
            }
            if(!$dataOk){
                $response = array('error_code' => 400, 'error_msg' => $error_msg);
            }else{
                try{
                    $students->name = $req->input('name');
                    $students->email = $req->input('email');
                    $pass = hash('sha256', $req->password);
                    $students->password = $pass;
                    $students->teacher_id = $req->input('teacher_id');
                    $students->license = $req->input('license');
                    $students->save();
                    $response = array('error_code' => 200, 'error_msg' => '');
                }catch(\Exception $e){
                    $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
                }
            }
        return response()->json($response);
        }
    }

    // Borrar estudiante
    public function deleteStudent(Request $req)
    {
        $id = $req->id;
        $response = array('error_code' => 404, 'error_msg' => 'Estudiante '.$id.' no encontrado');
        $students = Student::find($id);
        if(empty($students)){
            $response = array('error_code' => 400, 'error_msg' => "Estudiante ".$id." no puede ser borrado");
        }else{
            try{
                $students->delete();
                $response = array('error_code' => 200, 'error_msg' => '');
            }catch(\Exception $e){
                $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
            }
        }
        return response()->json($response);
    }

    //Vistas ADMIN
    public function search(){
        return view('studentViews/searchStudentsView');
    }

    public function add()
    {
        return view('studentViews/addStudentsView');
    }

    public function modify()
    {
        return view('studentViews/modifyStudentsView');
    }

    public function delete()
    {
        return view('studentViews/deleteStudentsView');
    }
}