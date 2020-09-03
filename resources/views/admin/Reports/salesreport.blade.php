

<div class="col-lg-10 col-lg-offset-1" style="margin-top:20px; text-alogn:right">

<div class="btn-group mb-4">
<a  href="{{ url('/salespdf',$month)}}" class="btn btn-success">Save As PDF</a>
</div>
</div>





<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<div>
    
 
    <br>
    <br>
    


    <!DOCTYPE html>
<html lang="en">
<head>

  <title>E shop</title>
  
</head>
<body>
  <div class="container">
  



          

    <div class="row">
<div class="col-sm-12">




<div class="col-md-4" >
<div class ="form-group">

          </div>
          </div>
      <br> 
      <h1 style="text-align:center;">Electronic shop</h1>




<?php 

$month_num =$month; 
  
$month_name = date("F", mktime(0, 0, 0, $month_num, 10));  
?>


    <h2 class="display-3" style="text-align:center;">Sales Report : <?php echo $month_name ?> 2020</h2>    
    <br>
  <table class="table table-striped">
    <thead>
        <tr>
         
          <td><span>ID</span></td>
          <td><span>Name</span></td>
          <td>Price</td>
          <td>Quantity</td>
          <td>Purchase Cost</td>
          <td>Sold Quntity</td>
          <td>Sold Price</td>
          <td>Income</td>
          <td>Profit</td>
          
          
        </tr>
    </thead>
    <tbody>
    <tbody>
    <?php
    //define variable for get row sum
    $totalprofit =0 ; $to2=0;?>
    @foreach($product as $p)
       
        <tr>
            
            <td>{{$p->id}}</td>
            <td>{{$p->pro_name}} </td>
            <td>{{$p->pro_price}}</td>
            <td>{{$p->pro_qty}}</td>
            <td>{{($p->pro_qty)*($p->pro_price)}}</td>
            <td>

               <?php  

              $product_id=$p->id;
              $soldproduct = DB::table('order_product')
              ->leftJoin('orders','orders.id','=','order_product.order_id')
              ->where('product_id',$product_id)->whereMonth('orders.created_at',$month)->get()->sum('qty');

                  ?>
                  
                  {{$soldproduct}}
               </td>
               <td>{{$p->pro_saleprice}}</td>
               <td>{{($soldproduct)*($p->pro_saleprice)}}</td>
              <td>{{($soldproduct)*($p->pro_saleprice)-($soldproduct)*($p->pro_price)}}</td>
            
            

            <td>

            <?php
            //to get sum of all rows
             $totalprofit +=(($soldproduct)*($p->pro_saleprice)-($soldproduct)*($p->pro_price));
             $to2 +=$p->pro_qty; ?>


            
            </td>

        </tr>
        @endforeach
       
    </tbody>
    </tbody>
  </table>
  <h4>Total Profit : Rs. {{$totalprofit}}</h4>
  <!---------<p>Total Added Product : {{$to2}}</p>------------->
<div>
</div>

<!----------------------linegraph----------------->


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["linechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Quantity'],


@php
  
      foreach($soldproductday as $sd) {
    
    
     echo "['".$sd->day."', ".$sd->total."],";

 }
	@endphp


        ]);

        var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));
        chart.draw(data, {width: 800, height: 240, legend: 'bottom', title: ''  });
      }
    </script>
  </head>

<br>
    <div style="margin-left:150px;" id="chart_div2"></div>
 

  <!------------------------------linegraph-------------------->

</div>

</body>
</html>









