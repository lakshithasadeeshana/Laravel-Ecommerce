
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="upload" value="1">
  <input type="hidden" name="business" value="sadeeshana1995@gmail.com">
 
  

 <?php $count=0; ?>

 @foreach ($cartItems as $cartItem)

   <?php $count++; ?>

 <input type="hidden" name="item_name_{{$count}}" value="{{$cartItem->name}}">
 <input type="hidden" name="item_number_{{$count}}" value="{{$cartItem->id}}">
 <input type="hidden" name="quantity_{{$count}}" value="{{$cartItem->qty}}">
 <input type="hidden" name="amount_{{$count}}" value="{{($cartItem->price)/180}}">
 <input type="hidden" name="shipping_{{$count}}" value="3">
 <input type="hidden" name="tax_{{$count}}" value="0">
 <br>

@endforeach

  <input id ="paypalbtn" type="image" name="submit"
  src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
   value="PayPal" 
    formaction="https://www.paypal.com/cgi-bin/webscr">
