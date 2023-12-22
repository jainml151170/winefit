<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'machine_id',
        'order_ammount',
        'purchased_by',
        'order_created_by'
    ];

    /**
     * Define the relationship with WineMachine model.
     */
    public function winemachine()
    {
        return $this->belongsTo(WineMachine::class, 'machine_id', 'id');
    }

    /**
     * Define the relationship with User model.
     */
    public function userCreatedBy()
    {
        return $this->belongsTo(User::class, 'order_created_by', 'id');
    }
    /**
     * Define the relationship with User model.
     */
    public function userPurchasedBy()
    {
        return $this->belongsTo(User::class, 'purchased_by', 'id');
    }

    /**
     * Define the relationship with Susbcription model.
     */
    public function orderSusbcription()
    {
        return $this->hasMany(Order::class, 'order_id', 'id');
    }
}
