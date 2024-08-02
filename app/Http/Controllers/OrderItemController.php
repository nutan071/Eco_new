<?php

namespace App\Http\Controllers;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function updateStatus(Request $request)
    {
        $request->validate([
            'order_item_id' => 'required|exists:order_items,id',
            'status' => 'required|string'
        ]);

        $orderItem = OrderItem::findOrFail($request->order_item_id);
        $orderItem->status = $request->status;
        $orderItem->save();

        return back()->with('success', 'Order item status updated successfully.');
    }
}





