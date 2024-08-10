<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Wishlist;
use \App\Models\Rating;



class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'quantity', 'image_url',
    ];


     public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->attributes['image_url']);
    }


    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function hasBeenRatedBy($userId)
    {
        return $this->rating()->where('user_id', $userId)->exists();
    }



    public function OrderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
}



