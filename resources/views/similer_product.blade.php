<?php 
$rasp=$p->pro_name ;
$raspb = substr($rasp,0,3);
$similer_product = DB::table('products')->where('pro_name','like','%'.$raspb.'%')->get();

?>




<div class="container" >
<div class="row">

@foreach($similer_product as $sp)
<div class="col-md-4">
<div class="card md-4 " >
<img src="{{url('images',$sp->image)}}" class="card-img-top" alt="Card image cap"  Style="width:338px; height:250px;">
  <div class="card-body">
    <h5 class="card-title">{{$sp->pro_name}}</h5>

    <?php  
              $product_id=$sp->id;
              $available="";
              $soldproduct=DB::table('order_product')->where('product_id',$product_id)->get()->sum('qty');

              if((($sp->pro_qty)-($soldproduct))== 0){

                $available="Not Available";

               }else if((($sp->pro_qty)-($soldproduct))== 1){

                $available="Only 1 Available";

               }
               else{
                 $available="Available";
               }
                  ?>
      <p><b>{{$available}}</b></p>


    
    <span class="price text-muted float-right"> Rs. {{$sp->pro_saleprice}}</span>
    
    <div class="d-flex justify-content-between align-items-center">
       <div class="btn-group">
            <a href="{{url('productDetail',$sp->id)}}" class="btn btn-primary">View product</a>


            <?php
            if((($sp->pro_qty)-($soldproduct))== 0){

              echo '<a href="#" class="btn btn-primary">Wait To<i class="fa fa-shipping-cart"></i></a>';

             }
            ?>
            <a href="{{url('cart/additem',$sp->id)}}" class="btn btn-primary">Add To Cart<i class="fa fa-shipping-cart"></i></a>
       </div>
        
    </div>
    </div>
  </div>
 
  </div>
@endforeach






</div>
</div>