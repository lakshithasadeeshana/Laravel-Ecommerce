@extends('user.index')

@section('user')
<br><br>
<h1>Order Details</h1>
     <div class="table-responsive">
       <table class="table table-hover">
            <thead>
                 <tr>
                 <th>Date</th>
                 <th>Product Name</th>
                 <th>Product Price</th>
                 <th>Order Total</th>
                 <th>Order Status</th>
                 </tr>
              
            </thead>
            </tbody>

 @foreach($orders as $order)
            <tr>
                  <th>{{$order->created_at}}</th>
                  <th>{{$order->pro_name}}</th>
                  <th>{{ucwords($order->pro_price)}}</th>
                  <th>{{($order->pro_price)*($order->qty)}}</th>
                  <th>{{$order->status}}</th>
            
            </tr>
@endforeach         


            </tbody>
       </table>
     
     </div>
@endsection