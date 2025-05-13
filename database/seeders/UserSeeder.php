<?php
// database/seeders/UserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name'     => 'Super Admin',
            'email'    => 'palgooal@gmail.com',
            'password' => bcrypt('12345678'), 
        ]);

    }
}
