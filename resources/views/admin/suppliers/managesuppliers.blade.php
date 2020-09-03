@extends('layouts.app')

@section('content')
@include('adminnavigation')
<div>
    <a style="margin: 19px;" href="admin/suppliers/suppliers/createsuppliers" class="btn btn-primary">New Supplier</a>
    </div>
    <br>
    <br>
    






  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />


  <div class="container">




    <div class="row">
<div class="col-sm-12">
    <h2 class="display-3">Suppliers</h2>    

  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Address</td>
          <td>Email</td>
          <td>Phone</td>
          <td>Product in Store</td>
          <td>Sold Product</td>
          
          
        </tr>
    </thead>
    <tbody>
    <tbody>
    @foreach($data as $i)
        <tr>
            <td>{{$i->id}}</td>
            <td>{{$i->name}} </td>
            <td>{{$i->address}}</td>
            <td>{{$i->email}}</td>
            <td>{{$i->phone}}</td>
            



            <?php 
            $supplier_id= $i->id;
              $supplierproduct=DB::table('products')->where('supplier_id',$supplier_id)->get()->sum('pro_qty');
              if($supplierproduct>0){
                $pro_id=DB::table('products')->where('supplier_id',$supplier_id)->pluck('id');
              
                $soldproduct=DB::table('order_product')->where('product_id',$pro_id)->get()->sum('qty');

              }else{
                $soldproduct=0;
                $supplierproduct=0;
              }

                 
             ?>

             <td>{{($supplierproduct)-($soldproduct)}}</td>
             <td>{{$soldproduct}}</td>

            <td>
                <a href="{{ route('suppliers.edit',$i->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                
                <form action="{{ route('suppliers.destroy', $i->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  
                  <?php if(($supplierproduct)-($soldproduct)<1){
                   echo'<button class="btn btn-danger" type="submit">Delete</button>';

                  }
                
                  ?>
                  
                </form>
            </td>
        </tr>
        @endforeach
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