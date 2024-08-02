<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;


    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'price', 'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function rating()
    {
        return $this->hasOne(Rating::class, 'product_id', 'product_id')->where('user_id', auth()->id());
    }
}











