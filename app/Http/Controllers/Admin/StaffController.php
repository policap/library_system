<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Request\Validator;
class StaffController extends Controller
{
    public function index(){
        $data ['title']='Staff Index';
        $data ['staff']=\App\Models\User::where('type','staff')->get();
        return view('dashboard.admin.staff.index', $data);
    }
    public function show($id){
        $data ['staff']=\App\Models\User::find($id);
        $data ['title']='Staff Details '. $data ['staff']->name;
        return view('dashboard.admin.staff.show', $data);
    }
    public function create(){
        $data ['title']='Create Staff';
        return view('dashboard.admin.staff.create', $data);

    }
    public function save(Request $request){
        $validator= \Illuminate\Support\Facades\Validator::make($request->all(), ['name'=>'required', 'email'=>'required|email', 'type'=>'required|regex:/^staff$/']);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->first());
        }

        $data= ['name'=>$request->name, 'email'=>$request->email, 'type'=>$request->type ??'staff', 'password'=>\Hash::make('password')];
        $staff=new \App\Models\User($data);
        //'name', 'email'=are what are in the database
        //$staff->fill($data);
        $staff->save();
        return back()->with('Success', 'Done');
    }
    public function edit($id){
        $data ['title']='Edit Staff';
        $data['staff']=\App\Models\User::find($id);
        return view('dashboard.admin.staff.edit',$data);


    }
    public function update(Request $request, $id){
        $staff=\App\Models\User::find($id);
        $staff->email=$request->email;
        $staff->name=$request->name;
        $staff->save();
        return back()->with('Success', 'Done');

    }
    public function delete($id){
        $staff=\App\Models\User::find($id);
        if($staff != NULL ){
            $staff->delete();
        }
        return back()->with('Success','Done');

    }
    
    public function set_photo($user_id){
        $data ['title']='Upload Profile Photo';
        $data ['user']=User::find($user_id);
        return view('dashboard.admin.staff.photo', $data);
    }
    public function save_photo(Request $request, $user_id){
        $validator=\Illuminate\Support\Facades\Validator::make($request->all(), ['profile_photo'=>'required']);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->first());
        } 
        $filename='file_'.random_int(10000, 99000).'_'.time().'.'.$request->file('profile_photo')->getClientOriginalExtension();
        $path=storage_path('user_photos');
        $request->file('profile_photo')->move($path, $filename);
        $staff=User::find($user_id);
        if($staff !=null){
            $staff->profile_photo =$path.'/'.$filename;
            $staff->save();
        }
        return back()->with('Success', 'Done');
}   }
