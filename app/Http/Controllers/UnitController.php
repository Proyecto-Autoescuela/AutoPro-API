<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;

class UnitController extends Controller
{
    // Listar temas
    public function listAllUnit(){
        $units = Unit::all(['id', 'name', 'unit_url', 'content_unit', 'lesson_id']);
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
        $response = Unit::where('id', $id)->get();
        if(count($response) > 0)
            return view('unitViews/searchUnitsView', ['unit' => $response]);
        else return view('unitViews/searchUnitsView')->withMessage('No Details found. Try to search again !');
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
        elseif(!$req->lesson_id)
        {
            $response['error_msg'] = 'lesson_id is required';
        }
        else
        {
            try{
                $units->name = $req->input('name');
                $ruta = $req->file('unit_url')->store('ImagesUnits');
                $units->unit_url = $ruta;
                $units->content_unit = $req->input('content_unit');
                $units->lesson_id = $req->input('lesson_id');
                $units->save();
                $response = array('error_code' => 200, 'error_msg' => '');
            }
            catch(\Exception $e){
                $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
            }
        }
        return view('unitViews/addUnitsView');
    }

    // Editar temario
    public function updateUnit(Request $req)
    {
        $unit_id = $req->id;
        $response = array('error_code' => 404, 'error_msg' => 'Estudiante '.$unit_id.' no encontrado');
        $units = Unit::find($unit_id);
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
            if(empty($req->lesson_id)){
                $dataOk = false;
                $error_msg = "content_unit can't be empty";
            }else{
                $units->lesson_id = $req->lesson_id;
            }
            if(!$dataOk){
                $response = array('error_code' => 400, 'error_msg' => $error_msg);
            }else{
                try{
                    $units->name = $req->input('name');
                    $ruta = $req->file('unit_url')->store('ImagesUnits');
                    $units->unit_url = $ruta;
                    $units->content_unit = $req->input('content_unit');
                    $units->lesson_id = $req->input('lesson_id');
                    $units->save();
                    $response = array('error_code' => 200, 'error_msg' => '');
                }catch(\Exception $e){
                    $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
                }
            }
            return view('unitViews/updateUnitsView');
        }
    }

    // Borrar Temas
    public function deleteUnit(Request $req)
    {
        $id = $req->id;
        $response = array('error_code' => 404, 'error_msg' => 'Estudiante '.$id.' no encontrado');
        $units = Unit::find($id);
        if(empty($units)){
            $response = array('error_code' => 400, 'error_msg' => "Estudiante ".$id." no puede ser borrado");
        }else{
            try{
                $units->delete();
                $response = array('error_code' => 200, 'error_msg' => '');
            }catch(\Exception $e){
                $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
            }
        }
        return view('unitViews/deleteUnitsView');
    }


     //Vistas ADMIN
     public function searchUnits(){
        return view('unitViews/searchUnitsView');
    }

    public function addUnits()
    {
        return view('unitViews/addUnitsView');
    }

    public function addLessons()
    {
        return view('unitViews/addLessonsView');
    }

    public function modifyUnits()
    {
        return view('unitViews/modifyUnitsView');
    }

    public function deleteUnits()
    {
        return view('unitViews/deleteUnitsView');
    }
}
