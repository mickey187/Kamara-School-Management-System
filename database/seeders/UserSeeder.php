<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'id' => 1,
            'name'=> 'admin',
            'email' => 'admin@gmail.com',
            'user_id' => '1234',
            'email_verified_at' => Carbon::now(),
            'password' => '$2y$10$/N6ZyRhgDjAetwcx/.o8YOjZ39H7I4QOHSxsGBb9q8RLbe0b390o6', //the password is admin1234
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name'=> 'finance',
            'email' => 'finance@gmail.com',
            'user_id' => '5678',
            'email_verified_at' => Carbon::now(),
            'password' => '$2y$10$eIzKPnlqejxwbuIdAQStMuExmyqR0mWb3mw9RRJbdPPVCClAS7R3C', //the password is finance1234
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'id' => 4,
            'name'=> 'teacher',
            'email' => 'teacher@gmail.com',
            'user_id' => '6754',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make("teacher1234"), //the password is teacher1234
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
