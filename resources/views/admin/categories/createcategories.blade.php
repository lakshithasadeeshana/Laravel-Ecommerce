@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel 7 & MySQL CRUD Tutorial</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container">




<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a Category</h1>
  
      <form method="post" action="{{ route('categories.store') }}">
          @csrf
          <div class="form-group">    
              <label for="first_name">Title:</label>
              <input type="text" class="form-control" name="title"/>
          </div>

                               
          <button type="submit" class="btn btn-primary">Add contact</button>
         
      </form>
      <a href="/admin/categories/managecategories" ><button type="submit" class="btn btn-danger">Cancel</button></a>
  </div>
</div>
</div>

</div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>


@endsection