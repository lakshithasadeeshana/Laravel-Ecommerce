<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Address;
use App\order;





class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    
    public function checkout(){
        
        $cartItems = Cart::content();
      return view('checkout',['cartItems'=>$cartItems]) ;
       // echo(Auth::user());
       return redirect('checkout');


         }

         public function address(Request $request){
            $this->validate($request,[
                
              'fullname'=>'required|min:5',
              'city' =>'required',
              'state'=>'required'
              
              
            ]);
    
            $request['user_id']=Auth::user()->id;
    
            
              Address::create($request->all());


              order::createOrder();
             Cart::destroy();

       
          return view('thanksyou');
    
        }
        

}
