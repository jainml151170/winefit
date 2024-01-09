<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_phone',
        'role_id',
        'status',
        'created_by'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Define the relationship with Role model.
     */
    public function roleUser()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function userCreatedBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * Define the relationship with AccountDetail model.
     */
    public function accountDetailUser()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    /**
     * Define the relationship with Role model.
     */
    public function roleCreatedBy()
    {
        return $this->hasMany(User::class, 'role_created_by', 'id');
    }

    /**
     * Define the relationship with Order model.
     */
    public function orderCreatedBy()
    {
        return $this->hasMany(User::class, 'order_created_by', 'id');
    }

    /**
     * Define the relationship with Order model.
     */
    public function orderPurchasedBy()
    {
        return $this->hasMany(User::class, 'purchased_by', 'id');
    }

    /**
     * Define the relationship with Subscription model.
     */
    public function subscriptionCreatedBy()
    {
        return $this->hasMany(User::class, 'subscription_created_by', 'id');
    }
}
