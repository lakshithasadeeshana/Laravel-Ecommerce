<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use Illuminate\Support\Facades\DB; 
use App\Address;
use Barryvdh\DomPDF\Facade as PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
      

    public function orderlist()
    {
        $order = order::all();
      return view('admin/orders/manageorders',['order'=>$order]);
     // echo($order);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = Address::where('user_id',$id)->first();
       // echo($address);
        return view('admin/orders.viewaddress',['address'=>$address]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        

        $order_items = DB::table('order_product')
        ->leftJoin('orders','orders.id','=','order_product.order_id')
        ->leftJoin('products','products.id','=','order_product.product_id')
        ->where('order_product.order_id','=',$id)->get();
    
       
       //echo($order_items);
       return view('admin/orders.viewitems',['order_items'=>$order_items]);
       
    }


    public function viewaddress($id)
    {
    
      
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }

    public function invoice($orderid)
    {
        $userID= DB::table('orders')->where('id',$orderid)->pluck('user_id');
        $address = DB::table('address')->where('user_id',$userID)->first();
         //echo($address);
        

      //echo($userID);
      $order_items = DB::table('order_product')
        ->leftJoin('orders','orders.id','=','order_product.order_id')
        ->leftJoin('products','products.id','=','order_product.product_id')
        ->where('order_product.order_id','=',$orderid)->get();
    
       
       //echo($order_items);
       //return view('admin/orders.invoice',['order_items'=>$order_items],['address'=>$address]);

       //generate pdf
       
       $pdf = PDF::loadView('admin/orders.invoice',['order_items'=>$order_items],['address'=>$address]);
       return $pdf->download('Invoice.pdf');
    }

    public function editstatus($id){
        
        $orderstatus = order::find($id);
        
        return view('admin/orders/editorder',['orderstatus' =>  $orderstatus]);
        // echo(  $orderstatus);
    }

    public function updatestatus(Request $request, $id)
    {
      
        $orderstatus = order::find($id);;
        $orderstatus->status =  $request->get('status');
        
       //echo($requests);
     
          $orderstatus->save();

          return redirect ('admin/orders')->with('success', 'Order Status Updated!');
    }
}
