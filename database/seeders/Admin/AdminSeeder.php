<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Admin\Admin;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'admin_phone'=> '7788445566',
            'remember_token' => Str::random(60),
            'password' => Hash::make('12345678'),
        ]);

        User ::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'user_phone'=> '7788445566',
            'status' => 0,
            'role_id' => 0,
            'created_by' =>0,
            'remember_token' => Str::random(60),
            'password' => Hash::make('12345678'),
        ]);
    }
}
