@extends('layouts.app')

@section('content')
@include('adminnavigation')



    <!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E shop</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container">
<br><br>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Registered Date</td>
        
        </tr>
    </thead>
    <tbody>
    @foreach($userdata as $cd)
        <tr>
            <td>{{$cd->id}}</td>
            <td>{{$cd->name}} </td>
            <td>{{$cd->email}} </td>
            <td>{{$cd->created_at}} </td>
      
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

<div class="gra" style="margin-left:350px;">
<br>
@include('admin.customerGraph')
</div>

 
</body>
</html>

@endsection