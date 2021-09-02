<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssasmenetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('assasment_types')->insert([
            'assasment_type' => 'Test_1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('assasment_types')->insert([
            'assasment_type' => 'Test_2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('assasment_types')->insert([
            'assasment_type' => 'Quiz',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('assasment_types')->insert([
            'assasment_type' => 'Home_Work',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('assasment_types')->insert([
            'assasment_type' => 'Class_Work',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('assasment_types')->insert([
            'assasment_type' => 'Assignment',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('assasment_types')->insert([
            'assasment_type' => 'Worksheet_1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('assasment_types')->insert([
            'assasment_type' => 'Worksheet_2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('assasment_types')->insert([
            'assasment_type' => 'Model',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('assasment_types')->insert([
            'assasment_type' => 'Final',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
