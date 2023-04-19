@extends('layouts.app')

@section('title' , 'CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
        <div class="row">
            <div style="text-align: center">
                <a class="btn btn-outline-primary" href="{{route('watch.index')}}">{{__('registration.Home_Page')}}</a><br><br>
                <form action="{{route('watch.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="TitleInput">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="TitleInput" name="title" placeholder="Enter title">
                        @error('title')
                        <div style="color: red" class="alert col-md-4 col-md-offset-4">{{$message}}</div>
                        @enderror

                    </div>



                    <div class="form-group">
                        <label for="contentInput">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="ContentInput" name="content" rows="3"></textarea>
                        @error('content')
                        <div style="color: red" class="alert col-md-4 col-md-offset-4">{{$message}}</div>
                        @enderror
                        <div class="invalid-feedback"></div>
                    </div>


                    <div class="form-group">
                        <label for="categoryInput" >Category</label>
                        <select class="form-control @error('category_id') is-invalid @enderror " name="category_id" id="categoryInput">
                            @error('title')
                            <div style="color: red" class="alert col-md-4 col-md-offset-4">{{$message}}</div>
                            @enderror
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>

                            {{--price--}}
                        <div class="form-group">
                            <label for="PriceInput">Price</label>
                            <input type="number" class="form-control @error('title') is-invalid @enderror" id="PriceInput" name="price" placeholder="Enter price">
                            @error('title')
                            <div style="color: red" class="alert col-md-4 col-md-offset-4">{{$message}}</div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="imgInput" class="form-label">Image</label>
                            <input type="file" class="form-control @error('title') is-invalid @enderror" id="imgInput" name="img" >
                            @error('img')
                            <div style="color: red" class="alert col-md-4 col-md-offset-4">{{$message}}</div>
                            @enderror
                        </div>


                        <input type="hidden" name="'user_id" value="{{Auth::user()->id}}">

                    </div>
                    <div class="container mt-3">
                        <button type="submit" class="btn btn-outline-primary">{{__('registration.SAVE')}}</button>
                    </div>
                    <br><br>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>
    </div>
    </body>
</html>
@endsection
