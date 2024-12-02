<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'email', 'message'];

    // A message is created by a customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
