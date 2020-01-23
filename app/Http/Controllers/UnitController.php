<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;

class UnitController extends Controller
{
    // Listar temas
    public function listAllUnit(){
        $units = Unit::all(['id', 'name', 'unit_url']);
        if(empty($units)){
            $units = array('error_code' => 400, 'error_msg' => 'No hay temas encontrados');
        }else{
            return response()->json($units);
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

    // Añadir Temario
    public function addUnit(Request $req)
    {
        $response = array('error_code' => 400, 'error_msg' => 'Error inserting info');
        $units = new Unit;
        
        if(!$req->name){
            $response['error_msg'] = 'Name is required';
        }
        elseif(!$req->unit_url)
        {
            $response['error_msg'] = 'unit_url is required';
        }
        elseif(!$req->content_unit)
        {
            $response['error_msg'] = 'content_unit is required';
        }
        else
        {
            try{
                $units->name = $req->input('name');
                $units->unit_url = $req->input('unit_url') ;
                $units->content_unit = $req->input('content_unit');
                $units->save();
                $response = array('error_code' => 200, 'error_msg' => '');
            }
            catch(\Exception $e){
                $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
            }
        }
        return response()->json($response);
    }

    // Editar temario
    public function updateUnit(Request $req,$id)
    {
        $response = array('error_code' => 404, 'error_msg' => 'Estudiante '.$id.' no encontrado');
        $units = Unit::find($id);
        if(!empty($units)){
            $dataOk = true;
            $error_msg = "";
            if(empty($req->name)){
                $dataOk = false;
                $error_msg = "Name can't be empty";
            }else{
                $units->name = $req->name;
            }
            if(empty($req->unit_url)){
                $dataOk = false;
                $error_msg = "unit_url can't be empty";
            }else{
                $units->unit_url = $req->unit_url;
            }
            if(empty($req->content_unit)){
                $dataOk = false;
                $error_msg = "content_unit can't be empty";
            }else{
                $units->content_unit = $req->content_unit;
            }
            if(!$dataOk){
                $response = array('error_code' => 400, 'error_msg' => $error_msg);
            }else{
                try{
                    $units->name = $req->input('name');
                    $units->unit_url = $req->input('unit_url') ;
                    $units->content_unit = $req->input('content_unit');
                    $units->save();
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
}
