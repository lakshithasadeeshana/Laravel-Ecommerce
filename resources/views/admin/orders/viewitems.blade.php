@extends('layouts.app')

@section('content')
<div>
    <a style="margin: 19px;" href="/admin/orders" class="btn btn-primary">Back To Orders</a>
    </div>

    


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
    <h2 class="display-3">Customer Orders Items</h2>    

  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Product ID</td>
          <td>Order ID</td>
          <th>Product Name</th>
          <th>Price</th>
          <td>Quantity</td>
          <td>Total</td>
                   
          
        </tr>
    </thead>
    <tbody>
    <tbody>
    @foreach($order_items as $oi)
        <tr>
            <td>{{$oi->id}}</td>
            <td>{{$oi->product_id}} </td>
            <td>{{$oi->order_id}}</td>
            <td>{{$oi->pro_name}}</td>
            
            <td>Rs. {{$oi->pro_price}}  </td>
            <td>{{$oi->qty}}</td>
            <td>Rs. {{($oi->pro_price)*($oi->qty)}}  </td>
               
       @endforeach 
                </form>
            </td>
        </tr>
       
    </tbody>
    </tbody>
  </table>
<div>
</div>





</div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>

@endsection