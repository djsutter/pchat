<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'D',
            'email' => 'd@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('dpass'),
        ]);
        User::create([
            'name' => 'T',
            'email' => 't@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('tpass'),
        ]);
    }
}
