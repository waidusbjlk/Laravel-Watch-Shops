@extends('layouts.adm')

@section('title' , 'CREATE CATEGORY PAGE')

@section('content')

    <form action="{{route('adm.category.store')}}" method="post">
        @csrf
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name Category</th>
                <th scope="col">Name_en</th>
                <th scope="col">Name_ru</th>
                <th scope="col">Name_kz</th>
                <th scope="col">Name Code</th>
            </tr>
            <td>NAME CATEGORY: <input type="text" name="name" ></td>
            <td>EN<input type="text" name="name_en" placeholder="English name"></td>
            <td>RU<input type="text" name="name_ru" placeholder="Russian name"></td>
            <td>KZ<input type="text" name="name_kz" placeholder="Kazakh name"></td>
            <td>NAME CODE: <input type="text" name="code" ></td>
            <td><button class="btn btn-outline-primary" type="submit" style="width: 100px; height: 35px">SAVE</button></td>
            </thead>
            </tr>
        </table>
    </form>

@endsection




