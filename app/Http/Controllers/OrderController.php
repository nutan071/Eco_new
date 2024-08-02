<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\Rating;
use App\Models\Prodcuts;


class OrderController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->with('items')->get(); 

        return view('profile.orders', compact('orders'));
    }

 
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('order.show', compact('order'));
    }


    // public function showOrders()
    // {
    //     $orders = Auth::user()->orders; 

        
    //     $product_id = request()->get('product_id'); 

    //     return view('profile.orders', compact('orders', 'product_id'));
    // }

    // public function rate(Request $request, $id)
    // {
    //     $request->validate([
    //         'rating' => 'required|integer|between:1,5',
    //         'comment' => 'required|string|max:255',
    //     ]);

    //     $order = Order::findOrFail($id);

    //     // $product_id = $order->items->first()->product_id ?? null;

    //     $product_id = $order->product_id;
    //     // logger('Product ID:', ['product_id' => $product_id]);
    //     // dd($product_id);
       

      
        
    //     $rating = new Rating();
    //     $rating->user_id = auth()->id();
    //     $rating->product_id = $product_id; 
    //     $rating->rating = $request->rating;
    //     $rating->comment = $request->comment;
    //     $rating->save();


    //     return redirect()->route('profile.order_details', $id)->with('success', 'Rating submitted successfully.');
    // }

       

        public function rate(Request $request, $id)
        {
            $request->validate([
                'rating' => 'required|integer|between:1,5',
                'comment' => 'required|string|max:255',
            ]);

            $order = Order::findOrFail($id);

        
            $orderItem = $order->items->first();
            if (!$orderItem) {
                return redirect()->route('profile.order_details', $id)->withErrors('No products found in this order.');
            }
            $product_id = $orderItem->product_id;

            $rating = new Rating();
            $rating->user_id = auth()->id();
            $rating->product_id = $product_id;
            $rating->rating = $request->rating;
            $rating->comment = $request->comment;
            $rating->save();

            return redirect()->route('profile.order_details', $id)->with('success', 'Rating submitted successfully.');
        }

       

        
}
       

   
