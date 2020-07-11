<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function showcart(){
     $cartItems = Cart::content();
     return view('cart',['cartItems'=>$cartItems]);
     

    }

    public function addItem($id){
         $product = Product::findOrFail($id);
         Cart::add($id,$product->pro_name,1,$product->pro_price,['img'=>$product->image,'stock'=>$product->pro_qty]);
          return back();
        //echo("add");
    }

    public function update(Request $request, $id){
          $qty = $request->qty;
          $proID = $request->proId;
          //$product = Product::findOrFail($proID);
          $product = DB::table('products')->where('id',$proID)->pluck('pro_qty')->sum();

          $soldproduct=DB::table('order_product')->where('product_id',$proID)->get()->sum('qty');
          $stock =$product-$soldproduct;

          if($qty<=$stock){
              Cart::update($id,$request->qty);
              return back()->with('status','Cart is Updated');
          }else{
              return back()->with('status','Your Qty is more than Product Stock');
          }

    }


    public function destroy($id){
        Cart::remove($id);
        return back();

    }
}
