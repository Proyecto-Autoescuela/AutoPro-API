<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;

class LessonController extends Controller
{
    public function listAllLessons(){
        $lessons = Lesson::all(['id', 'name', 'lesson_url']);
        if(empty($lessons)){
            $lessons = array('error_code' => 400, 'error_msg' => 'No hay lessons encontrados');
        }else{
            return response()->json($lessons);
        }
    }

    public function listByID(Request $req)
    {
        $id = $req->id;
        $response = array('error_code' => 404, 'error_msg' => 'Nombre ' .$id. ' no encontrado');
        $response = Lesson::where('id', $id)->get();
        if(count($response) > 0)
            return view('unitViews/searchUnitsView', ['unit' => $response]);
        else return view('unitViews/searchUnitsView')->withMessage('No Details found. Try to search again !');
    }

    public function findByID(Request $req)
    {
        $id = $req->id;
        $response = array('error_code' => 404, 'error_msg' => 'Nombre ' .$id. ' no encontrado');
        $response = Lesson::where('id', $id)->first();
        return response()->json($response);
    }

    // Añadir Temario
    public function addLesson(Request $req)
    {
        $response = array('error_code' => 400, 'error_msg' => 'Error inserting info');
        $units = new Lesson;
        
        if(!$req->name){
            $response['error_msg'] = 'Name is required';
        }
        elseif(!$req->lesson_url)
        {
            $response['error_msg'] = 'lesson_url is required';
        }
        else
        {
            try{
                $units->name = $req->input('name');
                $ruta = $req->file('unit_url')->store('ImagesLessons');
                $units->unit_url = $ruta;
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
    public function updateLesson(Request $req)
    {
        $unit_id = $req->id;
        $response = array('error_code' => 404, 'error_msg' => 'Estudiante '.$unit_id.' no encontrado');
        $units = Lesson::find($unit_id);
        if(!empty($units)){
            $dataOk = true;
            $error_msg = "";
            if(empty($req->name)){
                $dataOk = false;
                $error_msg = "Name can't be empty";
            }else{
                $units->name = $req->name;
            }
            if(!$dataOk){
                $response = array('error_code' => 400, 'error_msg' => $error_msg);
            }else{
                try{
                    $units->name = $req->input('name');
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
    public function deleteLesson(Request $req)
    {
        $id = $req->id;
        $response = array('error_code' => 404, 'error_msg' => 'Estudiante '.$id.' no encontrado');
        $units = Lesson::find($id);
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
}
