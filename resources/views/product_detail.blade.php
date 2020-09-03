@extends('welcome')

@section('main')

   <div class="container" id="app">
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
                        
                   </button>
            
            </div>
             @endforeach
      </div>

      <!---------------star rating----------------->
      
      <!---------------star rating----------------->


  
<?php  



              $product_id=$p->id;
              $totalreviews=DB::table('product_reviews')->where('product_id',$product_id)->get()->sum('rating');
              $countreviews=DB::table('product_reviews')->where('product_id',$product_id)->get()->count('rating');
              if($totalreviews==null && $countreviews==null){
               $sumreviews=0;
               echo("<h3> No Review, Be The First Reviewer of This Product</h3>");
              }else{
               $sumreviews=$totalreviews/$countreviews;
               echo("<h3>{$countreviews} Reviews About This product</h3>");
              }
              
                  ?>

<star-rating rating="{{$sumreviews}}"></star-rating>
<br>

<!--------------dropdown------------------>

<p>

  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    View Ratings
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">

  @foreach($reviews as $r)

<div class="col-md-12 ">
   <div class="row">
   <h5 style="margin-left:50px;font-family:Impact, Charcoal, sans-serif;" style="font-family: Impact, Charcoal, sans-serif;">{{$r->name}}</h5>
   <h5 style="margin-left:50px;">{{$r->headline}}</h5>
   <h6 style="margin-left:50px;font-family:'Courier New', Courier, monospace;" >{{$r->description}}</h6>
  
             <star-rating style="margin-left:50px;" rating="{{$r->rating}}" v-bind:star-size="20"></star-rating>
             </div>
</div>
<br>
@endforeach
  </div>
</div>
<!----------------end drop down----------->



<div>


<script src="{{ asset('js/app.js') }}" defer></script>
<!---------rating part--------->
<!---------<div class="item-wrapper">

         </div>
         
         <star-rating></star-rating>
         <h5 class="model-title">Review</h5>

               <form method="post" action="{{ route('productsreview.store') }}"> 
               
               @csrf

            <div class="form-group">    
              <label for="rating">Rating : </label>
              <select class="form-control" name="rating" >
             <option value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option>
             <option value="4">4</option>
             <option value="5">5</option>
              </select>
          </div>

          <div class="form-group">
              <label for="last_name">Head Line :</label>
              <input type="text" class="form-control" name="headline"/>
          </div>
         
          <div class="form-group">
              <label for="city">Description:</label>
              <textarea id="description" row="5" class="form-control" name="description"></textarea>
          </div>
             
             <input type="hidden" name="product_id" value="{{$p->id}}" >
                    
         
          @if(auth()->check())
         
         <button type="submit" class="btn btn-primary" data-toggle="model" data-target="#exampleModel">
           Add  Review
           </button>
           @else
           <a class="btn btn-primary" href="{{ route('login') }}">Please Log In to The System to Add a Review</a>
           @endif


      </form>

</div>----------------->
<!---------rating part--------->

@include('review_form')
  
   </div>
   <br><br>
   <div class="sp" style="background-color: #3e4145; border-radius:30px;">
    <h1 style="text-align:center; color:red; padding-top:10px; padding-bottom:10px;font-family:'Courier New', Courier, monospace;"  >SIMILAR Products</h1>
    </div>
    <br>
    @include('similer_product')

@endsection