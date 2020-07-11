@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as User!
                    <br>
                    <br>

                  
                    <a href="{{'/orders'}}"><button type="button" class="btn btn-secondary">My Orders</button></a>
                    <a href="/admin/products/manageproduct"><button type="button" class="btn btn-secondary">My Wish list</button></a>
                    <a href="/admin/managesuppliers"><button type="button" class="btn btn-secondary">Change the password</button></a>
                    <a href="/admin/managesuppliers"><button type="button" class="btn btn-secondary">Change the Address</button></a>
                    <a href="/user/viewrequest"><button type="button" class="btn btn-secondary">Add a Request</button></a>
                    
                
               

                </div>
            </div>
        </div>
        
    </div>
    @yield('user')
</div>

@endsection
