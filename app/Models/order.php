<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Products;

class order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'user_id', 'total_price', 'status', 'payment_method',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function items()
    {
        return $this->hasMany(OrderItem::class,'order_id');
    }

    public function rating()
    {
        return $this->hasManyThrough(Rating::class, OrderItem::class, 'order_id', 'product_id');
    }

    public function products()
    {
        return $this->hasManyThrough(Products::class, OrderItem::class, 'order_id', 'id', 'id', 'product_id');
    }


    public function getOrderInfo($orderId)

    {
        // $order = DB::table('order')
        // ->join('order_items', 'order.id', '=', 'order_items.order_id')
        // ->join('products', 'products.id', '=', 'order_items.product_id')
        // ->select('order_items.*', 'products.*', 'order.*')
        // ->where('order.id', $orderId)
        // ->get();


        $order = DB::table('order_items')
        // ->join('order_items', 'order.id', '=', 'order_items.order_id')
        ->join('products', 'products.id', '=', 'order_items.product_id')
        ->select('order_items.*', 'products.*')
        ->where('order_items.order_id', $orderId)
        ->get();

        return $order;
        // echo '<pre>';
        // print_r($order);die();
    }

    // return DB::table('order')
    // ->join('order_items', 'order.id', '=', 'order_items.order_id')
    // ->join('products', 'order_items.product_id', '=', 'products.id')
    // ->select('order.*', 'order_items.*', 'products.name as product_name', 'products.price as product_price')
    // ->where('order.id', $orderId)
    // ->get();
}

