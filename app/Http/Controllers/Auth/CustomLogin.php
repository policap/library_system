<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomLogin extends Controller
{
    public function login(Request $request){
        if (auth()->attempt(['email'=>$request->email,'password'=>$request->password])) {
            if(auth()->user()->type=='admin'){
                return redirect()->route('admin.home');
            }else{
                return 'Staff Logged In';
            }
        } else {
            if (auth('visitors')->attempt(['username'=>$request->username,'password'=>$request->password])) {
                return 'Visitor Logged In';
            } else {
                return 'Wrong Username Or Password';
            }
            
            
        }
        
    }
    public function show(){
        return view('auth.login');

    }
}
