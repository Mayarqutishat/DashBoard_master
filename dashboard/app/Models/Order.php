<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['customer_id', 'product_id', 'total_price', 'quantity', 'price', 'status'];

    // An order belongs to a customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // An order belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}


