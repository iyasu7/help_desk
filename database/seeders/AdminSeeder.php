<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin user',
            'email' => 'admin@tahses.com',
            'email_verified_at' => now(),
            'password' => Hash::make('tahses@22'),
        ])->assignRole('admin');
        User::create([
            'name' => 'techExpert user',
            'email' => 'techExpert@tahses.com',
            'email_verified_at' => now(),
            'password' => Hash::make('tahses@22'),
        ])->assignRole('techExpert');
        User::create([
            'name' => 'agent user',
            'email' => 'agent@tahses.com',
            'email_verified_at' => now(),
            'password' => Hash::make('tahses@22'),
        ])->assignRole('agent');
    }
}
