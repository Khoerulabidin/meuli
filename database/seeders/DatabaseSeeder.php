<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'user_mstr_name' => 'Abidin',
            'user_mstr_email' => 'abidin@meuli.com',
            'email_verified_at' => now(),
            'user_mstr_password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'user_mstr_status' => 1,
            'user_mstr_branch' => '1',
        ]);

        User::create([
            'user_mstr_name' => 'Riqi',
            'user_mstr_email' => 'riqi@meuli.com',
            'email_verified_at' => now(),
            'user_mstr_password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'user_mstr_status' => 1,
            'user_mstr_branch' => '1',
        ]);

        User::create([
            'user_mstr_name' => 'Yanuarso',
            'user_mstr_email' => 'yan@meuli.com',
            'email_verified_at' => now(),
            'user_mstr_password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'user_mstr_status' => 1,
            'user_mstr_branch' => '1',
        ]);
    }
}
