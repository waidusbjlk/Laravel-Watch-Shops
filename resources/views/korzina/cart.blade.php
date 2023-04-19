@extends('layouts.app')

@section('title' , 'KORZINA   PAGE')

@section('content')

<div class="container">
    <h2 class="fw-bold">
        All Summa: {{$sum}}$
    </h2>
    <div class="row">
        <div class="col-15">
            <table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">{{__('registration.Title')}}</th>
        <th scope="col">{{__('registration.Content')}}</th>
        <th scope="col">{{__('registration.City')}}</th>
        <th scope="col">{{__('registration.Quantity')}}</th>
        <th scope="col">{{__('price')}}</th>
        <th scope="col">{{__('registration.Status')}}</th>
        <th scope="col">{{__('registration.Buy_Watch')}}</th>
    </tr>
    </thead>
    <tbody>

    @foreach($watchInCart as $watch)
{{--        @can('delete' , $watch)--}}
            <form action="{{route('cart.delete', $watch->id)}}" method="POST">
                @csrf
                @method('DELETE')
            <tr>
                <th  scope="row">{{$watch->id}}</th>
                <th>{{$watch->title}}</th>
                <td>{{$watch->content}}</td>
                <td>{{$watch->pivot->city}}</td>
                <td>{{$watch->pivot->quantity}}</td>
                <td>{{$watch->price}} $</td>
                <td>{{$watch->pivot->status}}</td>
                        <td><button class="btn btn-outline-danger">{{__('registration.DELETE')}}</button></td>
                        <br><br>
                    </form>
            </tr>
{{--                @endcan--}}
            @endforeach
    </tbody>
    <form action="{{route('cart.buy', Auth::user()->id)}}" method="post">
        @csrf
        <button class="btn btn-success"@if(Auth::user()->balance <= $sum || $sum == 0) disabled @endif
        style="width: 110px;height: 40px" type="submit">
            <h4>{{__('registration.Buy_All')}}</h4>
        </button>
    </form>
</table>
        </div>
    </div>
</div>
@endsection

