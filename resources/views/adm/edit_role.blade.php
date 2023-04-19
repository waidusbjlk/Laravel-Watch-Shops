@extends('layouts.adm')

@section('title' , 'USERS PAGE')

@section('content')

    <h1 style="text-align: center">USERS PAGE</h1>

    <div class="container">
        <form action="{{route('adm.users.update' ,$user->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group text-center">
                <label for="priceInput">Name</label>
                <input type="text" value="{{$user->name}}" class="form-control" id="priceInput" >
            </div>
            <br>
            <div class="form-group">
                <label for="roleInput" class="form-label">Role</label>
                <select name="role_id" id="roleInput">
                    @foreach($roles as $role)
                        <option @if($role->id ==$user->role_id) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-success rounded float-end"  type="submit">
                    Update Role
                </button>
            </div>
        </form>
    </div>


@endsection




