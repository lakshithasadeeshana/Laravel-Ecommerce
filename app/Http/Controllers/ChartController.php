<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Controllers\Chart;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function soldproduct()
    {
        $product = Product::all();
      //  $charts = new Chart;

      //  $chart -> labels(['First', 'Second', 'Third']);
      //  $chart -> dataset('Sample', [1, 2, 3]);
    //echo($product);
    $current_month_product = DB::table('order_product')
    ->leftJoin('orders','orders.id','=','order_product.order_id')
    ->whereYear('orders.created_at',Carbon::now()->year)->whereMonth('orders.created_at',Carbon::now()->month)->sum('order_product.qty');
//echo($soldproduct);
$last_month_product = DB::table('order_product')
    ->leftJoin('orders','orders.id','=','order_product.order_id')
    ->whereYear('orders.created_at',Carbon::now()->year)->whereMonth('orders.created_at',Carbon::now()->subMonth(1))->sum('order_product.qty');

    $last_to_last_month_product = DB::table('order_product')
    ->leftJoin('orders','orders.id','=','order_product.order_id')
    ->whereYear('orders.created_at',Carbon::now()->year)->whereMonth('orders.created_at',Carbon::now()->subMonth(2))->sum('order_product.qty');

    $totalinventory = DB::table('products')->get()->sum('pro_qty');
    $totalsoldproduct = DB::table('order_product')->get()->sum('qty');
    

    
        //return view('admin/index',['current_month_product'=> $current_month_product],['last_month_product'=>$last_month_product],['last_to_last_month_product'=>$last_to_last_month_product]);
       return view('admin/index')->with(compact('current_month_product','last_month_product','last_to_last_month_product','totalinventory','totalsoldproduct'));
      
        //echo($last_to_last_month_product);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
