<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 

class UserController extends Controller
{    
    public function __construct()
    {
        $this->middleware('role:user');
    }


    public function index()
    {
        return view('user.index');
    }


    public function orders(){

        $user_id=Auth::user()->id;
        $orders=DB::table('order_product')
        ->leftJoin('products','products.id','=','order_product.product_id')
        ->leftJoin('orders','orders.id','=','order_product.order_id')
        ->where('orders.user_id','=',$user_id)->get();

        return view('user.orders',['orders'=>$orders]);
    }
}
