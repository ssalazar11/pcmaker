<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin1234567'),
            'address' => 'Calle 23',
            'balance' => 5000,
            'phoneNumber' => '311444123',
            'role' => 'admin'
        ]);
    }
}
