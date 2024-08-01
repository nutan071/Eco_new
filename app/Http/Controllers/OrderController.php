<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\Rating;

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
        $order = Order::with(['items.product', 'items.rating'])->findOrFail($id);

        return view('profile.order_details', compact('order'));
    }
    
 
}