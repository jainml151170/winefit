<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WineOrder extends Model
{
    use HasFactory;

    protected $table = "wine_orders";


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'machine_sn',
        'wine_id',
        'card_id',
        'dose',
        'price',
        'wine_order_status',
        'comments',
    ];

    public function wine()
    {
        return $this->belongsTo(Wine::class);
    }
}
