<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['customer_id', 'product_id', 'rating', 'comment', 'content'];

    // A testimonial belongs to a customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // A testimonial belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
