<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'subscription_type_id',
        'subscription_amount',
        'subscription_status',
        'subscription_start_date',
        'subscription_end_date',
        'subscription_created_by'
    ];

    /**
     * Define the relationship with Order model.
     */
    public function susbcriptionOrderId()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    /**
     * Define the relationship with SubscriptionType model.
     */
    public function susbcriptionTypeSusbcription()
    {
        return $this->belongsTo(SubscriptionType::class, 'subscription_type_id', 'id');
    }

    /**
     * Define the relationship with User model.
     */
    public function susbcriptionCreatedBy()
    {
        return $this->belongsTo(User::class, 'subscription_created_by', 'id');
    }
}
