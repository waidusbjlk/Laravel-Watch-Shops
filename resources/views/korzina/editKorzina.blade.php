@extends('layouts.app')

@section('title' , 'EDIT PAGE')

@section('content')
    <div class="container">
        <div class="row">
            <div style="text-align: center">

                <a  class=" btn btn-outline-primary" href="{{route('watch.index')}}">{{__('registration.Home_Page')}}</a><br><br>

                <form action="{{route('watch.update' , $watch->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    Title: <input type="text" name="title" placeholder="name watch" value="{{$watch->title}}"><br><br>
                    Category:
                    <select name="category_id" >
                        @foreach($categories as $cat)
                            <option @if($cat->id == $watch->category_id ) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                    <br><br>
                    Price:<input type="number" title="price" name="price" placeholder="price" value="{{$watch->price}}">
                    <br><br>
                    Content: <textarea name="content" cols="27" rows="12" placeholder="characteristics of the watch">{{$watch->content}}</textarea><br><br>
                    <div class="container">
                        <button class=" btn btn-primary" type="submit">{{__('registration.Save_Watch')}}</button>
                    </div>
                    <br><br>
                </form>
            </div>
        </div>
    </div>
@endsection
