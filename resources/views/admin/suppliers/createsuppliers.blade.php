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
    <h2 class="display-3">Add  Suppliers</h2>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('suppliers.store') }}" >
          @csrf
          <div class="form-group">    
              <label for="first_name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="last_name">Address:</label>
              <input type="text" class="form-control" name="address"/>
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="city">Phone:</label>
              <input type="number" class="form-control" name="phone" minlength="10" maxlength="10"/>
          </div>
                                 
          <button type="submit" class="btn btn-primary">Add Supplier</button>
      </form>
  </div>
</div>
</div>











  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>







@endsection