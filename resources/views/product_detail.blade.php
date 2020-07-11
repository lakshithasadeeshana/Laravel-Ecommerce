@extends('welcome')

@section('main')

   <div class="container">
   <br> <br>
      <div class="row">

             @foreach($product as $p)
            <div class="col-md-8 ">
                 <div class="thumbnail">
                    <img src="{{url('images',$p->image)}}" class="catd-image" Style="width:640px; height:487px;">
                 </div>
          
            </div>
            <div class="col-md-4 ">
                <h2><?php echo ucwords($p->pro_name); ?></h2>
                <h5>{{$p->pro_name}}</h5>
                <h2 class="text-danger">Rs {{$p->pro_saleprice}}</h2>
                <p><b>Available : {{$p->pro_qty}} In Stock</b></p>
                <p class="card-text">{{$p->pro_info}}</p>
                <a href="{{url('cart/additem',$p->id)}}" class="btn btn-default btn-sm">Add To Cart<i class="fa fa-shipping-cart"></i></a>
                   <button class="btn btn-default btn-sm">
                         Add To Wish List
                   </button>
            
            </div>
             @endforeach
      </div>
   
   </div>
    

@endsection