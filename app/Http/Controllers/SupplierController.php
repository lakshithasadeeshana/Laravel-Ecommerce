<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;


class SupplierController extends Controller
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
       $data = Supplier::all();
        return view('admin/suppliers/managesuppliers',['data'=>$data]);
        //echo($data);
    }


// this is for add suppliers to product form
    public function dataproduct()
    {
      $data = Supplier::all();
      
      return view('admin/products/create',['data'=>$data]);
       
      // echo($category);
      //echo("Suppliers are coming");
      
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/suppliers/createsuppliers');
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
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required'
        ]);

        $supplier = new Supplier([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone')
           
        ]);
        $supplier->save();
        return redirect('/admin/suppliers/managesuppliers')->with('success', 'Contact saved!');
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
        $supplier = Supplier::find($id);
      //  return view('admin/suppliers/editsuppliers', compact('supplier')); 
        return view('admin/suppliers/editsuppliers',['supplier'=>$supplier]);
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
        

        $supplier = Supplier::find($id);
        $supplier->name =  $request->get('name');
        $supplier->address = $request->get('address');
        $supplier->email = $request->get('email');
        $supplier->phone = $request->get('phone');
     
        $supplier->save();

        return redirect('/admin/suppliers/managesuppliers')->with('success', 'Supplier updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect('/admin/suppliers/managesuppliers')->with('success', 'Contact deleted!');
    }



    
}
