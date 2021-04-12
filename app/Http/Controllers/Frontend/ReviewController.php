<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Review;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function addReview(Request $request){
        $request->validate([
            'star' => 'required',
            'review' => 'required'
        ]);
        $review = new Review();
        $review->user_id = Auth::user()->id;
        $review->car_id = $request->car_id;
        $review->review = $request->review;
        $review->star = $request->star;
        $review->save();
        Toastr::success("New Review Added","Form Success");
        return redirect()->back();
    }
}
