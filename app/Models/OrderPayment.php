<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{

    protected $fillable = [
         'order_id',
        'user_id',
        'stripe_id',
        'amount',
        'currency',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
