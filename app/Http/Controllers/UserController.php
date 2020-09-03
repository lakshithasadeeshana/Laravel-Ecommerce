<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Address; 

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
    
public function listusers(){

    $users = User::all();

    return view('admin/customer/manageCustomer',['user'=> $users]);
}

public function changeaddress(){
    $user_ID = Auth::user()->id;
    $editaddress = DB::table('address')->where('user_id',$user_ID)->first();
//echo($editaddress);
    return view('user.editaddress',['editaddress'=>$editaddress]);
}

public function updateaddress(Request $request,$id){
    $updateaddress = Address::find($id);
    $updateaddress->fullname =  $request->get('fullname');
    $updateaddress->state = $request->get('state');
    $updateaddress->city = $request->get('city');
    $updateaddress->phone = $request->get('phone');
   
 
    $updateaddress->save();

    return redirect('/user')->with('success', 'Address Updated!');
}


    
}
