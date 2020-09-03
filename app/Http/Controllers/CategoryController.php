<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
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


    public function list()
    {
       $category = Category::all();
      
      return view('admin/categories/managecategories',['category'=>$category]);
       //return view('admin/product/index',['category'=>$category]);
      // echo($category);
      
    }
  //this is for add category to product form
    
  public function showCates($id){
      
    $category_product = Product::where('category_id',$id)->get();
    $id_=$id;

   // return view('category_list_pro',compact('category_product',$id_));
   return view('category_list_pro',['category_product'=>$category_product]);
  //echo("ok");
}
 

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/categories/createcategories');
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
            'title'=>'required',
            
        ]);

        $category = new Category([
            'title' => $request->get('title')

        ]);
        $category->save();
        return redirect('/admin/categories/managecategories')->with('success', 'Category saved!');
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
        $category = Category::find($id);

        //echo($id);
        //  return view('admin/suppliers/editsuppliers', compact('supplier')); 
          return view('admin/categories/editcategories',['category'=>$category]);
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
            'title'=>'required'
            
        ]);

        $category = Category::find($id);
        $category->title =  $request->get('title');

        $category->save();

        return redirect('/admin/categories/managecategories')->with('success', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/admin/categories/managecategories')->with('success', 'Category deleted!');

    }
}
