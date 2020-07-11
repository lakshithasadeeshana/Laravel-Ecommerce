@extends('layouts.app')

@section('content')
@include('adminnavigation')
<div>
    <a style="margin: 19px;" href="admin/product/admin/product/create" class="btn btn-primary">New product</a>
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
  
 <div class="col-md-4">
   <form action="/searchproduct" method="get">
     <div class="input-group">
      <input type="search" name="search" class="form-control">
      <span class="input-group-prepend">
        <button type="submit" class="btn btn-primary">Search </button>
     </span>
     </div>
   
   </form>
 
 
 </div>
  

          

    <div class="row">
<div class="col-sm-12">
    <h2 class="display-3">products</h2>    

  <table class="table table-striped">
    <thead>
        <tr>
          <td>Image</td>
          <td>ID</td>
          <td>Name</td>
          <td>Price</td>
          <td>Quantity</td>
          <td>Sold</td>
          <td>Stock</td>
          
          
        </tr>
    </thead>
    <tbody>
    <tbody>
    <?php
    //define variable for get row sum
    $to =0 ; $to2=0;?>
    @foreach($product as $p)
       
        <tr>
            <td><img src="{{url('images',$p->image)}}" alt="Image" width="80px;" height="80px;"></td>
            <td>{{$p->id}}</td>
            <td>{{$p->pro_name}} </td>
            <td>{{$p->pro_price}}</td>
            <td>{{$p->pro_qty}}</td>
            <td><?php  
              $product_id=$p->id;
              $soldproduct=DB::table('order_product')->where('product_id',$product_id)->get()->sum('qty');
                  ?>
                  {{$soldproduct}}
               </td>
              
            <td>{{($p->pro_qty)-($soldproduct)}}
            
            </td>

            <td>

            <?php
            //to get sum of all rows
             $to +=(($p->pro_qty)-($soldproduct));
             $to2 +=$p->pro_qty; ?>


            <?php 
            //show low stock
             if((($p->pro_qty)-($soldproduct))<10){
              echo'<button class="btn btn-danger" type="submit">Low Stock</button>';
             }
             
             ?> 
            </td>


            <td>
                <a href="{{ route('products.edit',$p->id)}}" class="btn btn-primary">Edit</a>
            </td>


            <td> 
                <form action="{{ route('products.destroy', $p->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
       
    </tbody>
    </tbody>
  </table>
  <br>
  <p><b>Total Stock Product : {{$to}}</b></p>
  <p><b>Total Added Product : {{$to2}}</b></p>
<div>
</div>





</div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>

@endsection