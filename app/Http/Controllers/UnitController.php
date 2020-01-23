<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;

class UnitController extends Controller
{
    // Listar temas
    public function listAllUnit(){
        $units = Unit::all(['id', 'name', 'email']);
        if(empty($units)){
            $units = array('error_code' => 400, 'error_msg' => 'No hay profesores encontrados');
        }else{
            return response()->json($units);
        }
    }
}
