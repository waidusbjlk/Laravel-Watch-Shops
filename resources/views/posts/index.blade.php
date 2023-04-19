@extends('layouts.app')

@section('title' , 'HOME PAGE')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    @foreach($posts as $watch)
                                <div class="col-sm">
                                    <div class="card mt-2" style="width: 18rem;">
                                        <div class="card-body">
                                            <a href="{{route('watch.show' , $watch->id)}}">
                                                <img class="card-img-top" src="{{asset($watch->img)}}"  width="250" height="200px"  >
                                            </a>
                                            <h5 class="card-title">{{$watch->title}}</h5>
                                            <p class="card-text">{{$watch->content}}</p>
                                            <p>{{__('registration.Price')}}:{{$watch->price}}$</p>
                                            <h6>{{__('registration.Author')}}:{{$watch->user->name}}</h6>
                                               <div class="container-buttons">
                                                   @can('edit' , $watch)
                                                       <a  href="{{route('watch.edit' , $watch->id)}}" class="btn btn-primary">{{__('registration.EDIT')}}</a>
                                                   @endcan

                                                   @can('delete' , $watch)
                                                       <form action="{{route('watch.destroy', $watch->id)}}" method="post">
                                                           @csrf
                                                           @method('DELETE')
                                                           <button  class=" btn btn-danger" type="submit">{{__('registration.DELETE')}}</button>
                                                       </form>
                                                   @endcan
                                               </div>
                                        </div>
                                    </div>
                                </div>
                    @endforeach
                </div>
            </div>
         </div>
    </div>
@endsection

{{--<div class="container-buttons">--}}
{{--    @can('edit' , $watch)--}}
{{--        <button class="btn btn-primary"  href="{{route('watch.edit' , $watch->id)}}">--}}
{{--            {{__('registration.EDIT')}}--}}
{{--        </button>--}}
{{--    @endcan--}}
{{--    <button class=" btn btn-danger" type="submit">--}}
{{--        @can('delete' , $watch)--}}
{{--            <form action="{{route('watch.destroy', $watch->id)}}" method="post">--}}
{{--                @csrf--}}
{{--                @method('DELETE')--}}
{{--                {{__('registration.DELETE')}}--}}
{{--            </form>--}}
{{--        @endcan--}}
{{--    </button>--}}
{{--</div>--}}


