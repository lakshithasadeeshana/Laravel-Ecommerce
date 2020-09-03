<?php

namespace App\Http\Controllers;

use App\ProductReview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ProductReview::create($request->all());

        $user_id=Auth::user()->id;

        $id = $request->get('product_id');

        $review = new ProductReview([

            'headline' => $request->get('headline'),
            'description' => $request->get('description'),
            'rating' => $request->get('rating'),
            'product_id'=>$request->get('product_id'),
            'user_id'=>$user_id,
        

            ]);
        //echo($review);
            //dd($request);
            $review->save();
         return redirect('/')->with('success', 'Review saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function show(ProductReview $productReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductReview $productReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductReview $productReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductReview $productReview)
    {
        //
    }

    public function userreview(){
        $currentuser_id = Auth::user()->id;

        $myreviews = ProductReview::where('user_id',$currentuser_id)->get();
        // echo($myreviews);
        return view('user.viewuserRating',['myreviews'=>$myreviews]);
    }
}
