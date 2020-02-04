<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Question;
use Illuminate\Support\Arr;

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

    // Generador de tests
    public function generateTest(){
        $question = Question::inRandomOrder()->get(['id','photo_url', 'text','correct_answer','bad_answer','bad_answer2','lesson_id']);
        
        if(empty($question)){
            $response = array('error_code' => 400, 'error_msg' => 'No hay preguntas encontrados');
        }else{
            $questions[0] = $question[0];
            for ($i=1; $i <10 ; $i++) {     
                array_push($questions,$question[$i]);
            }
            $response = $questions;
            
        }
        return response()->json($response);
    }
}
