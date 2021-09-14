<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(50)->create();
        //  \App\Models\Student::factory(1000)->create();
         \App\Models\Employee::factory(50)->create();
        // \App\Models\teacher::factory(50)->create();
        //  $this->call([
        // //     UserSeeder::class,
        //     //  RoleSeeder::class
        //     RoleUserSeeder::class
        // ]);
    }
}
