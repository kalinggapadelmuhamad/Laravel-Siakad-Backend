<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(200)->create();
        User::create([
            'name' => 'Kalingga Padel M',
            'email' => 'enginerbros@gmail.com',
            'roles' => 'mahasiswa',
            'phone' => '082175572310',
            'address' => 'Address User',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
    }
}
