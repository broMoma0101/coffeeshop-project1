<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@coffeebreak.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123')
            ]
        );

        User::updateOrCreate(
            ['email' => 'kasir@coffeebreak.com'],
            [
                'name' => 'Staff Kasir',
                'password' => Hash::make('kasir123')
            ]
        );

        $this->call([
            MenuSeeder::class,
            PesananSeeder::class, 
        ]);
    }
}