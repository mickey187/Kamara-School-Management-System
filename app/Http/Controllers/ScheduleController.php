<?php

namespace App\Http\Controllers;

use App\Models\classes;
use App\Models\course_load;
use App\Models\section;
use App\Models\stream;
use App\Models\subject;
use App\Models\SubjectPeriod;
use App\Models\SubjectGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ScheduleController extends Controller
{
    //
    public function index(){
        $class = classes::all();
        $stream = stream::all();
        $subject = subject::all();
        return view('admin.schedule.schedule')->with('classes',$class)->with('stream',$stream)->with('subject',$subject);
    }

    public function getSection($class,$stream){

        $section = DB::table('sections')
                    ->join("classes","sections.class_id","=","classes.id")
                    ->join("streams","sections.stream_id","=","streams.id")
                    ->where('sections.class_id',$class)
                    ->where('sections.stream_id',$stream)
                    ->distinct()
                    ->get(['section_name']);
                    // ->unique();
            error_log($section);
        // }
        return response()->json($section);
    }



    public function addSchedule($class,$stream,$subject,$day,$section,$period){
        $sectionLabel = explode(",",$section);
        for ($i=0; $i < count($sectionLabel); $i++) {
            # code...
            $check = course_load::where('class_id',$class)
                                ->where('stream_id',$stream)
                                ->where('subject_group_id',$subject)
                                ->where('day',$day)
                                ->where('section_label',$sectionLabel[$i])
                                ->where('period_number',$period)
                                ->get()->first();
            if ($check) {
                return response()->json("Already Exist!");
            }else{
                $getCourseLoad = new course_load();
                $getCourseLoad->class_id = $class;
                $getCourseLoad->stream_id = $stream;
                $getCourseLoad->subject_group_id = $subject;
                $getCourseLoad->section_label = $sectionLabel[$i];
                $getCourseLoad->day = $day;
                $getCourseLoad->period_number = $period;

                if (!$getCourseLoad->save()) {
                    return response()->json("Error: 500 ");
                }
            }

        }
        return response()->json("OK: 200 ");

    }

    public function getSubjectGroup($class){
        $subjects = DB::table('subject_groups')
                        ->join('subjects','subject_groups.subject_id','=','subjects.id')
                        ->join('classes','subject_groups.class_id','=','classes.id')
                        ->where('classes.id',(int)$class)
                        ->get(['subject_groups.id','subjects.subject_name']);
        return response()->json($subjects);
    }


    public function indexNewSchedule(){
        $classes = classes::all();
        $stream = stream::all();
        return view('admin.schedule.new_schedule')->with('classes',$classes)->with('stream',$stream);
    }

    public function generateNewSchedule(){

        Schema::disableForeignKeyConstraints();

        course_load::truncate();

        Schema::enableForeignKeyConstraints();

        $all_sections = DB::table('sections')
        ->join('classes','sections.class_id','=','classes.id')
        ->join('streams','sections.stream_id','=','streams.id')
        //->join('subject_groups','classes.id','=','subject_groups.class_id')
        //->join('subject_periods','subject_groups.class_id','=','subject_periods.class_id')
        ->distinct()
        ->orderBy('class_id','asc')
        ->orderBy('stream_id','asc')
        ->orderBy('section_name','asc')
        ->get(['sections.class_id','stream_id','section_name']);
     
$schedule = collect([]);
        foreach ($all_sections as $individual_section) {
            $subject_groups = SubjectGroup::where('class_id',$individual_section->class_id)->get();
            foreach ($subject_groups as $individual_subject_group) {
                $subject_periods = SubjectPeriod::where('class_id',$individual_section->class_id)
                                   ->where('subject_group_id',$individual_subject_group->id)->get();
                foreach ($subject_periods as $individual_subject_peroid) {
                    $item =(object) [
                        'class_id'=>$individual_section->class_id,
                        'stream_id'=>$individual_section->stream_id,
                        'section_label'=>$individual_section->section_name,
                        'subject_group_id'=>$individual_subject_group->id,
                        'subject_id'=>$individual_subject_group->subject_id,
                        'total_period'=>$individual_subject_peroid->total_period
                    ];
                    $schedule->push($item);
                    // $schedule->push([
                    //     'class_id'=>$individual_section->class_id,
                    //     'stream_id'=>$individual_section->stream_id,
                    //     'section_label'=>$individual_section->section_name,
                    //     'subject_group_id'=>$individual_subject_group->id,
                    //     'subject_id'=>$individual_subject_group->subject_id,
                    //     'total_period'=>$individual_subject_peroid->total_period
                    // ]);
                }
            }
        }

        $weeks = ["monday","tuesday","wednesday","thursday","friday"];
        $period_number = [1,2,3,4,5,6,7];

        $weeks_array_index = null;
        $period_array_index = null;

        // $weeks_array_index = array_rand($weeks);
        // $period_array_index = array_rand($period_number);

//error_log($schedule);
       ini_set('max_execution_time',120);
       // set_time_limit(0);
       $counter2 = 0;
       $counter3 = 0; 
    //       $newer = $schedule->sortBy($schedule[0]->total_period);
    //   dd($schedule);

        foreach ($schedule as $key) {
           $counter = 0;
           
             //$this->makeIndividualSchedule($key["class_id"],$key["stream_id"],$key["subject_group_id"],$key["section_label"],$key["total_period"]);
           //error_log($status);
           
            $for_loop_limit = $key->total_period;
            error_log("for_loop_limit = ".$for_loop_limit);
           
            for ($i=0; $i < $for_loop_limit ; $i++) { 

            
                 
                 $day_and_period = $this->getRandomDayAndPeriod($key->class_id,$key->stream_id,$key->section_label, $key->subject_group_id);
                //  $day = explode("-",$day_and_period);
                //   dd($day);
                    
                 $course_load = new course_load();
                 $course_load->class_id = $key->class_id;
                 $course_load->stream_id = $key->stream_id;
                 $course_load->subject_group_id = $key->subject_group_id;
                 $course_load->section_label = $key->section_label;
                 $course_load->day = $day_and_period["day"];
                 $course_load->period_number = $day_and_period["period"];
                 $course_load->save(); 

                 $counter++;
                 //error_log($key["subject_group_id"]."-".$counter);
                $counter3++;
                error_log("inner".$counter3);
            }
            //error_log($key["section_label"]);
            $counter2++;
            // continue;
            error_log($counter2);
            error_log((string)count($schedule));
        }
        
        
        return response()->json($schedule);
    }
    public function getRandomDayAndPeriod($class_id, $stream_id, $section_label, $subject_group_id){
        $weeks = ["monday","tuesday","wednesday","thursday","friday"];
        $period_number = [1,2,3,4,5,6,7];

        $weeks_array_index = array_rand($weeks);
        $period_array_index = array_rand($period_number);
      //  error_log($class_id);
        $count = 0;

      $subject_per_day_duplicate_count = course_load::where('class_id', $class_id)
        ->where('stream_id',$stream_id)
        ->where('section_label',$section_label)
        ->where('day', $weeks[$weeks_array_index])
        ->where('subject_group_id',$subject_group_id)
        ->count();
    //     $newer = DB::table('course_loads')
    //     ->where("day",$weeks[$weeks_array_index])
    //     ->whereNotIn('period_number', [1, 2, 3])
    //     ->get();

        error_log($subject_per_day_duplicate_count." subject exists on that day");
        // error_log($newer." from newer");

        if (
            $subject_per_day_duplicate_count > 0 ||  course_load::where('class_id', $class_id)
            ->where('stream_id',$stream_id)
            ->where('section_label',$section_label)
            ->where('day', $weeks[$weeks_array_index])
            ->where('period_number', $period_number[$period_array_index])
            ->exists()
        ) {
           
            return  $this->getRandomDayAndPeriod($class_id, $stream_id, $section_label, $subject_group_id);
        }

        // if (
        //     course_load::where('class_id', $class_id)
        //                 ->where('stream_id',$stream_id)
        //                 ->where('section_label',$section_label)
        //                 ->where('day', $weeks[$weeks_array_index])
        //                 ->where('period_number', $period_number[$period_array_index])
        //                 ->exists()
                
        // ) {
        //   return  $this->getRandomDayAndPeriod($class_id, $stream_id, $section_label, $subject_group_id);
        // }
        
        


       

        else{

           $day_and_period = ["day"=>$weeks[$weeks_array_index],"period"=>$period_number[$period_array_index]];
          return $day_and_period;
        //    return $weeks[$weeks_array_index];
        // return $weeks[$weeks_array_index]."-".$period_number[$period_array_index];
        }
    }
    public function makeIndividualSchedule($class_id, $stream_id, $subject_group_id, $section_label, $total_period){
        $status = false;
        $weeks = ["monday","tuesday","wednesday","thursday","friday"];
        $period_number = [1,2,3,4,5,6,7];

        $weeks_array_index = array_rand($weeks);
        $period_array_index = array_rand($period_number);

        while (
                    !course_load::where('class_id', $class_id)->where('stream_id',$stream_id)
                    ->where('section_label',$section_label)
                    ->where('day', $weeks[$weeks_array_index])
                    ->where('period_number', $period_number[$period_array_index])
                    ->exists() 
              ) {


            $weeks_array_index = array_rand($weeks);
            $period_array_index = array_rand($period_number);


              while (
                    course_load::where('class_id', $class_id)->where('stream_id',$stream_id)
                    ->where('section_label',$section_label)
                    ->where('subject_group_id',$subject_group_id)
                    ->count() < $total_period + 1
                    ) {
            
            $course_load = new course_load();
            $course_load->class_id = $class_id;
            $course_load->stream_id = $stream_id;
            $course_load->subject_group_id = $subject_group_id;
            $course_load->section_label = $section_label;
            $course_load->day = $weeks[$weeks_array_index];
            $course_load->period_number = $period_number[$period_array_index];

                $course_load->save();
                $status = true;
            }
            
        }

        // else{
           $this->makeIndividualSchedule($class_id, $stream_id, $subject_group_id, $section_label, $total_period);
        // }


 return $status;

        }

       
      
    

    public function getGeneratedSchedule(){

        $schedule = DB::table('course_loads')
                       ->join('classes','course_loads.class_id','=','classes.id')
                       ->join('streams','course_loads.stream_id','=','streams.id')
                       //->join('subjects','subject_groups.subject_id','subjects.id')
                       ->get(['class_label','stream_type','section_label','subject_group_id','day','period_number']);
        $schedule_complete = collect([]);
        foreach ($schedule as $key) {
            $subject_id = SubjectGroup::where('id',$key->subject_group_id)->value('subject_id');
            $subject_name = subject::where('id',$subject_id)->value('subject_name');
            $schedule_complete->push([
                'class_label'=>$key->class_label,
                'stream_type'=>$key->stream_type,
                'section_label'=>$key->section_label,
                'subject_name'=>$subject_name,
                'day'=>$key->day,
                'period_number'=>$key->period_number
            ]);
        }
        return response()->json($schedule_complete);
    }

    public function getScheduleForSpecificeSection($class_id, $stream_id, $section_name){

        $schedule_complete = collect([]);
        $weeks_array = array(1=>"monday",2=>"tuesday",3=>"wednesday",4=>"thursday",5=>"friday");
        $weekly_schedule = collect([]);

        if (
            course_load::where('class_id',$class_id)->where('stream_id',$stream_id)
                        ->where('section_label',$section_name)->exists()
        ) {
        $schedule_complete = collect([]);
           for ($i=1; $i <6 ; $i++) { 
                   $schedule = DB::table('course_loads')
            ->join('classes','course_loads.class_id','=','classes.id')
            ->join('streams','course_loads.stream_id','=','streams.id')
            ->where('class_id',$class_id)
            ->where('stream_id',$stream_id)
            ->where('section_label',$section_name)
            ->where('day',$weeks_array[$i])
            //->orderByRaw('DAY(day)')
            ->orderBy('period_number','ASC')
            ->get(['class_label','stream_type','section_label','subject_group_id','day','period_number']);


            
            foreach ($schedule as $key) {
            $subject_id = SubjectGroup::where('id',$key->subject_group_id)->value('subject_id');
            $subject_name = subject::where('id',$subject_id)->value('subject_name');

            $schedule_complete->push([
                
                'class_label'=>$key->class_label,
                'stream_type'=>$key->stream_type,
                'section_label'=>$key->section_label,
                'subject_name'=>$subject_name,
                'day'=>$key->day,
                'period_number'=>$key->period_number 
            ]);
            }
            }
         

            // for ($i = 0; $i <= 7; $i++) {
            //     $schedule_complete->push(DB::table('course_loads')
            //     ->join('classes','course_loads.class_id','=','classes.id')
            //     ->join('streams','course_loads.stream_id','=','streams.id')
            //     ->where('class_id',$class_id)
            //     ->where('stream_id',$stream_id)
            //     ->where('section_label',$section_name)
            //     ->where('period_number', $i)
            //     ->orderBy('period_number','ASC')
            //     ->orderByRaw('DAY(day)')
                
            // ->first(/*['class_label','stream_type','section_label','subject_group_id','day','period_number']*/));
            // }
            return response()->json($schedule_complete);
        }
    }
}
