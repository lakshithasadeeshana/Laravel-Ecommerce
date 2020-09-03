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
          <td>Full Name</td>
          <th>Address</th>
          <th>City</th>
          <th>Phone</th>
          <th>Payment Type</th>
         
                   
          
        </tr>
    </thead>
    <tbody>
    <tbody>
   
        <tr>
           <td>{{$address->id}}</td>
            <td>{{$address->fullname}}</td>
            <td>{{$address->state}} </td>
            <td>{{$address->city}} </td>
            <td>{{$address->phone}} </td>
            <td>{{$address->payment_type}}</td>
            
               
       
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