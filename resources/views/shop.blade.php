

@extends('welcome')

@section('main')
<br><br>



<!--------------------Slider--------------------->
<div class="container">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{URL::asset('img/shop1.jpg')}}" style="width:1200px; height:300px;" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{URL::asset('img/shop1.jpg')}}" style="width:80%; height:300px;" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{URL::asset('img/shop1.jpg')}}" style="width:80%; height:300px;" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<br><br>
<!--------------------Slider------------------------->

<div class="container" >
<div class="row">

@foreach($product as $p)
<div class="col-md-4">
<div class="card md-4 " >
<img src="{{url('images',$p->image)}}" class="card-img-top" alt="Card image cap"  Style="width:338px; height:250px;">
  <div class="card-body">
    <h5 class="card-title">{{$p->pro_name}}</h5>

    <?php  
              $product_id=$p->id;
              $available="";
              $soldproduct=DB::table('order_product')->where('product_id',$product_id)->get()->sum('qty');

              if((($p->pro_qty)-($soldproduct))== 0){

                $available="Not Available";

               }else if((($p->pro_qty)-($soldproduct))== 1){

                $available="Only 1 Available";

               }
               else{
                 $available="Available";
               }
                  ?>
      <p><b>{{$available}}</b></p>


    
    <span class="price text-muted float-right"> Rs. {{$p->pro_saleprice}}</span>
    
    <div class="d-flex justify-content-between align-items-center">
       <div class="btn-group">
            <a href="{{url('productDetail',$p->id)}}" class="btn btn-primary">View product</a>


            <?php
            if((($p->pro_qty)-($soldproduct))== 0){

              echo '<a href="#" class="btn btn-primary">Wait To<i class="fa fa-shipping-cart"></i></a>';

             }
            ?>
            <a href="{{url('cart/additem',$p->id)}}" class="btn btn-primary">Add To Cart<i class="fa fa-shipping-cart"></i></a>
       </div>
        
    </div>
    </div>
  </div>
 
</div>
@endforeach






</div>
</div>

    

@endsection

