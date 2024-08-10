<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Products;
use App\Models\order;


class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'price', 'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }


    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }










    public function rating()
    {
        return $this->hasOne(Rating::class, 'product_id', 'product_id')->where('user_id', auth()->id());
    }
}











