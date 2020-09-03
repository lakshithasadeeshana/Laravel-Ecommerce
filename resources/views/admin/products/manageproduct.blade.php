@extends('layouts.app')

@section('content')
@include('adminnavigation')
<div>
    <a style="margin: 19px;" href="admin/product/admin/product/create" class="btn btn-primary">New product</a>
    </div>
  
 
    <br>
    <br>
    
  
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />


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
 <div class="col-sm-12">

@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}  
  </div>
@endif
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
          <td>Delivered</td>
          <td>Pending to Deliver</td>
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
             // $pendingsoldproduct=DB::table('order_product')->where('product_id',$product_id)->get()->sum('qty');

              $soldproduct = DB::table('order_product')
              ->leftJoin('shippings','shippings.order_id','=','order_product.order_id')
              ->where('order_product.product_id','=',$product_id)->get()->sum('qty');

                  ?>
              
                  {{$soldproduct}}

               </td>



            <td><?php  
              $product_id=$p->id;
              $deleverypending=DB::table('order_product')->where('product_id',$product_id)->get()->sum('qty');
                  ?>
                  {{$deleverypending}}
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
            <?php $user = Auth::user()->id; ?>
              
            
              
                <td>
                <a href="{{ route('products.edit',$p->id)}}"class="btn btn-primary">Edit</a>
            </td>


            <td> 
                <form action="{{ route('products.destroy', $p->id)}}" method="post">
                  @csrf
                  @method('DELETE')
              <?php  if($user==1){
               echo '<button class="btn btn-danger" type="submit">Delete</button>';
              }
                  ?>
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

</div>
</div>
</div>
@include('foter')

@endsection