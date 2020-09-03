<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Address;
use App\order;
use Illuminate\Support\Facades\DB;





class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    
    public function checkout(){
      $user_ID = Auth::user()->id;  

      $address = DB::table('address')->where('user_id',$user_ID)->first();
        $cartItems = Cart::content();
      return view('checkout',['cartItems'=>$cartItems, 'address'=>$address]) ;
       // echo(Auth::user());
       return redirect('checkout');


         }

         public function address(Request $request){
            $this->validate($request,[
                
              'fullname'=>'required|min:5',
              'city' =>'required',
              'state'=>'required',
              'phone'=>'required'
              
              
            ]);
    
            $request['user_id']=Auth::user()->id;
    
            
              Address::create($request->all());


              order::createOrder();
             Cart::destroy();

       
          return view('thanksyou');
    
        }
        

}
