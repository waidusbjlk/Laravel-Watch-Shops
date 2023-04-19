@extends('layouts.adm')

@section('title' , 'USERS PAGE')

@section('content')

    <h1 style="text-align: center">USERS PAGE</h1>
    <form action="{{route('adm.users.search')}}" method="GET">
        <div  style="margin:0px" class="container">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input name="search" type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                <button class="btn btn-outline-primary" type="submit">{{__('registration.Search')}}</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">{{__('registration.Number')}}</th>
            <th scope="col">{{__('registration.Name')}}</th>
            <th scope="col">{{__('registration.Email')}}</th>
            <th scope="col">{{__('registration.Role')}}</th>
            <th>{{__('registration.Blocking')}}</th>
            <th>{{__('registration.Delete Role')}}</th>
            <th>{{__('registration.Edit Role')}}</th>
        </tr>
        </thead>
        <tbody>
            @for($i=0;$i<count($users);$i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$users[$i]->name}}</td>
                    <td>{{$users[$i]->email}}</td>
                    <td>{{$users[$i]->role->name}}</td>
                    <td>
                        @if($users[$i]->role->name != 'admin')
                        <form action="
                        @if($users[$i]->is_active)
                                    {{route('adm.users.ban', $users[$i]->id)}}
                                @else
                                    {{route('adm.users.unban'  , $users[$i]->id)}}
                                @endif "
                              method="POST">
                            @csrf
                            @method('PUT')
                            <button class="btn {{$users[$i]->is_active ? 'btn-danger': 'btn-success'}}" type="submit">
                                @if($users[$i]->is_active)
                                {{__('registration.Ban')}}
                                @else
                                {{__('registration.Unban')}}
                                @endif
                            </button>
                        </form>
                        @endif
                    </td>
                    <td>
                        @if($users[$i]->role->name != 'admin')
                        <form action="{{route('adm.users.delete', $users[$i]->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class=" btn btn-outline-danger">{{__('registration.delete role')}}</button>
                        </form>
                        @endif
                    </td>
                    <td>
                        @if($users[$i]->role->name != 'admin')
                        <a class="btn btn-outline-success" href="{{route('adm.users.edit' , $users[$i])}}">{{__('registration.Edit')}}</a>
                        @endif
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
@endsection




