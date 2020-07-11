


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
   





<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a category</h1>

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
        <form method="post" action="{{ route('categories.update', $category->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="first_name">Title:</label>
                <input type="text" class="form-control" name="title" value={{ $category->title }} />
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