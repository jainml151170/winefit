<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionType extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subscription_type',
        'subscription_price'
    ];

    /**
     * Define the relationship with Subscription model.
     */
    public function susbcriptionSusbcriptionTypeId()
    {
        return $this->hasMany(SubscriptionType::class, 'subscription_type_id', 'id');
    }
}
