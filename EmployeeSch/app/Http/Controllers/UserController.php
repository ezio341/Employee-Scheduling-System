<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $empInfo=DB::table('tb_emp')->join('emp_user','tb_emp.user_id','=','emp_user.id')->get();
        return view('user/index',[
            'empInfo'=>$empInfo
        ]);
    }
    public function details($id){
        $employee=DB::table('tb_emp')->where('user_id',$id)->get();
        return view('user/detail', ['emp'=>$employee]);
    }
    public function edit($id){
        $employee=DB::table('tb_emp')->where('user_id',$id)->get();
        $account=DB::table('emp_user')->where('id',$id)->first();
        return view('user/edit', [
            'emp'=>$employee,
            'acc'=>$account
            ]);
    }
    public function update($id, Request $request){
        $this->validate($request, [
            'username'=>'required',
            'email'=>'required|email',
            'name'=>'required',
            'position'=>'required',
            'age'=>'required|numeric',
            'address'=>'required'
        ]);
        DB::table('tb_emp')->where('user_id',$id)->update([
            'user_id'=>$id,
            'name'=>$request->name,
            'position'=>$request->position,
            'age'=>$request->age,
            'address'=>$request->address
        ]);
        DB::table('emp_user')->where('id',$id)->update([
            'username'=>$request->username,
            'email'=>$request->email
        ]);
        return redirect('/Users/details/'.$id);
    }
    public function add(){
        $latestid=DB::table('emp_user')->latest('emp_id')->first();
        return view('user/add',[
            'latestid'=>$latestid
        ]);
    }
    public function save(Request $request){
        $this->validate($request, [
            'username'=>'required',
            'empid'=>'required|numeric',
            'email'=>'required|email',
            'name'=>'required',
            'age'=>'required|numeric',
            'position'=>'required',
            'address'=>'required'
        ]);
        DB::table('emp_user')->insert([
            'username'=>$request->username,
            'emp_id'=>$request->empid,
            'password'=>sha1($request->empid),
            'email'=>$request->email
        ]);
        $user_id=DB::table('emp_user')->latest('id')->first();
        DB::table('tb_emp')->insert([
            'user_id'=>$user_id->id,
            'name'=>$request->name,
            'address'=>$request->address,
            'age'=>$request->age,
            'position'=>$request->position
        ]);
        return redirect('/Users');
    }
    public function resetPass($id){
        $user=DB::table('emp_user')->where('id',$id)->first();
        DB::table('emp_user')->where('id',$id)->update([
            'password'=>sha1($user->emp_id)
        ]);
        return redirect('Users/details/'.$id);
    }
    public function delete($id){
        DB::table('tb_emp')->where('user_id',$id)->delete();
        DB::table('tb_emp_sch')->where('user_id',$id)->delete();
        DB::table('emp_user')->where('id', $id)->delete();
        return redirect('/Users');
    }
}
