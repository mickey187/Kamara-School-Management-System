<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('role_user')->insert([
        //     'user_id' => 1,
        //     'role_id' => 1,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

        // DB::table('role_user')->insert([
        //     'user_id' => 2,
        //     'role_id' => 2,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

        DB::table('role_user')->insert([
            'user_id' => 4,
            'role_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
