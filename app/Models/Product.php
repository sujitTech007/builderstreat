<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'brand_name',
        'model_number',
        'serial_number',
        'source',
        'condition',
        'discount',
        'offer',
        'pickup_facility',
        'hours_of_operations',
        'availability',
        'price',
        'negotiable',
        'providing_transport',
        'transport_cost',
        'image',
        'seller_id',
        'category_id',
        'status',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function seller()
    {
        return $this->belongsTo(\App\Models\User::class, 'seller_id');
    }
}
