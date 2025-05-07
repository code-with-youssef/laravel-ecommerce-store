<?php

namespace App\Http\Controllers;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    // Creating a new review for a specific product by a specific user.
    public function store(Request $request){
        $product_id=$request->input('product_id');
        $user_id=$request->input('user_id');
        $comment=$request->input('comment'); // Text comment.
        $stars=$request->input('rating'); // Stars one out of 5.


        Review::create([
            'product_id'=>$product_id,
            'user_id'=>$user_id,
            'comment'=>$comment,
            'stars'=>$stars,
        ]);

        return redirect()->back(); // Returning back to the page.



    }
}
