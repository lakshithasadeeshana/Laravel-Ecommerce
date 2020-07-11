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
    <h2 class="display-3">Add a Product</h2>
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
      <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data" >
          @csrf
          <div class="form-group">    
              <label for="pro_name">Product Name:</label>
              <input type="text" class="form-control" name="pro_name"/>
          </div>

          <div class="form-group">
              <label for="last_name">Price:</label>
              <input type="number" class="form-control" name="pro_price"/>
          </div>

          <div class="form-group">
              <label for="city">Sale Price:</label>
              <input type="number" class="form-control" name="pro_saleprice" />
          </div>

          <div class="form-group">
              <label for="email">Quantity:</label>
              <input type="number" class="form-control" name="pro_qty"/>
          </div>
         
         
          <div class="row">
          <div class="col-md-6">
          <div class="form-group">
              <label for="email">Voltage:</label>
              <input type="text" class="form-control" name="pro_volt"/>
          </div>
          </div>
          <div class="col-md-6">
          <div class="form-group">
              <label for="email">Power:</label>
              <input type="text" class="form-control" name="pro_power"/>
          </div>
          </div>
          </div>
           
          <div class="row">
          <div class="col-md-6">
          <div class="form-group">
              <label for="email">Resistance:</label>
              <input type="text" class="form-control" name="pro_res"/>
          </div>
          </div>
          <div class="col-md-6">
          <div class="form-group">
              <label for="email">Capacity:</label>
              <input type="text" class="form-control" name="pro_cap"/>
          </div>
          </div>
          </div>
          




          <div class="form-group">
              <label for="city">Description:</label>
              <textarea id="pro_info" roew="5" class="form-control" name="pro_info"></textarea>
          </div>
             
          <div class ="form-group">
          <label for="city">Supplier:</label>
          <select class="form-control" name="supplier_id" >
          
          @foreach($supplier as $id=>$supplier)
             <option value="{{$id}}" >{{$supplier}}</option>
             @endforeach
              </select>
          </div>
          
         
          <div class ="form-group">
          <label for="city">Category:</label>
          <select class="form-control" name="category_id" >
               
          @foreach($category as $id=>$category)
             <option value="{{$id}}">{{$category}}</option>
             @endforeach
              </select>
          </div>

          <div class="form-group">
              <label for="last_name">Image:</label>
              <input type="file" class="form-control" name="image"/>
          </div>
         <br> <br>
          
                    
          <button type="submit" class="btn btn-primary">Add Product</button>
      </form>
  </div>
</div>
</div>











  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>







@endsection