<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Userlist;
use Illuminate\Support\Facades\Hash;

class UserlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Userlist::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'number' => '1234567890',
            'password' => Hash::make('password'),
            'role_id' => 1, // Admin role
        ]);
    }
}
