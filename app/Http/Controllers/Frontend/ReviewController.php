<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Order;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toreview = Order::where('user_id', auth()->user()->id)->where('status', 'Delivered')->get();
        $myreviews = Review::where('user_id', auth()->user()->id)->get();

        return view('home.review.index')->with('toreview', $toreview)->with('myreviews', $myreviews);
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

        $request->validate([
            'product_id' => 'required',
            'description' => 'required',
            'rating' => 'required',
        ]);
        $check_exists = Review::where('user_id', auth()->user()->id)->where('product_id', $request->product_id)->count();

        if ($check_exists > 1) {
            return redirect()->route('review.index')
                ->with('error', 'Already Rated.');
        }
        $review = new Review;
        $review->rating = $request->rating;
        $review->product_id = $request->product_id;
        $review->user_id = auth()->user()->id;
        $review->description = $request->description;
        $review->save();
        return redirect()->route('review.index')
            ->with('success', 'Rated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
