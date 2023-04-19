<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{

    public function create(){
        return view('auth.login');
    }

    public function login(Request $req){
        if(Auth::check()){
            return redirect()->intended('/watch');
        }

      $validate = $req->validate([
           'email'=>'required|email|',
            'password'=>'required|string|min:6',
        ]);

        if (Auth::attempt($validate)){
            if (Auth::user()->role->name == 'admin')
                return  redirect()->intended('/adm/users');
            return redirect()->route('watch.index');
        }
        return back()->withErrors('Incorrect email or password');

    }
    public function logout(){
        Auth::logout();
        return redirect()->intended('/login');
    }
}
