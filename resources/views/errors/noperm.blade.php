@extends('layouts.app')

@section('title' , 'NO PERMISSION PAGE')

@section('content')
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Bootstrap 5 404 page with image</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center row">
            <div class=" col-md-6">
                <img src="https://cdn.pixabay.com/photo/2017/03/09/12/31/error-2129569__340.jpg" alt=""
                     class="img-fluid">
            </div>
            <div class=" col-md-6 mt-5">
                <p class="fs-3"> <span class="text-danger">Opps!</span>  You no Permission!</p>
                <a href="{{route('watch.index')}}" class="btn btn-primary">Go Home</a>
            </div>
        </div>
    </div>

@endsection




