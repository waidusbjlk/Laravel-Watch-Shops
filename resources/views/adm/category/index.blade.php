@extends('layouts.adm')

@section('title' , 'CREATE CATEGORY PAGE')

@section('content')
            <button><a href="{{route('adm.category.create')}}" class="btn btn-outline-danger">Create Category</a></button>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">NAME</th>
                    <th scope="col">CODE</th>
{{--                    <th scope="col">NAME_KZ</th>--}}
{{--                    <th scope="col">NAME_EN</th>--}}
{{--                    <th>NAME_RU</th>--}}
                    <th scope>EDIT</th>
                    <th scope="col">DELETE</th>
                </tr>
                </thead>
                <tbody>
                    <p>
                    @foreach($category as $cat)
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->code}}</td>
                    @endforeach
                    </p>
                </tbody>
            </table>

            {{--    end section --}}
@endsection




