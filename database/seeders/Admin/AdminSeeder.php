<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin\Admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'remember_token' => Str::random(60),
            'password' => Hash::make('12345678'),
        ]);
    }
}
