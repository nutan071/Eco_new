<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

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
        return $this->hasMany(OrderItem::class); 
    }

    public function rating()
    {
        return $this->hasManyThrough(Rating::class, OrderItem::class, 'order_id', 'product_id');
    }
}

