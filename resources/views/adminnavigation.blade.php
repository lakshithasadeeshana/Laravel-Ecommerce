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

                    You are logged in as Admin!
<br> <br>

             
                    <a href="/admin/suppliers/managesuppliers"><button type="button" class="btn btn-secondary">Manage suppliers</button></a>
                    <a href="/admin/products/manageproduct"><button type="button" class="btn btn-secondary">Manage Product</button></a>
                    <a href="/admin/orders"><button type="button" class="btn btn-secondary">Manage Orders</button></a>
                    <a href="/admin/report"><button type="button" class="btn btn-secondary"> Reports</button></a>
                    <a href="/admin/categories/managecategories"><button type="button" class="btn btn-secondary">Categories</button></a>
                    <a href="/admin/requests"><button type="button" class="btn btn-secondary">Requests</button></a>
                
                </div>
               
            </div>
            
        </div>
    </div>
</div>