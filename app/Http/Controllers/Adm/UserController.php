<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Role;
use App\Models\User;
use App\Models\Watch;
use Illuminate\Http\Request;
use SebastianBergmann\Type\FalseType;

class UserController extends Controller{

    public function indexCart1(){
        $watchInCart = Cart::where('status','ordered')-> with(['watch','user'])->get();
        return view('adm.cart', ['watchInCart' => $watchInCart]);
    }

    public function confirm(Cart $cart){
        $cart->update([
            'status' => 'confirmed',
        ]);
        return back();
    }

    public function index(Request $req){
        $users = null;

        if($req->search){
            $users = User::where('name','LIKE', '%'.$req->search.'%' )->orWhere('email','LIKE', '%'.$req->search.'%')
                ->with('role')->get();
        }
        else{
            $users = User::with('role')->get();
        }
        return view('adm.users', ['users' => $users]);
    }

    public function unban(User $user){
        $user->update([
            'is_active' => true,
        ]);
        return back();
    }

    public function ban(User $user){
        $user->update([
            'is_active' => false,
        ]);
        return back();
    }

    public function delete(User $user){
        $user->delete();
        return back();
    }

    public function edit(User $user){
        return view('adm.edit_role', ['user' => $user ,'roles'=> Role::all()]);
    }

    public function update(Request $request, User $user){

        $user->update([
            'role_id' => $request->role_id,
        ]);
        return redirect()->route('adm.users.index');
    }



}
