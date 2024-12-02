<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'email', 'password', 'phone', 'address', 'age', 'gender'];

    // A customer can have many orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // A customer can have many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // A customer can have many testimonials
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    // A customer can have many wishlists
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    // A customer can send many messages
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
