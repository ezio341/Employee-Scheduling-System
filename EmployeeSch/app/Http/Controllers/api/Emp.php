<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EmpModel;
use Illuminate\Database\QueryException;

class Emp extends Controller
{
    public function index(){
        $data = EmpModel::all();
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
        $data=EmpModel::where('id',$id)->get();
        if(count($data)>0){
            $res['message']="Success";
            $res['value']=$data;
            return response($res);
        }else{
            $res['message']="Failed";
            return response($res);
        }
    }
    public function getUser($id){
        $data=EmpModel::where('user_id',$id)->get();
        if(count($data)>0){
            $res['message']="Success";
            $res['value']=$data;
            return response($res);
        }else{
            $res['message']="Failed";
            return response($res);
        }
    }
    public function create(Request $request){
        $emp = new EmpModel();
        $emp->user_id = $request->user_id;
        $emp->name = $request->name;
        $emp->position = $request->position;
        $emp->age = $request->age;
        $emp->address = $request->address;

        try{
            if($emp->save()){
                $res['message']= "Add Success";
                $res['value']= $emp;
                return response($res);
            }
        }catch(QueryException $e){
            $res['message']= "User Not found";
            return response($res);
        }
    }
    public function update(Request $request, $id){
        $user_id=$request->user_id;
        $name = $request->name;
        $age = $request->age;
        $address = $request->address;

        $emp = EmpModel::find($id);
        $emp->name = $name;
        $emp->age = $age;
        $emp->address = $address;

        if($emp->save()){
            $res['message']="Modify Success";
            $res['value']=$emp;
            return response($res);
        }else{
            $res['message']="Failed";
            return response($res);
        }
    }
    public function delete($id){
        $emp = EmpModel::where('id',$id);
        if($emp->delete()){
            $res['message']="Data Berhasil Dihapus";
            return response($res);
        }else{
            $res['message']="Gagal";
            return response($res);
        }
    }
}
