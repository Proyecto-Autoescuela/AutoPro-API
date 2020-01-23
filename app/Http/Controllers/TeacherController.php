<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
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
        return response()->json($response);
    }

    // Editar profesor
    public function updateTeacher(Request $req,$id)
    {
        $response = array('error_code' => 404, 'error_msg' => 'Profesor '.$id.' no encontrado');
        $teachers = Teacher::find($id);
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
                    $pass = hash('sha256', $req->password);
                    $teachers->password = $pass;
                    $teachers->save();
                    $response = array('error_code' => 200, 'error_msg' => '');
                }catch(\Exception $e){
                    $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
                }
            }
        return response()->json($response);
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
        return response()->json($response);
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