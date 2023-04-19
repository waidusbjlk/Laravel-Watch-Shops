@extends('layouts.app')

@section('title' , 'SHOW  PAGE')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                <div class="card-body p-4">
                    <div class="form-outline mb-4">
<div class="container">
    <a class="btn btn-outline-primary" href="{{route('watch.index')}}">{{__('registration.Home_Page')}}</a>
</div>
    <div style="text-align: center">
        <div class="d-inline-block">
            <div class="col-sm-10">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <img class="card-img-top" src="{{asset($watch->img)}}" alt="Card image cap">
                        <h4 class="card-title">{{$watch->title}}</h4>
                            <p class="card-text">{{$watch->content}}</p>
                                @can('edit', $watch)
                                    @endcan
                                        <br>
                                            @auth
                                                <form action="{{route('watch.rate', $watch->id)}}" method="post">
                                                    @csrf
                                                    <select name="rating">
                                                        @for($i=0;$i<=10;$i++)
                                                            <option value="{{$i}}">
                                                                {{$i==0 ? 'NOT RATED' : $i}}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                    <button class="btn btn-outline-primary" type="submit">{{__('registration.RATE')}}</button>
                                                </form>
                                            @endauth
                                            <br>
                                            <form action="{{route('watch.cart', $watch->id)}}" method="POST">
                                                @csrf
                                                <select name="city">
                                                    <option value="Germany">Germany</option>
                                                    <option value="France">France</option>
                                                    <option value="USA">USA</option>
                                                    <option value="China">China</option>
                                                    <option value="Korea">Korea</option>
                                                </select>
                                                <br>
                                                  <input type="number" name="quantity" required placeholder="1">
                                                  <button type="submit" class="btn btn-info">{{__('registration.BUY')}}</button>
                                            </form>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="row d-flex justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-0 border" style="background-color: #f0f2f5;">
            <div class="card-body p-4">
                <div class="form-outline mb-4">
                <br>
                <hr>
                <form action="{{route('comments.store')}}" method="post">
                    @csrf
                    <textarea class="form-control" name="content" rows="3"></textarea>
                    <input type="hidden" name="watch_id" value="{{$watch->id}}">
                    <button class="btn btn-outline-primary mt-2">Save</button>
                </form>
                @foreach($watch->comments as $comment)
                    <div class="bg-light p-5 m-2 rounded">
                        <p class="lead"> <font style="vertical-align: inherit">{{$comment->content}}</font></p>
                        <p>{{$comment->user->name}} | {{$comment->created_at->diffForHumans()}}</p>
                        @can('delete' , $comment)
                            <form action="{{route('comments.destroy',$comment->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-outline-danger">{{__('registration.DELETE')}}</button>
                            </form>
                        @endcan
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



