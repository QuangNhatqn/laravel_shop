<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginAdmin(){
        if(auth()->check()){
            return redirect()->to('admin/home');
        }


        return view('adminlayouts.login');
    }
    public function postLoginAdmin(Request $request){
        $check = $request->has('check') ? true : false;
        if(auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $check)){
            return redirect()->to('admin/home');
        } else
            return redirect()->back()->with('login_fail', 'Login Fail!');
    }
    public function getLogoutAdmin(){
        auth()->logout();
        return redirect()->route('admin.getLogin');
    }
}
