<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_type',
        'role_created_by'
    ];

    /**
     * Define the relationship with User model.
     */
    public function userRoleId()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }

    /**
     * Define the relationship with User model.
     */
    public function roleCreatedBy()
    {
        return $this->belongsTo(User::class, 'role_created_by', 'id');
    }

    public static function getRole()
    {
        // $roles = self::all();
        // return $roles;
        return self::all();
    }
}
