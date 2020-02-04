<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Question;

class TestController extends Controller
{
    public function listAllTest(){
        $tests = Test::all(['id', 'done', 'calification', 'student_id']);
        if(empty($tests)){
            $tests = array('error_code' => 400, 'error_msg' => 'No hay tests encontrados');
        }else{
            return response()->json($lessons);
        }
    }
    public function listForStuden(Request $req){
        $student_id = $req->student_id;
        $response = array('error_code' => 404, 'error_msg' => 'Nombre ' .$student_id. ' no encontrado');
        $response = Lesson::where('id', $student_id)->get();
        return response()->json($response);
    }
    public function generateTest(){
        $question = Question::all();
        if(empty($question)){
            $question = array('error_code' => 400, 'error_msg' => 'No hay preguntas encontrados');
        }else{
            $numbers;
            for ($i=0; $i < 10; $i++) { 
                $number = random_int( 0,count($question));
            }
                
        }
    }
}
