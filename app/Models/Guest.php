<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'guest_name',
        'guest_phone',
        'guest_room_no',
        'card_id',
        'card_type',
        'card_balance',
        'card_status'
    ];
}
