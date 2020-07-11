@extends('user.index')

@section('user')
<br><br>
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
    <h2 class="display-3">Add  Request</h2>
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
      <form method="post" action="{{ route('requests.store') }}" >
          @csrf
          <div class="form-group">    
              <label for="req_proname">Requested Product:</label>
              <input type="text" class="form-control" name="req_proname"/>
          </div>

          <div class="form-group">
              <label for="req_qty">Quantity:</label>
              <input type="number" class="form-control" name="req_qty"/>
          </div>

          <div class="form-group">
              <label for="req_prospec">Product Specification:</label>
              <input type="text" class="form-control" name="req_prospec"/>
          </div>

          
                                 
          <button type="submit" class="btn btn-primary">Add Request</button>
      </form>
  </div>
</div>
</div>




  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>







@endsection