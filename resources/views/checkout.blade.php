@extends('welcome')

@section('main')



<section class="hero hero-page gray-bg padding-small">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-9 order-2 order-lg-1">
                    <br>
                    <h2>Checkout</h2>
                    <p class="lead text-muted">You currently have {{Cart::count()}} item(s) in your basket</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Checout Forms-->
    <div class="table-responsive cart_info">
        <table class="table table-condensed border-bottom">
            <thead>
            <tr>
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
            </tr>
            <tr class="cart_menu badge-info">
                <td class="image">Item</td>
                <td class="description"></td>
                <td class="price">Price</td>
                <td class="quantity">Quantity</td>
                <td class="total">Total</td>
                <td></td>
            </tr>
            </thead>
            <?php $count =1;?>
            @foreach($cartItems as $cartItem)
                <tbody>
                <tr>
                    <td class="cart_product">
                        <a href="{{url('/product_details')}}/{{$cartItem->id}}"><img src="{{url('images',$cartItem->options->img)}}" alt="" width="200px"></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href="{{url('/product_details')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a></h4>
                        <p>Product ID: {{$cartItem->id}}</p>
                        <p>Only {{$cartItem->options->stock}} left</p>
                    </td>
                    <td class="cart_price">
                        <p >Rs.{{$cartItem->price}}</p>
                    </td>
                    <td class="cart_quantity">
                        <form action="{{url('cart/update',$cartItem->rowId)}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="proId" value="{{$cartItem->id}}"/>
                        <div class="cart_quantity_button">
                            <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}"/>
                            <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}"/>
                            <input type="number" size="2" value="{{$cartItem->qty}}" name="qty" id="upCart<?php echo $count;?>" autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="30">
                            <input type="submit" class="btn btn-primary" value="Update" styel="margin:5px">
                        </div>
                        </form>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">Rs.{{$cartItem->subtotal}}</p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" style="background-color:red"
                           href="{{url('/cart/remove')}}/{{$cartItem->rowId}}">Remove</a>
                    </td>
                </tr>
                <?php $count++;?>
                </tbody>
            @endforeach
        </table>
    </div>

    <?php  // form start here ?>
    <section class="checkout">
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="tab-content">
                        <div id="address" class="active tab-block">
                            <form action="{{url('admin/formvalidate')}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                               
                                <h1>Shipping Address</h1>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="firstname" class="form-label">Name</label>
                                        <input id="firstname" type="text" name="fullname" placeholder=" Name"  value="{{ $address->fullname }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('fullname') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastname" class="form-label">Address</label>
                                        <input id="lastname" type="text" name="state" placeholder="Address" value="{{ $address->state}}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('state') }}</span>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="lastname" class="form-label">City Name</label>
                                        <input id="lastname" type="text" name="city" placeholder="City Name" value="{{ $address->city }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('city') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastname" class="form-label">Phone</label>
                                        <input id="lastname" type="number" name="phone" placeholder="phone" value="{{ $address->phone }}" class="form-control">
                                        <br>
                                        
                                    </div>
                                    <hr>
                                  
                      <input type="radio" name="payment_type" value="Cash on Delevery" checked="checked"> Cash on Delevery
                      
                </span>
                                   <br>
                                   &nbsp; <input type="radio" name="payment_type" value="Card Payment" checked="checked"> Card Payment
                                    <div class="row" style="height: 34px; margin-left: 15px;">

                                    @include('paypal') &nbsp; &nbsp;

                                      <input type="submit" value="Continue" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="block-body order-summary">
                        <h6 class="text-uppercase">Order Summary</h6>
                        
                        <ul class="order-menu list-unstyled">
                            <li class="d-flex justify-content-between"><span>Order Subtotal </span><strong>Rs.{{Cart::subtotal()}}</strong></li>
                            <li class="d-flex justify-content-between"><span>Order Quantity</span><strong> {{Cart::count()}} </strong></li>
                            
                            <li class="d-flex justify-content-between"><span>Total</span><strong class="text-primary price-total">Rs.{{Cart::subtotal()}}</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php  // form start here ?>

@endsection