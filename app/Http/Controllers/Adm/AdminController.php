<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class AdminController extends Controller{

//    public function confirm(Cart $cart){
//        $cart->update([
//            'status' => 'confirmed'
//        ]);
//        return back();
//    }
//
//    public function cart(){
//        $watchInCart = Cart::where('status','ordered')-> with(['post','user'])->get();
//        return view('adm.cart', ['watchInCart' => $watchInCart]);
//    }

    public function showUsers(){
        return view('admin.users');
    }

    public function showPosts(){
        return view('admin.posts');
    }
}
