<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EmpUserModel;

class EmpUser extends Controller
{
    public function index(){
        $data = EmpUserModel::all();
        if(count($data)>0){
            $res['message']="Success";
            $res['value']=$data;
            return response($res);
        }else{ 
            $res['message']="Empty";
            return response($res);
        }
    }
    public function getId($id){
        $data=EmpUserModel::where('id',$id)->get();
        if(count($data)>0){
            $res['message']="Success";
            $res['value']=$data;
            return response($res);
        }else{
            $res['message']="Gagal";
            return response($res);
        }
    }
    public function create(Request $request){
        $user = new EmpUserModel();
        $user->username = $request->username;
        $user->password = $request->password;
        $user->email = $request->email;

        if($user->save()){
            $res['message']= "Add Success";
            $res['value']= $user;
            return response($res);
        }
    }
    public function update(Request $request, $id){
        $password = $request->password;
        $email = $request->email;

        $user = EmpUserModel::find($id);
        if(isset($password)){
            $user->password = $password;
        }else{
            $user->email = $email;
        }

        if($user->save()){
            $res['message']="Modify Success";
            $res['value']=$user;
            return response($res);
        }else{
            $res['message']="Failed";
            return response($res);
        }
    }
    public function delete($id){
        $user = EmpUserModel::where('id',$id);
        if($user->delete()){
            $res['message']="Data Berhasil Dihapus";
            return response($res);
        }else{
            $res['message']="Gagal";
            return response($res);
        }
    }
}
