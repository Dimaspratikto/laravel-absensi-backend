<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Dimas Admin',
            'email' => 'dimas@fic16.com',
            'password' => Hash::make('12345678'),
        ]);

        //data dummy for company
        \App\Models\Company::create([
            'name' => 'PT. ABC',
            'email' => 'fic16@code.com',
            'address' => 'Jl. Setro 2 NO. 2 Surabaya, Jatim',
            'latitude' => '-7.726390',
            'longitude' => '110.23923',
            'radius_km' => '0.5',
            'time_in' => '08:00',
            'time_out' => '17:00',
        ]);
    }
}
