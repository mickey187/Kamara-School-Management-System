<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'subject_name' => 'Gada',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'Chemistry',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'English',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'Amharic',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'Afan Oromoo',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'Mathmatics',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        //
    }
}
