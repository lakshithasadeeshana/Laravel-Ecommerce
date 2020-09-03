@extends('layouts.app')

@section('content')
@include('adminnavigation')



    <!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E shop</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container"><br>
  <a style="margin: 19px;" href="/admin/shippings/create" class="btn btn-primary">Add Company</a>
  <div class="row">
  <div class="col-md-4">
   <form action="/searchshipping" method="get">
     <div class="input-group">
      <input type="search" name="search" class="form-control">
      <span class="input-group-prepend">
        <button type="submit" class="btn btn-primary">Search Company</button>
     </span>
     </div>
   
   </form>
 
 
 </div>
 <div class="col-md-4">
   <form action="/searchshippingbyid" method="get">
     <div class="input-group">
      <input type="search" name="searchid" class="form-control">
      <span class="input-group-prepend">
        <button type="submit" class="btn btn-primary">Search By ID</button>
     </span>
     </div>
   
   </form>
 
 
 </div>
 </div>
<br><br>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Company Name</td>
          <td>Address</td>
          <td>Phone</td>
          <td>Order ID</td>
          <td>Handover Date</td>
          
        
        </tr>
    </thead>
    <tbody>
    @foreach($shipping as $sp)
        <tr>
            <td>{{$sp->company_name}}</td>
            <td>{{$sp->address}} </td>
            <td>{{$sp->phone}} </td>
            <td>{{$sp->order_id}} </td>
            <td>{{$sp->created_at}} </td>
      
  
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

<div class="gra" style="margin-left:350px;">
<br>

</div>

 
</body>
</html>

@endsection