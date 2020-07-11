@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Admin Dashboard</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are in the Report Dashboard!
<br> <br>

             
<a href="/admin/suppliers/managesuppliers"><button type="button" class="btn btn-secondary">Manage suppliers</button></a>
                    <a href="/admin/products/manageproduct"><button type="button" class="btn btn-secondary">Manage Product</button></a>
                    <a href="/admin/orders"><button type="button" class="btn btn-secondary">Manage Orders</button></a>
                    <a href="/admin/report"><button type="button" class="btn btn-secondary"> Reports</button></a>
                    <a href="/admin/categories/managecategories"><button type="button" class="btn btn-secondary">Categories</button></a>
                    <a href="/admin/requests"><button type="button" class="btn btn-secondary">Requests</button></a>
                
                
                </div>
                


            </div>
            <br><br> 
            <div class="col-md-3">
            <form  method="post"  action="{{ url('/admin/report/showsales')}}"  >  
             @csrf
            <div class ="form-group">
          <label for="city">Select Month:</label>
          <select class="form-control" name="month" >
             <option value="1">January</option>
             <option value="2">February</option>
             <option value="3">March</option>
             <option value="4">April</option>
             <option value="5">May</option>
             <option value="6">June</option>
             <option value="7">July</option>
             <option value="8">August</option>
              </select>
              <br>
              <button type="submit" class="btn btn-secondary">View Sales Report</button>
           </form>
           </div>  
           <div class="col-md-3"></div>


          </div>

                   
                   
                    <a href="/admin/soldproduct"><button type="button" class="btn btn-secondary">View Inventroy Report</button></a>
                    <a href="/inventrypdf"><button type="button" class="btn btn-secondary"> Generate Inventroy Report</button></a>
        </div>
    </div>
</div>
@endsection
