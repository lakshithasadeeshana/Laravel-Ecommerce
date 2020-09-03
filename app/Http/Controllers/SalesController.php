<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\order;
use Illuminate\Support\Facades\DB; 
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;


class SalesController extends Controller
{    
   
   


    public function monthlistproduct(Request $request){

        $month = $request->get('month');
    
      
          $product = Product::all();

          $soldproductday = DB::table('order_product')
              ->leftJoin('orders','orders.id','=','order_product.order_id')
              ->whereMonth('orders.created_at',$month)
                 ->groupBy('DAY')->get([
                DB::raw('DAY(orders.created_at) as day'),
                DB::raw('SUM(qty) as total')
            ]);

        // echo( $soldproductday);
        // echo($product);
        return view('admin/Reports/salesreport',['product'=>$product],['month'=>$month])
        ->with(compact('soldproductday'));
     
    }



    public  function pdfshow($month){
        
        $month= $month;
        $product = Product::all();
         //echo("ok");
         $soldproductday = DB::table('order_product')
              ->leftJoin('orders','orders.id','=','order_product.order_id')
              ->whereMonth('orders.created_at',$month)
                 ->groupBy('DAY')->get([
                DB::raw('DAY(orders.created_at) as day'),
                DB::raw('SUM(qty) as total')
            ]);

        $pdf = PDF::loadView('admin/Reports/salesreport',['product'=>$product],['month'=>$month])
        ->with(compact('soldproductday'));
        
        return $pdf->download('salesreport.pdf');
        }


    public function listsoldproduct(){
        $product = Product::all();

        
        
      
        return view('admin/Reports.soldproduct',['product'=>$product]); 
       // return view('salesChart')->with(compact('current_month_product','last_month_product','last_to_last_month_product')); 
      
      

    }

    public  function pdfinventry(){
        $product = Product::all();

        $pdf = PDF::loadView('admin/Reports.soldproduct',['product'=>$product]);
        return $pdf->download('Inventoryreport.pdf');
        }

    
}
