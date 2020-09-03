@extends('layouts.app')

@section('content')
@include('adminnavigation')


    <br>
    <br>
    


   

 
 
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />


  <div class="container">
  <a style="margin: 19px;" href="admin/suppliers/suppliers/createsuppliers" class="btn btn-primary">New Category</a>



    <div class="row">
<div class="col-sm-12">
    <h2 class="display-3">Categories</h2>    

  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>

        
        </tr>
    </thead>
    <tbody>
    @foreach($category as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->title}} </td>
            
            <td>
                <a href="{{ route('categories.edit',$c->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('categories.destroy', $c->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

</div>




<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</div>

  </div>
</div>
</div>
  @include('foter')


@endsection