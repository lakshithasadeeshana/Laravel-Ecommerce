@extends('layouts.app')

@section('content')
@include('adminnavigation')

<div>
    <a style="margin: 19px;" href="admin/suppliers/suppliers/createsuppliers" class="btn btn-primary">New Category</a>
    </div>
    <br>
    <br>
    


    <!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E shop</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container">




    <div class="row">
<div class="col-sm-12">
    <h2 class="display-3">Categories</h2>    

  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>

        
        </tr>
    </thead>
    <tbody>
    @foreach($category as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->title}} </td>
            
            <td>
                <a href="{{ route('categories.edit',$c->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('categories.destroy', $c->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>





</div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>

@endsection