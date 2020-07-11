<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class order extends Model
{
    protected $table ='orders';
    protected $primaryKey ='id';
    protected $fillable =['total','status','user_id'];


   public function orderFields(){

    return $this->belongsToMany(Product::class)->withpivot('qty','total');
   }
   public static function createOrder(){
     $user=Auth::user();
     $order = $user->orders()->create(['total'=>Cart::subtotal(),'status'=>'pending']);
     $cartItems = Cart::content();

     foreach($cartItems as $cartItem){

        $order->orderFields()->attach($cartItem->id,['qty'=>$cartItem->qty,'tax'=>0,'total'=>$cartItem->qty*$cartItem->price]);
     }

   }
    
}
