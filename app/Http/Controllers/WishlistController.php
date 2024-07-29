<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
// use App\Models\Admin\Products;  

class WishlistController extends Controller
{
    public function add(Request $request, $productId)
    {
        $user = Auth::user();
        
     
        $exists = Wishlist::where('user_id', $user->id)->where('product_id', $productId)->exists();
        
        if (!$exists) {
            
            Wishlist::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to wishlist.');
    }

    public function index()
    {
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)
                            ->with('product') 
                            ->get();

        return view('wishlist.index', compact('wishlist'));
    }
}
