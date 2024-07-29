<?php
namespace App\Http\Controllers;

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

        order::create([
            'user_id' => $user->id,
            'total_price' => $total,
            'status' => 'Pending',
            'payment_method' => $paymentMethod,
        ]);

      
        $request->session()->forget('cart');

        return redirect()->route('order.success')->with('success', 'Order placed successfully!');
    }

    public function success()
    {
        return view('order.success');
    }
}