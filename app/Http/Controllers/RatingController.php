<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string',
        ]);

        $user = Auth::user();

        Rating::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Rating submitted successfully.');
    }
}

