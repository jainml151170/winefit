<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountDetail extends Model
{
    use HasFactory;

    protected $table = "account_details";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'account_holder_name',
        'account_number',
        'country_code'
    ];

    /**
     * Define the relationship with User model.
     */
    public function userAccountDetail()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
