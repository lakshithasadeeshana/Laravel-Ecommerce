


<div class="container">
<div id="invoice">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   
       
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        
                    </div>
                    <div class="col company-details">
                    <h1 style="color:#09E8EF; margin-left:500px;">INVOICE</h1>
                    <p style=" margin-left:500px;">Date : {{ date('Y-m-d H:i:s') }}</p>
                        <h2 >
                        Electronic Hub   
                        </h2>
                        <div><p>NO 300, Main Street,</p>
                        <p> Elpitiya,</p>
                        <p> Srilanka.</p>
                             </div>
                        <div>0783245678</div>
                        <div><a href="company@example.com">company@example.com</a></div>
                    </div>
                </div>

            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                    <br><br>
                        <label class="text-gray-light">INVOICE TO:</label>
                       
                        <h4 class="to" >{{$address->fullname}}</h4>
                        
                        <div class="address">{{$address->state}} , </div>
                        <div>{{$address->city}} </div>
                        <div>Srilanka.</div>
                        <?php  
                      $userid_id=$address->user_id;
                      $useremail=DB::table('users')->where('id',$userid_id)->pluck('email');
                  ?>
                        <div class="email"><a href="{{$useremail}}">{{$useremail}}</a></div>
                        
                    </div>
                    <br><br>

                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>PRODUCT NAME</th>
                            <th>ITEM PRICE</th>
                            <th>QUANTITY</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $total=0;
                    ?>
                    @foreach($order_items as $oi)
                        <tr>
                        
                            <td class="no">{{$oi->id}}</td>
                            <td>{{$oi->pro_name}}</td>
                            <td>Rs. {{$oi->pro_price}}  </td>
                             <td>{{$oi->qty}}</td>
                            <td>Rs. {{($oi->pro_price)*($oi->qty)}}  </td>
                            <?php
                            $total+=($oi->pro_price)*($oi->qty);
                            ?>
                            
                        </tr>
                        @endforeach 
                        
                    </tbody>
                    
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>Rs. {{$total}}</td>
                        </tr>
                        
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>Rs. {{$total}}</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice"></div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
            <br>
            <br>
        </div>
        
        <div></div>
    </div>
</div>
</div>