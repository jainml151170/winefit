<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Role::create([
        //     'role_type' => 'supperadmin',
        //     'role_created_by' => 1,
        // ]);
        \App\Models\Role::create([
            'role_type' => 'destributer',
            'role_created_by' => 1,
        ]);
        \App\Models\Role::create([
            'role_type' => 'winemachineholder',
            'role_created_by' => 1,
        ]);
    }
}