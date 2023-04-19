<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function  register(Request $req){
       $validated = $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' =>'required|min:6|confirmed',
           'avatar' => 'required|image|mimes:jpg,png,PNG,jpeg,gif,svg,webp'
       ]);
        $fileName = time().$req->file('avatar')->getClientOriginalName();
        $image_path = $req  ->file('avatar')->storeAs('avatars', $fileName, 'public');

        $user = User::create([
            'name' =>$req->input('name'),
            'email' =>$req->input('email'),
            'password' => Hash::make($req->input('password')),
            'role_id' => Role::where('name','user')->first()->id,
            'avatar' => '/storage/'.$image_path,
            ]);

        Auth::login($user);

        return redirect()->route('watch.index');

    }

}
