<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert(['name' => 'Maria Raw', 'email' => 'm.raw@gmail.com', 'password' => Hash::make('password'), 'role_id' => 2]);
        DB::table('users')->insert(['name' => 'John Bigher', 'email' => 'j.bigher@outlook.com', 'password' => Hash::make('pass1234'), 'role_id' => 1]);
        DB::table('users')->insert(['name' => 'Jasmine Green', 'email' => 'h.green@outlook.com', 'password' => Hash::make('pass1345'), 'role_id' => 2]);
        DB::table('users')->insert(['name' => 'Roxana Hasan', 'email' => 'r.hasan@gmail.com', 'password' => Hash::make('pass1567'), 'role_id' => 2]);

    }
}
