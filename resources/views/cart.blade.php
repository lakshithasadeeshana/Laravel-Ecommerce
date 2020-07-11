@extends('welcome')

@section('main')

    <script>
        $(document).ready(function(){
            <?php for($i=1;$i<20;$i++){?>
$('#upCart<?php echo $i;?>').on('change keyup', function(){
                var newqty = $('#upCart<?php echo $i;?>').val();
                var rowId = $('#rowId<?php echo $i;?>').val();
                var proId = $('#proId<?php echo $i;?>').val();
                if(newqty <=0){ alert('enter only valid qty') }
                else {
                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '<?php echo url('/cart/update');?>/'+proId,
                        data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                        success: function (response) {
                            console.log(response);
                            $('#updateDiv').html(response);
                        }
                    });
                }
            });
            <?php } ?>
        });
    </script>
    <?php if ($cartItems->isEmpty()) { ?>
    <br>
    <br>
    <br>
    <section id="cart_items">
        <div class="container">
            <div align="center">  <img src="{{URL::asset('img/emptycart.png')}}" style="width:500px; height:300px;"/></div>
            <p ><b><h2 style="align:centure;">Sorry Your Cart is Empty</h2></b></p>
        </div>
    </section> <!--/#cart_items-->
    <?php } else { ?>
    <br>
    <br>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}"></a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div id="updateDiv">

                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Image</td>
                            <td class="description">Product</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                        @if(session('error'))

                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
                        </thead>
                        <?php $count =1;?>
                        @foreach($cartItems as $cartItem)
                            <tbody>
                            <tr>
                                <td class="cart_product">
                                    <p><img src="{{url('images',$cartItem->options->img)}}" class="img-responsive" width="250"></p>
                                </td>
                                <td class="cart_description">
                                <!--<a href="{{url('/product_detail')}}/{{$cartItem->id}}">heang</a>
                                            <br>-->
                                    <!--</div>-->
                                    <h4><a href="{{url('/product_detail')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a></h4>
                                    <p>Product ID: {{$cartItem->id}}</p>
                                    <p>Only {{$cartItem->options->stock}} left</p>
                                </td>
                                <td class="cart_price">
                                    <p>Rs.{{$cartItem->price}}</p>
                                </td>
                                <td class="cart_quantity">
                                <form action="{{url('cart/update',$cartItem->rowId)}}" method="post" role="form">

                                          <input type="hidden" name="_method" value="PUT">
                                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                                         <input type="hidden" name="proId" value="{{$cartItem->id}}"/>
                                         <input type="number" size="2" value="{{$cartItem->qty}}" name="qty" id="upCart<?php echo $count;?>"
                                         autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="1000">
                                           <input type="submit" class="btn btn-primary" value="Update" styel="margin:5px">
                                    </form>

                                    <!--</div>-->
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">Rs.{{$cartItem->subtotal}}</p>
                                </td>
                                <td class="cart_delete">
                                    <button class="btn btn-primary">
                                        <a class="cart_quantity_delete" style="background-color:red" href="{{url('/cart/remove')}}/{{$cartItem->rowId}}"><i class="fa fa-times">Delete</i></a>
                                    </button>
                                </td>
                            </tr>
                            <?php $count++;?>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>Check Out</h3>
               
            </div>
            <div class="row">
                <div class="col-sm-6">
                   
                                      
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>Rs.{{Cart::subtotal()}}</span></li>
                           
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>Rs.{{Cart::subtotal()}}</span></li>
                        </ul>
                        
                        <a class="btn btn-primary" href="{{url('/')}}/checkout">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
    <?php } ?>
@endsection