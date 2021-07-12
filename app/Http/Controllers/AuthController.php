<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class AuthController extends Controller
{
    //
    public function login(){
        if(Auth::check()){
            return redirect()->route('home.index');
        }
        return view('Auth.login');
    }

    public function PostLogin(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if(\Auth::attempt(['email' => $request->email, 'password' => $request->password])){
       return redirect()->route('home.index');
       }
        Session::flash('message', 'Email dan Password tidak sesuai!');
        Session::flash('type', 'danger');
        return redirect()->back();
    }
    public function logout(){
        \Auth::logout();
        return redirect()->route('login');
    }
}
