<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipping;
use App\Shippingcompany;
use App\order;
use App\Supplier;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function list()
    {
        $shipping = DB::table('shippings')->get();

        return view('/admin/Shipping/manageShipping',['shipping'=>$shipping]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id'=>'required',
            'company_name'=>'required',
            'address'=>'required',
            'phone'=>'required'
            
        ]);
      
     
        $shipping = new Shipping([

        'order_id' => $request->get('order_id'),
        'customer_id' => $request->get('user_id'),
        'company_name' => $request->get('company_name'),
       'address' => $request->get('address'),
        'phone' => $request->get('phone') 
        
        
        ]);

        
    $shipping->save();
     return redirect('/admin/orders')->with('success', 'Shipping Updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function searchshipping(Request $request){
        $search = $request->get('search');
        
        $shipping = DB::table('shippings')->where('company_name','like','%'.$search.'%')->get();
        return view('/admin/Shipping/manageShipping',['shipping'=>$shipping]);
        //echo($shipping);
     }
     public function searchshippingbyid(Request $request){
        $search = $request->get('searchid');
        
        $shipping = DB::table('shippings')->where('order_id','like','%'.$search.'%')->get();
        return view('/admin/Shipping/manageShipping',['shipping'=>$shipping]);
        //echo($shipping);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loadorders = order::find($id);

        $shippingcompanydetails = Shippingcompany::all();

       return view('admin/orders/handleShipping',['loadorders'=>$loadorders],['shippingcompanydetails'=>$shippingcompanydetails]);
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
        //
    }

    public function storecompany(Request $request)
    {
        $request->validate([
           
            'company_name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email' => 'required'
            
        ]);
      
     
        $shipping = new Shippingcompany([


        'company_name' => $request->get('company_name'),
       'address' => $request->get('address'),
        'phone' => $request->get('phone'),
        'email' => $request->get('email'),
        
        
        
        ]);

        
    $shipping->save();
     return redirect('/admin/shippings')->with('success', 'Shipping Added!');
    }


}
