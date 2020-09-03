@extends('layouts.app')

@section('content')
<div class="container"  >
    <div class="row justify-content-center" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" ><h2 style="font-family: 'Times New Roman', Times, serif;">Admin Dashboard</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 style="font-family: Impact, Charcoal, sans-serif;"> Welcome Admin!</h5>
<br> <br>

             
                    <a href="/admin/suppliers/managesuppliers"><button type="button" class="btn btn-info" style="font-weight:bold;"><i class="fas fa-user-tie" style="font-size:20px;"></i> Manage suppliers</button></a>
                    <a href="/admin/products/manageproduct"><button type="button" class="btn btn-info" style="font-weight:bold;"><i class="fas fa-box" style="font-size:20px;"></i> Manage Product</button></a>
                    <a href="/admin/orders"><button type="button" class="btn btn-info" style="font-weight:bold;"><i class="fas fa-dolly" style="font-size:20px;"></i> Manage Orders</button></a>
                    <a href="/admin/report"><button type="button" class="btn btn-info" style="font-weight:bold;"><i class="fas fa-clipboard" style="font-size:20px;"></i> Reports</button></a>
                    <a href="/admin/categories/managecategories"><button type="button" class="btn btn-info" style="font-weight:bold;"><i class="fas fa-boxes" style="font-size:20px;"></i> Categories</button></a>
                    <a href="/admin/requests"><button type="button" class="btn btn-info" style="font-weight:bold;"><i class="fas fa-edit" style="font-size:20px;"></i> Requests</button></a>
                    <a href="/admin/customers"><button type="button" class="btn btn-info" style="font-weight:bold;"><i class="fas fa-user-tie" style="font-size:20px;"></i> Customers</button></a>
                    <a href="/admin/shippings"><button type="button" class="btn btn-info" style="font-weight:bold;"><i class="fas fa-truck" style="font-size:20px;"></i> Shipping</button></a>
                
                </div>
               
            </div>


            <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4"> @include('salesChart');</div>
            <div class="col-md-2"></div>
            <div class="col-md-4">
            <br>
            @include('inventoryGraph');</div>
            <div class="col-md-1"></div>
            </div>


        </div>

    </div>
    
  
    </div>
</div>
</div>
@include('foter')

@endsection
