<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpSchedule extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function schedule($id){
        $schedule=DB::table('tb_emp_sch')->where('user_id',$id)->get();
        $emp=DB::table('tb_emp')->where('user_id',$id)->first();
        return view('schedule/index',[
            'data'=>$schedule,
            'user_id'=>$id,
            'emp'=>$emp
            ]);
        
    }
    public function add($id){
        $employee=DB::table('tb_emp')->where('user_id',$id)
        ->get();
        $days=[
            "monday",
            "tuesday",
            "wednesday",
            "thursday",
            "friday"
        ];
        return view('schedule/add', [
            'data'=>$employee,
            'days'=>$days
            ]);
    }
    public function save($user_id, Request $request){
        $this->validate($request,[
            'entry_hour' => 'required',
            'out_hour' => 'required',
            'day' => 'required',
        ]);
        DB::table('tb_emp_sch')->insert([
            'user_id'=>$request->user_id,
            'entry_hour'=>date("H:i:s",strtotime($request->entry_hour)),
            'out_hour'=>date("H:i:s",strtotime($request->out_hour)),
            'day'=>$request->day,
        ]);
        return redirect('/EmpSchedule/schedule/'.$user_id);
    }
    public function edit($user_id, $id){
        $schedule=DB::table('tb_emp_sch')
        ->where('id',$id)
        ->get();
        $emp=DB::table('tb_emp')
        ->where('user_id',$user_id)
        ->get();
        $days=[
            "monday",
            "tuesday",
            "wednesday",
            "thursday",
            "friday"
        ];
        return view('schedule/edit', [
            'schedule'=>$schedule,
            'emp'=>$emp,
            'days'=>$days
            ]);
    }
    public function update($user_id, Request $request){
        $this->validate($request,[
            'entry_hour' => 'required',
            'out_hour' => 'required',
            'day' => 'required',
        ]);
        DB::table('tb_emp_sch')->where('id', $request->id)->update([
            'user_id'=>$request->user_id,
            'entry_hour'=>date("H:i:s",strtotime($request->entry_hour)),
            'out_hour'=>date("H:i:s",strtotime($request->out_hour)),
            'day'=>$request->day,
        ]);
        return redirect('/EmpSchedule/schedule/'.$user_id);
    }
    public function delete($user_id, $id){
        DB::table('tb_emp_sch')->where('id', $id)->delete();
        return redirect('/EmpSchedule/schedule/'.$user_id);
    }
}
