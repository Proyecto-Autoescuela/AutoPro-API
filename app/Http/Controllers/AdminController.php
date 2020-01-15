<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function listAllAdmin(){
        $admins = Admin::all(['id', 'name', 'email', 'password', 'token']);
        if(empty($admins)){
            $admins = array('error_code' => 400, 'error_msg' => 'No hay admins encontrados');
        }else{
            return response()->json($admins);
        }
    }
    
    public function addAdmin(Request $req)
    {
        $response = array('error_code' => 400, 'error_msg' => 'Error inserting info');
        $admins = new Admin;

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
        elseif(!$req->token)
        {
            $response['error_msg'] = 'Token es necesario';
        }
        else
        {
            try{
                $admins->name = $req->input('name');
                $admins->email = $req->input('email') ;
                $admins->password = $req->input('password');
                $admins->token = $req->input('token');
                $admins->save();
                $response = array('error_code' => 200, 'error_msg' => '');
                }
                catch(\Exception $e)
                {
                $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
            }
        }
        return response()->json($response);
    }

    public function updateAdmin(Request $req,$id)
    {
        $response = array('error_code' => 404, 'error_msg' => 'Admin '.$id.' no encontrado');
        $admins = Admin::find($id);
        if(!empty($admins)){
            $dataOk = true;
            $error_msg = "";
            if(empty($req->name)){
                $dataOk = false;
                $error_msg = "Name no puede estar vacio";
            }else{
                $students->name = $req->name;
            }
            if(empty($req->email)){
                $dataOk = false;
                $error_msg = "Email no puede estar vacio";
            }else{
                $students->email = $req->email;
            }
            if(empty($req->password)){
                $dataOk = false;
                $error_msg = "Paswword no puede estar vacio";
            }else{
                $students->password = $req->password;
            }
            if(!$dataOk){
                $response = array('error_code' => 400, 'error_msg' => $error_msg);
            }else{
                try{
                    $teachers->name = $req->input('name');
                    $teachers->email = $req->input('email') ;
                    $teachers->password = $req->input('password');
                    $teachers->save();
                    $response = array('error_code' => 200, 'error_msg' => '');
                }catch(\Exception $e){
                    $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
                }
            }
        return response()->json($response);
        }
    }

    public function deleteAdmin($id)
    {
        $response = array('error_code' => 404, 'error_msg' => 'Admin '.$id.' no encontrado');
        $teachers = Admin::find($id);
        if(empty($admins)){
            $response = array('error_code' => 400, 'error_msg' => "Admin ".$id." no puede ser borrado");
        }else{
            try{
                $admins->delete();
                $response = array('error_code' => 200, 'error_msg' => '');
            }catch(\Exception $e){
                $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
            }
        }
        return response()->json($response);
    }
}


