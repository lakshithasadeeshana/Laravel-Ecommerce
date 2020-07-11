@extends('layouts.app')

@section('content')
@include('adminnavigation')

<br>
<div class="container">
    <div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<br>
<h1>Users Request</h1>
     <div class="table-responsive">
       <table class="table table-hover">
            <thead>
                 <tr>
                 <th>User ID</th>
                 <th>User Name</th>
                 <th>Request Title</th>
                 <th>Request Quantity</th>
                 <th>product Specification</th>
                 <th>Date</th>
                 <th>Status</th>
                 </tr>
              
            </thead>
            </tbody>

  @foreach($requests as $req)

            <tr>
                  
            <th>{{$req->id}}</th>
                  <?php  
              $user_id=$req->user_id;
              $username=DB::table('users')->where('id',$user_id)->pluck('name');;
              
                  ?>
                  <th>{{($username)}}</th>
                  <th>{{$req->req_proname}}</th>
                  <th>{{$req->req_qty}}</th>
                  <th>{{$req->req_prospec}}</th>
                  <th>{{$req->created_at}}</th>
                  <th>{{$req->status}}</th>
                  
                  <td>
                <a href="{{ url('/admin/requests/edit',$req->id)}}" class="btn btn-primary">Update</a>
                   </td>

                  <td>
                <form action="{{ route('requests.destroy', $req->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            
            </tr>
   @endforeach

       


            </tbody>
       </table>
     
     </div>
     @yield('editstatus')
     </div>
@endsection