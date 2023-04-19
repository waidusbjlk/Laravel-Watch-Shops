
{{----}}
@extends('layouts.adm')

@section('title' , 'POSTS PAGE')

@section('content')

{{--    @can('view',\Illuminate\Support\Facades\Auth::user())--}}
        <h1>CART PAGE</h1>
        <form action="{{route('adm.users.search')}}" method="GET">
            <div  style="margin:0px" class="container">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@</span>
                    </div>
                    <input name="search" type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">Title</th>
                <th scope="col">content</th>
                <th scope="col">email</th>
                <th scope="col">city</th>
                <th scope="col">quantity</th>
                <th scope="col">status</th>
                <th scope="col">ordered</th>

            </tr>
            </thead>
            <tbody>
            @for($i=0; $i<count($watchInCart);$i++)
                <tr>
{{--                    <th scope="row">{{$i+1}}</th>--}}
                    <td>{{$watchInCart[$i]->watch->title}}</td>
                    <td>{{$watchInCart[$i]->watch->content}}</td>
                    <td>{{$watchInCart[$i]->user->email}}</td>
                    <td>{{$watchInCart[$i]->city}}</td>
                    <td>{{$watchInCart[$i]->quantity}}</td>
                    <td>{{$watchInCart[$i]->status}}</td>
                    <td>
                        <form action="{{route('adm.cart.confirm', $watchInCart[$i]->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-outline-primary" type="submit">
                                Confirm order
                            </button>
                        </form>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
{{--    @endcan--}}
@endsection

