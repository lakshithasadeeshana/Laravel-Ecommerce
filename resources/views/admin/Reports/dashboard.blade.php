@extends('layouts.app')

@section('content')
@include('adminnavigation')
<br>
<div  class ="container">
<br><br><br><br>
  <div class="row">
         
            <br><br> 
            <div class="col-md-1"></div>
        <div class="col-md-3">
        <form  method="post"  action="{{ url('/admin/report/showsales')}}"  >  
             @csrf
            <div class ="form-group">
          <label for="city" style="font-size:20px;font-weight:bold;">Select Month:</label>
          <select class="form-control" name="month" >
             <option value="1">January</option>
             <option value="2">February</option>
             <option value="3">March</option>
             <option value="4">April</option>
             <option value="5">May</option>
             <option value="6">June</option>
             <option value="7">July</option>
             <option value="8">August</option>
             <option value="9">September</option>
             <option value="10">October</option>
             <option value="11">November</option>
             <option value="12">December</option>
              </select>
              
              <br>
              <button type="submit" class="btn btn-secondary"><i class="fas fa-eye" style="font-size:20px;color:black"></i> View Sales Report</button>
           </form>
     </div>  
         


          </div>
          <div class="col-md-1"></div>
          <div class="col-md-3">      
                   <br><br>
         <a href="/admin/soldproduct" style="margin-right:20px; margin-left:20px;"><button type="button" class="btn btn-success"><i class="fas fa-eye" style="font-size:20px;color:black"></i>  View Inventroy Report</button></a>
         </div>
         
         <div class="col-md-3">
         <br><br>
        <a href="/inventrypdf" style="margin-right:20px; margin-left:20px;"><button type="button" class="btn btn-warning"><i class="fa fa-download" style="font-size:20px;color:black"></i> Generate Inventroy Report</button></a>

        </div>
       
    </div>
    <br><br><br><br><br><br><br>
  
</div>
</div>

@include('foter')
@endsection
