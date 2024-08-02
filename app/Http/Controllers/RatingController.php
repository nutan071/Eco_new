<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Products;

use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{


        public function store(Request $request)
        {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'nullable|string|max:255',
            ]);
    
            if (Rating::where('user_id', auth()->id())->where('product_id', $request->product_id)->exists()) {
                return back()->with('error', 'You have already rated this product.');
            }
        

            Rating::create([
                'product_id' => $request->product_id,
                // 'order_id' => $request->order_id,
                'user_id' => auth()->id(),
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]);
    
            return back()->with('success', 'Thank you for your feedback!');
        }


       
}
    




