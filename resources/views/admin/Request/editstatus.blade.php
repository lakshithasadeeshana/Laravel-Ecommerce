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
   
<br>

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h2 >Update Requests</h2>
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
        <form method="post" action="{{ url('/admin/requests/update',$requests->id)}}">
            @csrf
            @method('PUT') 
            
            
            <div class ="form-group">
          <label for="city">Status:</label>
          <select class="form-control" name="status" >
          
              <option value="pending" >Pending</option>
              <option value="Available" >Available</option>
            
              </select>
          </div>
            

            
           
           
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>






</div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>


@endsection




