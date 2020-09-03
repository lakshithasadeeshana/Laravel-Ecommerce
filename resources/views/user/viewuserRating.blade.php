@extends('user.index')

@section('user')
<br><br>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E shop</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container">
   





  <div class="row" id="app">
 <div class="col-sm-8 offset-sm-2">
    
  <div>
   <br>
   <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Product</td>
          <td>Presentage</td>
          <td>Description</td>
        
        </tr>
    </thead>
    <tbody>
    @foreach($myreviews as $mr)
        <tr>
            <td>{{$mr->id}}</td>
            <?php 
            $rate_product_name = DB::table('products')->where('id',$mr->product_id)->pluck('pro_name');
            
            ?>
            <td>{{ $rate_product_name}} </td>
            <?php 
            $rate_product_presentage = $mr->rating*20;
            
            ?>
           <td>{{  $rate_product_presentage}} %</td>
           <td>{{$mr->description}}</td>
           <td><star-rating style="margin-left:50px;" rating="{{$mr->rating}}" v-bind:star-size="20"></star-rating></td>
        </tr>
        @endforeach
    </tbody>
  </table>
   
  </div>
</div>
</div>




  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>







@endsection