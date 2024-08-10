<?php
namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\order;

class CheckoutController extends Controller
{
    public function show()
    {

        return view('checkout-method');
    }



    public function create(Request $request)
    {
        $user = Auth::user();
        $total = $request->input('total_price');
        $paymentMethod = $request->input('payment_method');

        $order = order::create([
            'user_id' => $user->id,
            'total_price' => $total,
            'status' => 'Pending',
            'payment_method' => $paymentMethod,
        ]);

        $cart = session()->get('cart');

        // echo "<pre>";print_r($cart);die;

        foreach ($cart as $item) {

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['productId'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->status = 'Pending';
            $orderItem->save();
        }



//            echo "<pre>";print_r($order);die;




        $request->session()->forget('cart');

        return redirect()->route('order.success')->with('success', 'Order placed successfully!');
    }

    public function success()
    {
        return view('order.success');
    }
}
