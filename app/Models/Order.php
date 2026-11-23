<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'order_id',
        'user_id',
        'enquiry_id',
        'seller_id',
        'material_id',
        'quantity',
        'amount',
        'status',
        'payment_status',
    ];
   

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
    public function payment()
    {
        return $this->hasOne(OrderPayment::class);
    }
    
    public function product()
{
    return $this->belongsTo(Product::class, 'product_id');
}

    
}
