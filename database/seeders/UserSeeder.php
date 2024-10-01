<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Hashing\CustomCBCHasher; // Import your custom hasher

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Instantiate the custom hasher
        $customHasher = new CustomCBCHasher();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => $customHasher->make('password'), // Use custom hasher
            'role' => 1
        ]);
        User::create([
            'name' => 'User1',
            'email' => 'user@user.com',
            'password' => $customHasher->make('password'), // Use custom hasher
            'role' => 0
        ]);
        User::create([
            'name' => 'Kitchen',
            'email' => 'kitchen@kitchen.com',
            'password' => $customHasher->make('password'), // Use custom hasher
            'role' => 2
        ]);
        User::create([
            'name' => 'Delivery',
            'email' => 'delivery@delivery.com',
            'password' => $customHasher->make('password'), // Use custom hasher
            'role' => 3
        ]);
    }
}
