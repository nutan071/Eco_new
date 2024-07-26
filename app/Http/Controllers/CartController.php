<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Products;
use App\Models\Order;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $product = Products::find($productId);

        $cart = session()->get('cart', []);

        if(isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image_url" => $product->image_url
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart');
        return view('cart.index', compact('cart'));
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return response()->json(['success' => true]);
        }
    }

    public function removeFromCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully!');
        }
    }

    public function checkout(Request $request)
    {
        // Store order details in the database
        // Clear the cart session
        session()->forget('cart');
        return redirect()->route('user.dashboard')->with('success', 'Order placed successfully!');
    }
}
