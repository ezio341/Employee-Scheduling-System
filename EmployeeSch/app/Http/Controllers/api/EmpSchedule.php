<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EmpScheduleModel;

class EmpSchedule extends Controller
{
    public function index(){
        $data = EmpScheduleModel::all();
        if(count($data)>0){
            $res['message']="Success";
            $res['value']=$data;
            return response($res); 
        }else{
            $res['message']="Empty";
            return response($res);
        }
    }
    public function getUser($id){
        $data=EmpScheduleModel::where('user_id',$id)->get();
        if(count($data)>0){
            $res['message']="Success"; 
            $res['value']=$data;
            return response($res);
        }else{
            $res['message']="Failed";
            return response($res);
        }
    }
    public function getId($id){
        $data=EmpScheduleModel::where('id',$id)->get();
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
        $sch = new EmpScheduleModel();
        $sch->user_id = $request->user_id;
        $sch->log_in_rule = $request->log_in_rule;
        $sch->log_out_rule = $request->log_out_rule;
        $sch->day = $request->day;

        try{
            if($sch->save()){
                $res['message']= "Add Success";
                $res['value']= $sch;
                return response($res);
            }
        }catch(QueryException $e){
            $res['message']= "User Not found";
            return response($res);
        }
    }
    public function update(Request $request, $id){
        $user_id = $request->user_id;
        $log_in_rule = $request->log_in_rule;
        $log_out_rule = $request->log_out_rule;
        $day = $request->day;

        $sch = EmpScheduleModel::find($id);
        $sch->user_id = $user_id;
        $sch->log_in_rule = $log_in_rule;
        $sch->log_out_rule = $log_out_rule;
        $sch->day = $day;

        if($sch->save()){
            $res['message']="Modify Success";
            $res['value']=$sch;
            return response($res);
        }else{
            $res['message']="Failed";
            return response($res);
        }
    }
    public function delete($id){
        $sch = EmpScheduleModel::where('id',$id);
        if($sch->delete()){
            $res['message']="Data Berhasil Dihapus";
            return response($res);
        }else{
            $res['message']="Gagal";
            return response($res);
        }
    }
}
