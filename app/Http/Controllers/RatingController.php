<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Admin\Products;

use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string',
        ]);
    
        Rating::create([
            'product_id' => $request->product_id,
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);
    
        return redirect()->back()->with('success', 'Rating submitted successfully!');
    }


       
}
    




