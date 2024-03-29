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
            'subject_name' => 'English',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'Mathmatics',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('subjects')->insert([
            'subject_name' => 'Maths in English',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('subjects')->insert([
            'subject_name' => 'Biology',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'Chemistry',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'Physics',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'Social Studies',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'Gada',
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
            'subject_name' => 'Language Art',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'Spoken English',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'IT',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'HPE',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'Aesthetics',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'Art',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'Music',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'Integrated Science',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'General Science',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'Hand Writing',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'Env/Science',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
















        //
    }
}
