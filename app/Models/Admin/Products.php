<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Wishlist;

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

}

