@extends('user.index')

@section('user')
<br><br>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E shop</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container">
   





  <div class="row">
 <div class="col-sm-8 offset-sm-2">
    
  <div>
   <br>
 
   <form method="post" action="{{ url('/user/editaddress',$editaddress->id)}}">
    @method('PUT')
    @csrf

                               
                               
                                <h1>Edit Shipping Address</h1>
                                <?php 
                                $fname= $editaddress->fullname;
                                ?>
                                    <div class="form-group ">
                                        <label for="firstname" class="form-label">Full Name</label>
                                        <input id="firstname" type="text" name="fullname" placeholder=" Name"  value="{{  $fname }}" class="form-control">
                                        <br>
                                        
                                    </div>

                                    <div class="form-group ">
                                        <label for="lastname" class="form-label">Street</label>
                                        <input id="lastname" type="text" name="state" placeholder="Address" value="{{ $editaddress->state }}" class="form-control">
                                        <br>
                                       
                                    </div>
                                    
                                    <div class="form-group ">

                                        <label for="lastname" class="form-label">City Name</label>
                                        <input id="lastname" type="text" name="city" placeholder="City Name" value="{{ $editaddress->city }}" class="form-control">
                                        <br>
                                        
                                    </div>

                                    <div class="form-group ">
                                        <label for="lastname" class="form-label">Phone</label>
                                        <input id="lastname" type="number" name="phone" placeholder="phone" value="{{ $editaddress->phone }}" class="form-control">
                                        <br>
                                        
                                    </div>
                                    <div>
                                      <input type="submit" value="Update" class="btn btn-primary">
                                    </div>
                               
                            </form>
  </div>
</div>
</div>




  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>







@endsection