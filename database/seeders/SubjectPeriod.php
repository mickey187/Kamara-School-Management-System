<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SubjectPeriod extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $subject_groups = DB::table('subject_groups')->select("id",'subject_id','class_id')->get();

        foreach ($subject_groups as $key) {
            
            switch ($key->subject_id) {
                case 1:
                    DB::table('subject_periods')->insert([

                        'class_id' => $key->class_id,
                        'subject_group_id' => $key->id,
                        'total_period'=> 5,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                    break;

                    case 2:
                        DB::table('subject_periods')->insert([
    
                            'class_id' => $key->class_id,
                            'subject_group_id' => $key->id,
                            'total_period'=> 5,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                        break;
                        case 3:
                            DB::table('subject_periods')->insert([
        
                                'class_id' => $key->class_id,
                                'subject_group_id' => $key->id,
                                'total_period'=> 4,
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now(),
                            ]);
                            break;

                            case 4:
                                DB::table('subject_periods')->insert([
            
                                    'class_id' => $key->class_id,
                                    'subject_group_id' => $key->id,
                                    'total_period'=> 4,
                                    'created_at' => Carbon::now(),
                                    'updated_at' => Carbon::now(),
                                ]);
                                break;

                                case 5:
                                    DB::table('subject_periods')->insert([
                
                                        'class_id' => $key->class_id,
                                        'subject_group_id' => $key->id,
                                        'total_period'=> 4,
                                        'created_at' => Carbon::now(),
                                        'updated_at' => Carbon::now(),
                                    ]);
                                    break;

                                    case 6:
                                        DB::table('subject_periods')->insert([
                    
                                            'class_id' => $key->class_id,
                                            'subject_group_id' => $key->id,
                                            'total_period'=> 4,
                                            'created_at' => Carbon::now(),
                                            'updated_at' => Carbon::now(),
                                        ]);
                                        break;

                                        case 7:
                                            DB::table('subject_periods')->insert([
                        
                                                'class_id' => $key->class_id,
                                                'subject_group_id' => $key->id,
                                                'total_period'=> 4,
                                                'created_at' => Carbon::now(),
                                                'updated_at' => Carbon::now(),
                                            ]);
                                            break;

                                            case 8:
                                                DB::table('subject_periods')->insert([
                            
                                                    'class_id' => $key->class_id,
                                                    'subject_group_id' => $key->id,
                                                    'total_period'=> 3,
                                                    'created_at' => Carbon::now(),
                                                    'updated_at' => Carbon::now(),
                                                ]);
                                                break;

                                                case 9:
                                                    DB::table('subject_periods')->insert([
                                
                                                        'class_id' => $key->class_id,
                                                        'subject_group_id' => $key->id,
                                                        'total_period'=> 2,
                                                        'created_at' => Carbon::now(),
                                                        'updated_at' => Carbon::now(),
                                                    ]);
                                                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }
}
