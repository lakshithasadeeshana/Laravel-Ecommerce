<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Requests;

class RequestController extends Controller
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

    public function requestlist()
    {   
        $user_id=Auth::user()->id;

        $requests = DB::table('requests')->where('user_id',$user_id)->get();
        return view('user/request/viewrequest',['requests'=>$requests]);
        //echo($requests );
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
        $user_id=Auth::user()->id;

        $requests = new Requests([

            'req_proname' => $request->get('req_proname'),
            'req_qty' => $request->get('req_qty'),
            'req_prospec' => $request->get('req_prospec'),
            'user_id'=>$user_id,
            'status'=>'pending'

            ]);
    
            //dd($request);
            $requests->save();
         return redirect('user/viewrequest')->with('success', 'Request saved!');
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
        $requests = Requests::find($id);
        //  return view('admin/suppliers/editsuppliers', compact('supplier')); 
          return view('user/request/editrequest',['requests'=>$requests]);
         //echo($requests);
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
      
        $requests = Requests::find($id);;
        $requests->req_proname =  $request->get('req_proname');
        $requests->req_qty = $request->get('req_qty');
        $requests->req_prospec = $request->get('req_prospec');
       
     
        $requests->save();

        return redirect('user/viewrequest')->with('success', 'Request Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requests = Requests::find($id);
        $requests->delete();

        return redirect('user/viewrequest')->with('success', 'Request deleted!');
    }

    public function adminrequestlist(){
        

        $requests = DB::table('requests')
        
        ->get();

        //echo($requests);
        return view('admin/Request/viewrequest',['requests'=>$requests]);
    }


    public function editstatus($id){
        
        $requests = Requests::find($id);
        
        return view('admin/Request/editstatus',['requests'=>$requests]);
         //echo($requests);
    }

    public function updatestatus(Request $request, $id)
    {
      
        $requests = Requests::find($id);;
        $requests->status =  $request->get('status');
        
       //echo($requests);
     
        $requests->save();

        return redirect('admin/requests')->with('success', 'Request Status Updated!');
    }
}
