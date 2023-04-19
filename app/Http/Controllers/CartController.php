<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Watch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CartController extends Controller{


    public function editCart(Watch $watch){
        return view('korzina.editKorzina', ['watch' => $watch]);
    }


//    public function buy(){
//        $ids = Auth::user()->watchWithStatus('1')->allRelatedIds();
//        foreach($ids as $id){
//            Auth::user()->watchWithStatus('1')->updateExistingPivot($id,['status' => 'ordered']);
//        }
//        return back();
//    }
//
//    public function index(){
//        return view('cart', ['cartWatchs' => Auth::user()->cartWatches]);
//    }
//
//    public function create(Watch $watch, Request $request)
//    {
//        $w = Auth::user()->cartWatches()->where('watch_id', $watch->id)->first();
//        if ($w != null && $w->pivot->color == $request->input('color',) ){
//            $q = $request->input('count') + $w->pivot->count;
//            Auth::user()->cartWatches()->updateExistingPivot($watch->id, ['count' => $q]);
//        } else {
//            Auth::user()->cartWatches()->attach($watch->id, ['color' => $request->input('color'),
//                'count' => $request->input('count')]);
//        }
//        return back();
//    }
//
//    public function store(Watch $watch, Request $request)
//    {
//        $myColor = $request->input('color');
//        $myCount = $request->input('count');
//        return view('editcart.edit', ['product' => $watch, 'color' => $myColor, 'count' => $myCount]);
//    }
//
//    public function delete(Watch $watch)
//    {
//        Auth::user()->cartWatches()->detach($watch->id);
//        return redirect(route('cart.index'));
//    }
//
//    public function update(Request $request, Watch $watch)
//    {
//        $validated = $request->validate([
//            'count' => 'required',
//            'color' => 'required',
//        ]);
//        $ee = Auth::user()->cartWatches()->where('watch_id', $watch->id)->first();
//        if ($ee->pivot->color == $request->input('oldcolor') && $ee->pivot->count == $request->input('oldcount')) {
//
//            Auth::user()->cartWatches()->updateExistingPivot($watch->id, ['color' => $request->input('color'),
//                'count' => $request->input('count')]);
//        }
//        return redirect()->route('cart.index');
//    }

}
