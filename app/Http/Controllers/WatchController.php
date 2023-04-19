<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Role;
use App\Models\User;
use App\Models\Watch;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchController extends Controller{

    public function buy(User $user){
        $ids = Auth::user()->watchStatus('in_cart')->allRelatedIds();
        $itcart = Auth::user()->watchStatus("in_cart")->get();
        $sum = 0;
        foreach ($itcart as $itc) {
            $sum += $itc->price * $itc->pivot->quantity;
        }
        foreach ($ids as $id) {
            Auth::user()->watchStatus('in_cart')->updateExistingPivot($id, ['status' => 'ordered']);
        }

        $user->update([
            'balance' => Auth::user()->balance - $sum
        ]);
        return back();
    }

    public function editKorzina(Watch $watch)
    {
        return view('editKorzina.edit');
    }

    public function cartDestroy(Watch $watch)
    {
        $watchInCart = Auth::user()->watchCart()->where('watch_id', $watch->id)->first();
        if ($watchInCart != null) {
            Auth::user()->watchCart()->detach($watch->id);
        }
        return redirect()->route('cart.index');
    }

    public function indexCart()
    {
        $watchInCart = Auth::user()->watchStatus('in_cart')->get();
        $sum = 0;

        foreach ($watchInCart as $its) {
            $sum += $its->price * $its->pivot->quantity;
        }
        return view('korzina.cart', ['watchInCart' => $watchInCart,'sum' => $sum]);
    }

    public function cart(Request $request, Watch $watch)
    {
        $watchInCart = Auth::user()->watchStatus('in_cart')->where('watch_id', $watch->id)->first();
        if ($watchInCart != null) {
            Auth::user()->watchStatus('in_cart')->updateExistingPivot($watch->id,

                    ['status' => 'in_cart',
                    'city' => $request->input('city'),
                    'quantity' => $watchInCart->pivot->quantity + $request->input('quantity')]);
//            'quantity'=>$watchInCart->pivot->number+$request->input('quantity')
        } else {
            Auth::user()->watchStatus('in_cart')->attach($watch->id,
                ['status' => 'in_cart',
                    'city' => $request->input('city'),
                    'quantity' => $request->input('quantity')]);
//                'quantity'=>$request->input('quantity')
        }
//        return view('korzina.cart', ['watchInCart'=>$watchInCart]);
        return redirect()->route('cart.index')->with('message', __('registration.Goods shipped to the basket'));
    }


    public function rate(Request $request, Watch $watch)
    {
        $request->validate([
            'rating' => 'required|min:1|max:6',
//            'size' => 'required|min:1|max:6'
        ]);

        $watchRated = Auth::user()->watchRated()->where('watch_id', $watch->id)->first();
        if ($watchRated != null) {
            Auth::user()->watchRated()->updateExistingPivot($watch->id, ['rating' => $request->input('rating')]);
        } else {
            Auth::user()->watchRated()->attach($watch->id, ['rating' => $request->input('rating')]);
        }

        Auth::user()->watchRated()->attach($watch->id, ['rating' => $request->input('rating')]);
        return back()->with('message', __('registration.Post Rated'));
    }

//    attach - прикрепить

    public function watchByCategory(Category $category)
    {
        $watches = $category->watches;
        return view('posts.index', ['posts' => $watches, 'categories' => Category::all()]);
    }


    public function index()
    {
        $allWatches = Watch::all();
//            return view with all watch
        return view('posts.index', ['posts' => $allWatches, 'categories' => Category::all()]);
    }

    public function create()
    {
        $this->authorize('create', Watch::class);

//             return view with a form
        return view('posts.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'price' => 'required',
            'category_id' => 'required|numeric|exists:categories,id',
            'img' => 'required|image|mimes:jpg,png,jpeg,giv,svg,|max:4096',
        ]);
        ///storage/watch/rolex.jpeg
        $imgName = $request->file('img')->getClientOriginalName();
        $img_path = $request->file('img')->storeAs('watch', $imgName, 'public');
        $validated['img'] = '/storage/' . $img_path;

        Auth::user()->watch()->create($validated);
        //formaga jazgan malimetti watch.index-ke jiberedi
        return redirect()->route('watch.index')->with('message', __('Post Saved'));
    }

    public function show(Watch $watch)
    {
        return view('posts.show', ['watch' => $watch]);
    }


    public function edit(Watch $watch)
    {
        $this->authorize('edit', $watch);
        return view('posts.edit', ['watch' => $watch, 'categories' => Category::all()]);
    }


    public function update(Request $request, Watch $watch)
    {
        // ozgertilmegen malimetti janartyp jatyrmyn
//        malimetty janartu yshin
        $watch->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price'),
        ]);
        return redirect()->route('watch.index')->with('message', __('registration.Post updated'));
    }

    public function destroy(Watch $watch)
    {
        $this->authorize('delete', $watch);
        $watch->delete();
        return redirect()->route('watch.index')->with('message', __('registration.Post deleted'));
    }

}
