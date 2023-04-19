@extends('layouts.app')

@section('title' , 'HOME PAGE')

@section('content')

   <div class="container" style="width: 600px">
       <div class="card" >
           <div class="card-body">
               <form action="{{route('watch.addmoney', Auth::user()->id)}}" method="post">
                   @csrf
               <label class="form-label">Card Number</label>
               <input class="form-control" placeholder="#### #### #### ####" type="number">
               <div class="row">
                   <div class="col-md-9">
                       <label class="form-label">Balance</label>
                       <input class="form-control" type="number" name="balance" required>
                   </div>
                   <div class="col-md-3">
                       <label class="form-label">CVV</label>
                       <input class="form-control" placeholder="###" type="number" >
                   </div>
               </div>
               <button type="submit" class="btn btn-info mt-4 form-control">ADD MONEY</button>
           </form>
           </div>
       </div>
   </div>















@endsection
