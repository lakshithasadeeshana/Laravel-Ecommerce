@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header"><h2 style="font-family: 'Times New Roman', Times, serif;">{{ Auth::user()->name }} Dashboard</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 style="font-family: Impact, Charcoal, sans-serif;"> Welcome {{ Auth::user()->name }}!</h5> 
                    <br>
                    <br>

                  
                    <a href="{{'/orders'}}"><button type="button" class="btn btn-info" style="font-weight:bold;"><i class="fas fa-shipping-fast" style="font-size:20px; color:#4b069e"></i> My Orders</button></a>
                    <a href="/user/viewmyratings"><button type="button" class="btn btn-info" style="font-weight:bold;"><i class="fa fa-list" style="font-size:20px; color:#4b069e"></i> My Ratings</button></a>
                    <a href="/user/editaddress"><button type="button" class="btn btn-info" style="font-weight:bold;"><i class="fa fa-map-marker" style="font-size:20px; color:#4b069e"></i> Change the Address</button></a>
                    <a href="/user/viewrequest"><button type="button" class="btn btn-info" style="font-weight:bold;"><i class="fa fa-envelope" style="font-size:20px; color:#4b069e"></i> Add a Request</button></a>
                    
                
               

                </div>
            </div>
        </div>
        
    </div>
    @yield('user')
</div>
</div>
@include('foter')
@endsection
