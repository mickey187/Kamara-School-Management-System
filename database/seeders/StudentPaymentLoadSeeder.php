<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class StudentPaymentLoadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      
        $student = DB::table('students')->select('id','class_id')->get();
        
        foreach ($student as $stud) {
            
            $payment_loads = DB::table('payment_loads')->where('class_id',$stud->class_id)->where('payment_type_id','!=','3')->get();
            
            
            
            foreach ($payment_loads as $pay_load) {
                
                

                DB::table('student_payment_load')->insert([
                    
                    'student_id' => $stud->id,
                    'payment_load_id' => $pay_load->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
            

        }
    }
}
