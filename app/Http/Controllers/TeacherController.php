<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use Illuminate\Support\Facades\Input;
class TeacherController extends Controller 
{

    // Listar profesores
    public function listAllTeacher(){
        $teachers = Teacher::all(['id', 'name', 'email']);
        if(empty($teachers)){
            $teachers = array('error_code' => 400, 'error_msg' => 'No hay profesores encontrados');
        }else{
            return response()->json($teachers);
        }
    }

    // Buscar por nombre
    public function listByName()
    {   
        $name = ucfirst(Input::get ('name'));
        $response = array('error_code' => 404, 'error_msg' => 'Nombre ' .$name. ' no encontrado');
        $response = Teacher::where('name','LIKE','%'.$name.'%')
        ->get(['id', 'name', 'email']);
        if(count($response) > 0)
            return view('TeacherViews/searchTeachersView', ['teacher' => $response]);
        else return view('TeacherViews/searchTeachersView')->withMessage('No Details found. Try to search again !');
    }
    
    // Añadir profesor
    public function addTeacher(Request $req)
    {
        $response = array('error_code' => 400, 'error_msg' => 'Error inserting info');
        $teachers = new Teacher;

        if(!$req->name){
            $response['error_msg'] = 'Name es necesario';
        }
        elseif(!$req->email)
        {
            $response['error_msg'] = 'Email es necesario';
        }
        elseif(!$req->password)
        {
            $response['error_msg'] = 'Password es necesario';
        }
        else
        {
            try{
                $teachers->name = $req->input('name');
                $teachers->email = $req->input('email');
                $pass = hash('sha256', $req->password);
                $teachers->password = $pass;
                $teachers->save();
                $response = array('error_code' => 200, 'error_msg' => '');
                }
                catch(\Exception $e)
                {
                $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
            }
        }
        return view('TeacherViews/addTeachersView');
    }

    // Editar profesor
    public function updateTeacher(Request $req)
    {
        $teacher_id = $req->id;
        $response = array('error_code' => 404, 'error_msg' => 'Profesor '.$teacher_id.' no encontrado');
        $teachers = Teacher::find($teacher_id);
        if(!empty($teachers)){
            $dataOk = true;
            $error_msg = "";
            if(empty($req->name)){
                $dataOk = false;
                $error_msg = "Name no puede estar vacio";
            }else{
                $teachers->name = $req->name;
            }
            if(empty($req->email)){
                $dataOk = false;
                $error_msg = "Email no puede estar vacio";
            }else{
                $teachers->email = $req->email;
            }
            if(empty($req->password)){
                $dataOk = false;
                $error_msg = "Paswword no puede estar vacio";
            }else{
                $teachers->password = $req->password;
            }
            if(!$dataOk){
                $response = array('error_code' => 400, 'error_msg' => $error_msg);
            }else{
                try{
                    $teachers->name = $req->input('name');
                    $teachers->email = $req->input('email') ;
                    $pass = Hash::make($req->password);
                    $teachers->password = $pass;
                    $teachers->save();
                    $response = array('error_code' => 200, 'error_msg' => '');
                }catch(\Exception $e){
                    $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
                }
            }
            return view('TeacherViews/modifyTeachersView');
        }
    }

    // Borrar profesor
    public function deleteTeacher(Request $req)
    {
        $id = $req->id;
        $response = array('error_code' => 404, 'error_msg' => 'Profesor '.$id.' no encontrado');
        $teachers = Teacher::find($id);
        if(empty($teachers)){
            $response = array('error_code' => 400, 'error_msg' => "Profesor ".$id." no puede ser borrado");
        }else{
            try{
                $teachers->delete();
                $response = array('error_code' => 200, 'error_msg' => '');
            }catch(\Exception $e){
                $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
            }
        }
        return view('teacherViews/deleteTeachersView');
    }

    public function recoverPass(Request $req){
        $teachers_id = $req->id;
        $response = array('error_code' => 404, 'error_msg' => 'Estudiante '.$teachers_id.' no encontrado');
        $teachers = Teacher::find($teachers_id);
        if(empty($req->password)){
            $dataOk = false;
            $error_msg = "Paswword can't be empty";
        }else{
            $teachers->password = $req->password;
        }
        if(!$dataOk){
            $response = array('error_code' => 400, 'error_msg' => $error_msg);
        }else{
            try{
                $teachers->name = $teachers->name;
                $teachers->email = $teachers->email;
                $pass = Hash::make($req->password);
                $teachers->password = $pass;
                $teachers->save();
                $response = array('error_code' => 200, 'error_msg' => 'contraseña cambiada');
            }catch(\Exception $e){
                $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
            }
        }
        return response()->json($teachers);
    }

    //Vistas ADMIN
    public function searchTeachers(){
        return view('teacherViews/searchTeachersView');
    }

    public function addTeachers()
    {
        return view('teacherViews/addTeachersView');
    }

    public function modifyTeachers()
    {
        return view('teacherViews/modifyTeachersView');
    }

    public function deleteTeachers()
    {
        return view('teacherViews/deleteTeachersView');
    }
}