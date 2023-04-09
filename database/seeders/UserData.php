<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert(
            [
                'name' => 'MD.Ilias Ahomed',
                'fname' => 'Ilias',
                'lname' => 'Ahomed',
                'email' => 'admin@gmail.com',
                'phone' => '01304591910',
                'role' => 'admin',
                'status' =>'active',
                'password' => Hash::make("123456789"),

            ],
            [
                'name' => 'MD.raju Ahomed',
                'fname' => 'raju',
                'lname' => 'Ahomed',
                'email' => 'vendor@gmail.com',
                'phone' => '01404591910',
                'role' => 'vendor',
                'status' =>'active',
                'password' => Hash::make("123456789"),

            ],
            [
                'name' => 'MD.Kamal hasan',
                'fname' => 'kamal',
                'lname' => 'hasan',
                'email' => 'user@gmail.com',
                'phone' => '01304591910',
                'role' => 'user',
                'status' =>'active',
                'password' => Hash::make("123456789"),

            ],
        );
    }
}
