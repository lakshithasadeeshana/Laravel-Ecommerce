@extends('user.index')

@section('user')
<br>
<div>
    <a style="margin: 19px;" href="request/addrequest" class="btn btn-primary">New Request</a>
    </div>
    <div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<br>
<h1>My Request Details</h1>
     <div class="table-responsive">
       <table class="table table-hover">
            <thead>
                 <tr>
                 
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
                  <th>{{$req->req_proname}}</th>
                  <th>{{$req->req_qty}}</th>
                  <th>{{$req->req_prospec}}</th>
                  <th>{{$req->created_at}}</th>
                  <th>{{$req->status}}</th>
                  <td>
                <a href="{{ route('requests.edit',$req->id)}}" class="btn btn-primary">Update</a>
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
@endsection