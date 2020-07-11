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
    <h2 class="display-3">Update a Product</h2>
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
      <form method="post" action="{{ route('products.update',$product->id) }}"  >
      

         @method('PATCH') 
         @csrf 
            
          <div class="form-group">    
              <label for="pro_name">Product Name:</label>
              <input type="text" class="form-control" name="pro_name" value={{ $product->pro_name }} >
          </div>

          <div class="form-group">
              <label for="last_name">Price:</label>
              <input type="number" class="form-control" name="pro_price" value={{ $product->pro_price }} />
          </div>

          <div class="form-group">
              <label for="city">Sale Price:</label>
              <input type="number" class="form-control" name="pro_saleprice" value={{ $product->pro_saleprice }} />
          </div>
              
          <div class="form-group">
              <label for="email">Quantity:</label>
              <input type="number" class="form-control" name="pro_qty" value={{ $product->pro_qty  }} />
          </div>
         

          <div class="form-group">
              <label for="city">Description:</label>
              <textarea id="pro_info" roew="5" class="form-control" name="pro_info" value={{ $product->pro_info }} ></textarea>
          </div>
             
         
          
         <br> <br>
          
                    
         <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
</div>











  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>







@endsection