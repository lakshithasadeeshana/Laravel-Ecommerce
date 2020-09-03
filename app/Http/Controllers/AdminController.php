<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{    

    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }




    public function index()
    {
        return view('admin.index');
    }
    public function update(Request $request, $id)
    {
        $image = $request->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            
            
        }
       


         $user = User::find($id);
         $user->image =  $request->get('image');
    
      
         $image->save();
 //echo("Done");
         //return redirect('admin/products/manageproduct')->with('success', 'Product Updated!');
    }

    public function customerlist(){
        $userdata = DB::table('users')->get();

        $customerchart = DB::table('users')
           ->groupBy('MONTH')->get([
          DB::raw('MONTHNAME(created_at) as month'),
          DB::raw('COUNT(id) as customercount')
      ]);


        //echo($userdata);
        return view('admin/customers',['userdata'=>$userdata],['customerchart'=>$customerchart]);

    }
}
