
@extends('welcome')

@section('main')
<div class="container">
<br>
<br>
<div class="text-center">
     <h3>Thank you for your Order : 
           <span style='color:green'>{{ucwords(Auth::user()->name)}}</span>
           </h3>
</div>

</div>

@endsection




