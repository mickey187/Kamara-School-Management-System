<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('semisters')->insert([
            'semister' => '1',
            'term' => 'Quarter_One',
            'current_semister' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('semisters')->insert([
            'semister' => '1',
            'term' => 'Quarter_Two',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('semisters')->insert([
            'semister' => '2',
            'term' => 'Quarter_Three',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('semisters')->insert([
            'semister' => '2',
            'term' => 'Quarter_Four',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
