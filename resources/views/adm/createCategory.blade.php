@extends('layouts.adm')

@section('title' , 'CREATE CATEGORY PAGE')

@section('content')

    <form action="{{route('adm.store.category')}}" method="post">
        @csrf
        NAME CATEGORY: <input type="text" name="name"><br>
        NAME CATEGORY KZ: <input type="text" name="name_kz"><br>
        NAME CATEGORY RU: <input type="text" name="name_ru"><br>
        NAME CATEGORY EN: <input type="text" name="name_en"><br>
        <button type="submit">SAVE CATEGORY</button>
    </form>

@endsection




