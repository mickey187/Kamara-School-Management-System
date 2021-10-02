<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTraitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_traits')->insert([
            'traits_name' => 'Reading',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('student_traits')->insert([
            'traits_name' => 'Hand Writing',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('student_traits')->insert([
            'traits_name' => 'Comperhension',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('student_traits')->insert([
            'traits_name' => 'Goal Setting',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('student_traits')->insert([
            'traits_name' => 'Numerical Skill',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('student_traits')->insert([
            'traits_name' => 'Material Handling',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('student_traits')->insert([
            'traits_name' => 'Uniform',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('student_traits')->insert([
            'traits_name' => 'Conflict Managment',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        //
    }
}
