@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E shop</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container">
  
  <div class="col-sm-12">

@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}  
  </div>
@endif

</div>
<br>

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h2 >Update Shipping</h2>
<br>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('shipping.store') }}">
            @csrf
              
            
            <div class ="form-group">
          <label for="city">Status:</label>
          <select class="form-control" name="status" >
          
              <option value="pending" >Pending</option>
              <option value="Shipped" >Shipped</option>
            
              </select>
              <br>
              <div class="form-group">
              <label for="email">Order Id:</label>
              <input type="text" class="form-control" name="order_id" value={{ $loadorders->id }} readonly>
          </div>
              

          <div class="form-group">
              <label for="email">Customer Id:</label>
              <input type="text" class="form-control" name="user_id" value={{ $loadorders->user_id }} readonly>
          </div>

          <div class ="form-group">
          <label for="city">Company Name:</label>
          <select class="form-control" name="company_name" >
               
          @foreach($shippingcompanydetails as $sc)
             <option value="{{$sc->company_name}}">{{$sc->company_name}}</option>
             @endforeach
              </select>
          </div>

          <div class ="form-group">
          <label for="city">Address:</label>
          <select class="form-control" name="address" >
               
          @foreach($shippingcompanydetails as $sc)
             <option  value="{{$sc->address}}">{{$sc->address}}</option>
             @endforeach
              </select>
          </div>
          
          <div class ="form-group">
          <label for="city">Phone:</label>
          <select class="form-control" name="phone" >
               
          @foreach($shippingcompanydetails as $sc)
             <option value="{{$sc->phone}}">{{$sc->phone}}</option>
             @endforeach
              </select>
          </div>

          </div>
            
            <button type="submit" class="btn btn-primary">Update Shipping</button>
        </form>
    </div>
</div>

@endsection