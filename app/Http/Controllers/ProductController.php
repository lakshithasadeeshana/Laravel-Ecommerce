<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Product;
use App\Supplier;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }


    public function list()
    {
       $product = Product::all();
      
     
      

      return view('admin/products/manageproduct',['product'=>$product]);
      //echo($product);
      //$supplier = Supplier::all();
      //echo($supplier);

    }

    public function datatoproduct()
    {

        $supplier = Supplier::pluck('name','id');
        $category = Category::pluck('title','id');
        return view('admin/products/create',['category'=>$category],['supplier'=>$supplier]);
       

    }


    public function producttoshop(){

        $product = Product::all();
      
         return view('shop',['product'=>$product]);
        //echo($product);
    }

    public function detailpro($id){
     
       $product = DB::table('products')->where('id',$id)->get();
       return view('product_detail',['product'=>$product]);
      
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //$supplier = Supplier::pluck('name','id');
        //return view('admin/products/create',['supplier'=>$supplier]);
        //echo($supplier);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
          //save image local
        $image = $request->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            
        }

        $data=[$request->get('pro_info'), $request->get('pro_volt'), $request->get('pro_power'), $request->get('pro_res'), $request->get('pro_cap')] ;
            
        //load data to model
        $product = new Product([

        'pro_name' => $request->get('pro_name'),
        'pro_price' => $request->get('pro_price'),
       'pro_saleprice' => $request->get('pro_saleprice'),
        'pro_qty' => $request->get('pro_qty'),
        'pro_info' =>implode(',' ,$data),
        'supplier_id' => $request->get('supplier_id'),
        'category_id' => $request->get('category_id'),
        'image'=>$imageName
        ]);

        
        //$product->image = $imageName;;
        
       // dd($product);

       
           
        
        
           
       
           //dd($product);
        $product->save();
         return redirect('admin/products/manageproduct')->with('success', 'Contact saved!');
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
        $product = Product::find($id);

       return view('admin/products/editproduct',['product'=>$product]);

       
        
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
        $request->validate([
            'pro_name'=>'required',
            'pro_price'=>'required',
            'pro_saleprice'=>'required',
            'pro_qty'=>'required'
        ]);

        $existingproduct = DB::table('products')->where('id',$id)->pluck('pro_qty')->sum();

         echo($existingproduct);
         
         
         //$available= 100;

         $product = Product::find($id);
         $product->pro_name =  $request->get('pro_name');
         $product->pro_price = $request->get('pro_price');
         $product->pro_saleprice = $request->get('pro_saleprice');
         $product->pro_qty = ($request->get('pro_qty')+$existingproduct);
      
         $product->save();
 
         return redirect('admin/products/manageproduct')->with('success', 'Product Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $product = Product::find($id);
        $product->delete();

        return redirect('admin/products/manageproduct')->with('success', 'Contact deleted!');
    }

    public function searchproduct(Request $request){
        $search = $request->get('search');

        $product =DB::table('products')->where('pro_name','like','%'.$search.'%')->get();
         //echo($product);
        return view('admin/products/manageproduct',['product'=>$product]);

    }

    public function searchhomepage(Request $request){
       $search = $request->get('search');
       
       $product = DB::table('products')->where('pro_name','like','%'.$search.'%')->get();
       return view('shop',['product'=>$product]);
    }
}
