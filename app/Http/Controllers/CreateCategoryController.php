<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CreateCategoryController extends Controller
{
    public function index(){
        $cat = Category::all();
        return view('adm.category.index', ['category' => $cat]);
    }
    public function edit(){
    }
    public function show(){
    }
    public function destroy(){
    }

    public function create(){
        return view('adm.category.create');
    }
    public function store(Request $req){
        Category::create([
           'name' => $req->input('name'),
           'name_kz' => $req->input('name_kz'),
           'name_ru' => $req->input('name_ru'),
           'name_en' => $req->input('name_en'),
           'code' => $req->input('code'),
        ]);
        return redirect()->route('adm.category.index');
    }
}
