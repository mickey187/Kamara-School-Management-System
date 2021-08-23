<?php

namespace App\Http\Controllers;

use App\Models\classes;
use App\Models\course_load;
use App\Models\section;
use App\Models\stream;
use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
