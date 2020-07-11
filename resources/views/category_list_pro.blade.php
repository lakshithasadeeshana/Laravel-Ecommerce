@extends('welcome')

@section('main')
<br><br>

<div class="container">
<div class="row">


@foreach($category_product as $p)
<div class="col-md-4">
<div class="card mb-4 shadow-sm" >
<img src="{{url('images',$p->image)}}" class="card-img-top"  alt="Card image cap" Style="width:338px; height:250px;">
  <div class="card-body">
    <h5 class="card-title">{{$p->pro_name}}</h5>
    
    <span class="price text-muted float-right"> Rs. {{$p->pro_saleprice}}</span>
    
    <div class="d-flex justify-content-between align-items-center">
       <div class="btn-group">
       <a href="{{url('productDetail',$p->id)}}" class="btn btn-primary">View product</a>
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

