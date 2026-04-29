<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::updateOrCreate(
            
                ['email' => 'admin@gmail.com'],
                ['name' => 'Admin',
                'password' => Hash::make('admin@123'),
                'role' => 'admin',
                ]
            

        );

        User::updateOrCreate(
            
                ['email' => 'topmanager@gmail.com'],
                ['name' => 'Top Manager',
                'password' => Hash::make('topmanager@123'),
                'role' => 'top_manager',
                ]
        );
    }
}
