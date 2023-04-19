<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentControlller extends Controller{

    public function store(Request $req){
        $validated = $req->validate([
           'content' => 'required',
            'watch_id' => 'required|numeric|exists:watches,id'
        ]);

        Auth::user()->comments()->create($validated);
        return back()->with('habar','comment is created');
    }

    public function destroy(Comment $comment){
        $comment->delete();
        return back()->with('habar','comment is delete');
    }
}
