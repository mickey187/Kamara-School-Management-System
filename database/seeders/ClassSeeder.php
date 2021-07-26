<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i < 4; $i++) { 
            # code...
        
        DB::table('classes')->insert([
            'class_label' => 'KG '.$i,
            'priority' => $i,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
    $priority = 4;
    for ($i=1; $i < 9; $i++) { 
        # code...
    
    DB::table('classes')->insert([
        'class_label' => 'Grade '.$i,
        'priority' => $priority,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ]);
    $priority++;
}

        
    }
}
