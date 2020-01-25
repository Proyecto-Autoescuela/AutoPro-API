<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function listAllUser(){
        $users = User::all(['id', 'name', 'email']);
        if(empty($users)){
            $users = array('error_code' => 400, 'error_msg' => 'No hay users encontrados');
        }else{
            return response()->json($users);
        }
    }

    // Buscar por nombre
    public function listByName()
    {   
        $name = ucfirst(Input::get ('name'));
        $response = array('error_code' => 404, 'error_msg' => 'Nombre ' .$name. ' no encontrado');
        $response = User::where('name','LIKE','%'.$name.'%')
        ->get(['id', 'name', 'email']);
        if(count($response) > 0)
            return view('adminViews/searchAdminsView', ['admin' => $response]);
        else return view('adminViews/searchAdminsView')->withMessage('No Details found. Try to search again !');
    }
    
    public function addAdmin(Request $req)
    {
        $response = array('error_code' => 400, 'error_msg' => 'Error inserting info');
        $users = new User;

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
        elseif(!$req->api_token)
        {
            $response['error_msg'] = 'Token es necesario';
        }
        else
        {
            try{
                $users->name = $req->input('name');
                $users->email = $req->input('email') ;
                $users->password = $req->input('password');
                $users->token = $req->input('api_token');
                $users->save();
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
        $response = array('error_code' => 404, 'error_msg' => 'user '.$id.' no encontrado');
        $users = User::find($id);
        if(!empty($users)){
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
        $response = array('error_code' => 404, 'error_msg' => 'user '.$id.' no encontrado');
        $teachers = User::find($id);
        if(empty($users)){
            $response = array('error_code' => 400, 'error_msg' => "user ".$id." no puede ser borrado");
        }else{
            try{
                $users->delete();
                $response = array('error_code' => 200, 'error_msg' => '');
            }catch(\Exception $e){
                $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
            }
        }
        return response()->json($response);
    }

        //Vistas ADMIN
        public function searchAdmins(){
            return view('adminViews/searchAdminsView');
        }
    
        public function addAdmins()
        {
            return view('adminViews/addAdminsView');
        }
    
        public function modifyAdmins()
        {
            return view('adminViews/modifyAdminsView');
        }
    
        public function deleteAdmins()
        {
            return view('adminViews/deleteAdminsView');
        }
}
