<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('streams')->insert([
            'stream_type' => 'Amharic',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('streams')->insert([
            'stream_type' => 'Afan Oromoo',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        //
    }
}
