<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    use HasFactory;

    protected $table="wines";

    protected $fillable=[
        'user_id',
        'machine_id',
        'wine_name',
        'wine_winery',
        'wine_tipologia',
        'wine_graps',
        'wine_region',
        'wine_country',
        'wine_image',
        'wine_alcohol',
        'wine_year',
        'wine_description',
        'wine_price_low',
        'wine_price_mid',
        'wine_price_full',
        'wine_level_low',
        'wine_level_mid',
        'wine_level_full',
        'wine_temperature_service',
        'wine_temperature_tolerance',
        'wine_value_bottle',
        'wine_value_tolerance',
        'wine_value_correction',
        'wine_days_opened',
    ];

    public function wineMachine()
    {
        return $this->hasMany(WineMachine::class, 'machine_id', 'id');
    }

    public function wineOrder()
    {
        return $this->hasMany(WineOrder::class, 'id', 'wine_id');
    }
}
