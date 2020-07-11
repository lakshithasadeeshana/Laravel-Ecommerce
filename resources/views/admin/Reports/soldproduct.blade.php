
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
    <h2 class="display-3">Inventry Report</h2>  
<table class="table table-striped">
    <thead>
        <tr>
        
          <td>Product ID</td>
          <th>Product Name</th>
          <td>Added Quntity</td>
          <td>Sold Quntity</td>
          <td>Stock Quntity</td>
                   
          
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
              $soldproduct=DB::table('order_product')->where('product_id',$product_id)->get()->sum('qty');
                  ?>


                 <?php
           if($max<$soldproduct){
            $max=$soldproduct;
            $maxname=$oi->pro_name;
           }
         ?>
            <td>{{$soldproduct}}</td>
            <td>{{($oi->pro_qty)-$soldproduct}}</td>
               
       @endforeach
                </form>
            </td>
        </tr>
       
    </tbody>
    </tbody>
  </table>
  
  <p>Max Selling product of this month : {{$maxname}}</p>
   
  <div>
</div>





</div>
  
</body>
</html>
