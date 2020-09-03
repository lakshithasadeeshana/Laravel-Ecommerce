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
        <h2 >Add Shipping Company</h2>
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
        <form method="post" action="{{ url('/admin/shippings/create')}}" >
            @csrf
              
            
            <div class ="form-group "  > 

              <div class="form-group">
              <label for="last_name">Shipping Company Name:</label>
              <input type="text" class="form-control" name="company_name"/>
          </div>

          <div class="form-group">
              <label for="email">Address:</label>
              <input type="text" class="form-control" name="address"/>
          </div>
          
          <div class="form-group">
              <label for="city">Phone:</label>
              <input type="number" class="form-control" name="phone"/>
          </div>

          <div class="form-group">
              <label for="city">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>

          </div>
            
            <button type="submit" class="btn btn-primary">Add Shipping Company</button>
        </form>
    </div>
</div>

@endsection