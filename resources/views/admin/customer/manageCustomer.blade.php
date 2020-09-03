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
        
          <td>Email</td>
         
          
          
        </tr>
    </thead>
    <tbody>
    <tbody>
    @foreach( $users as $i)
        <tr>
            <td>{{$i->id}}</td>
            <td>{{$i->name}} </td>
           
            <td>{{$i->email}}</td>
          
            


            <td>
                
                <form action="{{ route('suppliers.destroy', $i->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                 
                   <button class="btn btn-danger" type="submit">Delete</button>
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