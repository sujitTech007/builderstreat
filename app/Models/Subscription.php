<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'plan_id',
        'plan_name', 
        'price', 
        'plan_description',
        'plan_features',
        'plan_icon',
        'plan_icon_color',
        'plan_is_active',
        'plan_sort_order',
        'billing_period',
        'start_date', 
        'end_date', 
        'is_active', 
        'payment_status', 
        'stripe_id',
        'commission',
        'total_amount',
        'commission_amount',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean'
    ];

    /**
     * Get the user that owns the subscription
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the plan for this subscription
     */
    public function plan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'plan_id');
    }
}
