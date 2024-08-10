<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\Rating;
use App\Models\OrderItem;
use App\Models\Admin\Prodcuts;


class OrderController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->with('items')->get();

        return view('profile.orders', compact('orders'));
    }

    public function OrderData()
    {
        if (request()->ajax()) {
            $data = Products::select('id', 'name', 'description', 'price', 'quantity', 'image_url')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>
                                <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Admin.products.table');
    }

    public function show($order_id )
    {

        $findorder = Order::with('items.product')->findOrFail($order_id);
        $order =(new order)->getOrderInfo($order_id);

        // echo "<pre>";print_r($order);die;

        // if (!$order) {
        //     abort(404, 'Order not found');
        // }


        return view('order.show', compact('order','findorder'));


    }

    public function store(Request $request)
    {




        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->total_price = $request->total_price;
        $order->status = 'pending';
        $order->payment_method = $request->payment_method;
        $order->save();



        return redirect()->route('order.show', $order->id)->with('success', 'Order placed successfully.');
    }






    public function storeRating(Request $request)
{
    $request->validate([
        'product_id' => 'required|integer|exists:products,id',
        'order_id' => 'required|integer|exists:order,id',
        'rating' => 'required|integer|between:1,5',
        'comment' => 'nullable|string|max:255',
    ]);


    $existingRating = Rating::where('user_id', auth()->id())
        ->where('product_id', $request->product_id)
        ->where('order_id', $request->order_id)
        ->first();

    if ($existingRating) {
        return redirect()->back()->withErrors('You have already rated this product.');
    }


    Rating::create([
        'user_id' => auth()->id(),
        'product_id' => $request->product_id,
        'order_id' => $request->order_id,
        'rating' => $request->rating,
        'comment' => $request->comment,
    ]);

    return redirect()->back()->with('success', 'Rating submitted successfully.');
}

        // public function rate(Request $request, $id)
        // {
        //     $request->validate([
        //         'rating' => 'required|integer|between:1,5',
        //         'comment' => 'required|string|max:255',
        //     ]);

        //     $order = order::findOrFail($id);


        //     $orderItem = $order->items->first();
        //     if (!$orderItem) {
        //         return redirect()->route('profile.order_details', $id)->withErrors('No products found in this order.');
        //     }
        //     $product_id = $orderItem->product_id;
        //     Rating::create([
        //         'user_id' => auth()->id(),
        //         'product_id' => $product_id,
        //         'rating' => $request->rating,
        //         'comment' => $request->comment,
        //     ]);


        //     return redirect()->route('profile.order_details', $id)->with('success', 'Rating submitted successfully.');
        // }





}


