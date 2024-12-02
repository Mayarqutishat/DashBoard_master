<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['customer_id', 'name', 'description', 'price', 'stock_quantity', 'category_id', 'image_url'];

    // A product belongs to a customer (the one who created it)
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // A product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // A product can have many testimonials
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    // A product can be in many wishlists
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    // A product can be in many orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
