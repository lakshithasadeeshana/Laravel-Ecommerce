<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\order;
use Illuminate\Support\Facades\DB; 
use Barryvdh\DomPDF\Facade as PDF;


class SalesController extends Controller
{    
   
   


    public function monthlistproduct(Request $request){

        $month = $request->get('month');
    
      echo($month);
          $product = Product::all();
      
     return view('admin/Reports/salesreport',['product'=>$product],['month'=>$month]);
     
    }



    public  function pdfshow($month){
        $month= $month;
        $product = Product::all();
         //echo("ok");
        $pdf = PDF::loadView('admin/Reports/salesreport',['product'=>$product],['month'=>$month]);
        return $pdf->download('salesreport.pdf');
        }


    public function listsoldproduct(){
         
        
        $product = Product::all();
        return view('admin/Reports.soldproduct',['product'=>$product]);
            
      
      

    }

    public  function pdfinventry(){
        $product = Product::all();

        $pdf = PDF::loadView('admin/Reports.soldproduct',['product'=>$product]);
        return $pdf->download('Inventoryreport.pdf');
        }

    
}
