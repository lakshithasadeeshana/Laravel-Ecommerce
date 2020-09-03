
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
<h1 style="text-align:center;">Electronic Shop</h1>
    <h2 class="display-3" style="text-align:center;">Inventory Report</h2>  
    <br>
<table class="table table-striped">
    <thead>
        <tr>
        
          <td>Product ID</td>
          <th>Product Name</th>
          <td>Added Qty</td>
          <td>Pending To Deliver Qty</td>
          <td>Delivered Qty</td>
          <td>Stock Available Qty</td>
                   
          
        </tr>
    </thead>
    <tbody>
    <tbody>
    <?php
      $max=0;
      $maxname='';
      
    ?>
    @foreach($product as $oi)
         
        <tr>
            
             <td>{{$oi->id}} </td>
            <td>{{$oi->pro_name}}</td>
            <td>{{$oi->pro_qty}}</td>
            
            <?php  
              $product_id=$oi->id;
              $orderedproduct=DB::table('order_product')->where('product_id',$product_id)->get()->sum('qty');

              $deliveredproduct = DB::table('order_product')
 ->leftJoin('shippings','shippings.order_id','=','order_product.order_id')
 ->where('order_product.product_id','=',$product_id)->get()->sum('qty');
                  ?>


                 <?php
           if($max<$orderedproduct){
            $max=$orderedproduct;
            $maxname=$oi->pro_name;
           }
         ?>
            <td>{{$deliveredproduct-$orderedproduct}}</td>

<td>
{{$deliveredproduct}}
</td>

            <td>{{($oi->pro_qty)-$deliveredproduct}}</td>
               
       @endforeach
                </form>
            </td>
        </tr>
       
    </tbody>
    </tbody>
  </table>
  <br>
  <p style="font-family:'Courier New', Courier, monospace;">Max Selling product of this month : {{$maxname}}</p>
   
  <div>
</div>





</div>
  
</body>
</html>
