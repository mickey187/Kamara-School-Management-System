<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class PaymentLoadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 8; $i++) { 
            switch ($i) {
                case 1:
                    DB::table('payment_types')->insert([
                        'id' => 1,
                        'payment_type' => 'Registration Fee',
                        'recurring_type' =>'non-recurring',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                     ]);
                    break;
                case 2:
                        DB::table('payment_types')->insert([
                            'id' => 2,
                            'payment_type' => 'Tuition Fee',
                            'recurring_type' =>'recurring',
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                         ]);
                        break;
                case 3:
                            DB::table('payment_types')->insert([
                                'id' => 3,
                                'payment_type' => 'Book Fee',
                                'recurring_type' =>'non-recurring',
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now(),
                             ]);
                            break;

                case 4:
                                DB::table('payment_types')->insert([
                                    'id' => 4,
                                    'payment_type' => 'Transportation Fee',
                                    'recurring_type' =>'recurring',
                                    'created_at' => Carbon::now(),
                                    'updated_at' => Carbon::now(),
                                 ]);
                                break;

                case 5:
                                    DB::table('payment_types')->insert([
                                        'id' => 5,
                                        'payment_type' => 'Tutorial Fee',
                                        'recurring_type' =>'non-recurring',
                                        'created_at' => Carbon::now(),
                                        'updated_at' => Carbon::now(),
                                     ]);
                                    break;

                case 6:
                                        DB::table('payment_types')->insert([
                                            'id' => 6,
                                            'payment_type' => 'Gown & Magazine Fee',
                                            'recurring_type' =>'non-recurring',
                                            'created_at' => Carbon::now(),
                                            'updated_at' => Carbon::now(),
                                         ]);
                                        break;

                case 7:
                                            DB::table('payment_types')->insert([
                                                'id' => 7,
                                                'payment_type' => 'School Trip',
                                                'recurring_type' =>'non-recurring',
                                                'created_at' => Carbon::now(),
                                                'updated_at' => Carbon::now(),
                                             ]);
                                            break;
                
                
                default:
                    
                    break;
            }
            
        }

        //Registration Fee Load seeder

        for ($i=1; $i < 13 ; $i++) { 
            DB::table('payment_loads')->insert([
                'id' => $i,
                'payment_type_id' => 1,
                'class_id' =>$i,
                'amount'=> 300,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
             ]);
        }

        //Tuition Fee Load Seeder
        $amount = 850;
        for ($i=0; $i < 12  ; $i++) { 
            DB::table('payment_loads')->insert([
                
                'payment_type_id' => 2,
                'class_id' =>$i,
                'amount'=> $amount,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
             ]);
             $amount = $amount + 150 ;
        }

        //Book Fee Load Seeder
        for ($i=0; $i < 12  ; $i++) { 
            DB::table('payment_loads')->insert([
                
                'payment_type_id' => 3,
                'class_id' =>$i,
                'amount'=> 500,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
             ]);
             
        }

        //Transportation Fee Seeeder
        for ($i=0; $i < 12  ; $i++) { 
            DB::table('payment_loads')->insert([
                
                'payment_type_id' => 4,
                'class_id' =>$i,
                'amount'=> 500,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
             ]);
             
        }

        //Tutorial Fee Seeeder
        for ($i=0; $i < 12  ; $i++) { 
            DB::table('payment_loads')->insert([
                
                'payment_type_id' => 5,
                'class_id' =>$i,
                'amount'=> 500,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
             ]);
             
        }

        //Tutorial Fee Seeeder
        for ($i=0; $i < 12  ; $i++) { 
            DB::table('payment_loads')->insert([
                
                'payment_type_id' => 6,
                'class_id' =>$i,
                'amount'=> 500,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
             ]);
             
        }
        // School Trip
        for ($i=0; $i < 12  ; $i++) { 
            DB::table('payment_loads')->insert([
                
                'payment_type_id' => 7,
                'class_id' =>$i,
                'amount'=> 900,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
             ]);
             
        }

        
    }
}
