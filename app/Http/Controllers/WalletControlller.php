<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletControlller extends Controller{


    public function index(){
        return view('posts.showbalance');
    }


    public function addmoney(Request $request, User $user){
        $user->update([
            'balance' =>Auth::user()->balance+$request->input('balance'),
        ]);

        return redirect()->route('watch.index')->with('message', __('registration.money successfully replenished'));
    }


}
