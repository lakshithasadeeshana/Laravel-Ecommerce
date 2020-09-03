@extends('layouts.app')

@section('content')
@include('adminnavigation')
<div>
    <a style="margin: 19px;" href="/admin" class="btn btn-primary">Back To Dashboard</a>
    </div>

    


    


  
  
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />


  <div class="container">




    <div class="row">
<div class="col-sm-12">
    <h2 class="display-3">Customer Orders</h2>    

  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>User</td>
          <td>Total</td>
          <td>Status</td>
                   
          
        </tr>
    </thead>
    <tbody>
    <tbody>
    @foreach($order as $o)
        <tr>
            <td>{{$o->id}}</td>
            <td>{{$o->user_id}} </td>
            <td>{{$o->total}}</td>
            <td>{{$o->status}}</td>
            <td></td>
            <td>
                <a href="{{ route('manageorders.edit',$o->id)}}" class="btn btn-primary">View Items</a>
            </td>
            <td>
                <a href="{{ route('manageorders.show',$o->user_id)}}" class="btn btn-secondary">View Address</a>
            </td>
            <td>
                <a href="{{ url('/invoice',$o->id)}}" class="btn btn-warning">Print Invoice</a>
            </td>

            <td>
                <a href="{{ url('/admin/orders/edit',$o->id)}}" class="btn btn-warning">Update</a>
            </td>




            <td>
            <?php 

          $value = DB::table('shippings')->where('order_id',$o->id)->get()->count('id');

            if($value>=1){
              echo '<button class="btn btn-danger" >Complete Handover</button>';
             }
             else{
             ?>
             <a href="{{ url('admin/shipping',$o->id)}}" class= "btn btn-warning">Shipping </a>
           
               <?php } ?> 
            </td>
         
       @endforeach 
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
</div>
</div>
</div>
  @include('foter')

@endsection