<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WineMachine extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'machine_sn',
        'price'
    ];

    /**
     * Define the relationship with Order model.
     */
    public function order()
    {
        return $this->hasMany(Order::class, 'machine_id', 'id');
    }

    public function wine()
    {
        return $this->belongsTo(Wine::class);
    }
}
