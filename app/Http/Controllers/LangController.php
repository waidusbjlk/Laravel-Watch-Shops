<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller{
    public function switchLang(Request $req , $lang){  //lang = kz, ru, en
        if(array_key_exists($lang, config('app.languages'))){
            $req->session()->put('mylocale',$lang);
            app()->getLocale();
        }
        return back();
    }
}
