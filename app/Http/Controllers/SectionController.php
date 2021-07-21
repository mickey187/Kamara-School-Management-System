<?php

namespace App\Http\Controllers;

use App\Models\classes;
use App\Models\home_room;
use App\Models\section;
use App\Models\semister;
use App\Models\stream;
use App\Models\student;
use App\Models\student_mark_list;
use App\Models\teacher;
use App\Models\teacher_course_load;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $class = classes::all();
        $stream = stream::all();


        return view('admin.student.student_section')->with('class',$class)->with('stream',$stream);
        //return $student;
    }
    public function fetchStudent($class_id,$stream_id){
        // $class = DB::table('students')
        // ->join('classes','classes.id','=','students.class_id')
        // ->join('streams','streams.id','=','students.stream_id')
        // ->where('class_id',$class_id)
        // ->where('stream_id',$stream_id)->orderBy('first_name','ASC')
        // ->get();
        $class = DB::table('sections')
        ->join('students','students.id','=','sections.student_id')
        ->join('classes','classes.id','=','sections.class_id')
        ->join('streams','streams.id','=','students.stream_id')
        ->where('sections.class_id',$class_id)
        ->where('students.stream_id',$stream_id)
        ->get();
       // $class = student::where('class_id',$class_id)->where('stream_id',$stream_id)->get();
       //return $class;
        return response()->json($class);
    }
    public function setSection(Request $request){
        $student = student::where('class_id',$request->class)->where('stream_id',$request->stream)->orderBy('first_name','ASC')->get();
        $this->sectionLogic($student,$request->student_size);
    }

    public function sectionLogic($student,$size){
        $count_ = 0;
        $section_label = 0;
        $alphabet = array( 'a', 'b', 'c', 'd', 'e',
        'f', 'g', 'h', 'i', 'j',
        'k', 'l', 'm', 'n', 'o',
        'p', 'q', 'r', 's', 't',
        'u', 'v', 'w', 'x', 'y',
        'z'
        );
        foreach($student as $row){
            $section = new section();
            $section->class_id = $row->class_id;
            $section->student_id = $row->id;
            $section->section_name = strtoupper($alphabet[$section_label]);
            $section->save();
            if($count_ > $size){
                $count_ = 0;
                $section_label = $section_label + 1;
            }
            $count_ = $count_ + 1;
        }
    }
    public function semister(Request $request){
        $semister = semister::all();
        return view('admin.curriculum.add_semister')->with('semister',$semister);
    }

    public function insertSemister(Request $request){
        $semister = semister::all();
            $semister_ = new semister();
            $semister_->semister = $request->semister;
            $semister_->term = $request->term;
            $semister_->current_semister = false;
            $semister_->save();

        return view('admin.curriculum.add_semister')->with('semister',$semister);
    }
    public function findSection($id){
        $val = '';
        $count = 0;
        $section = section::where('class_id',$id)->get();
        $sectionArray = array();
        foreach($section as $row){
            if($count == 0 || $val == ''){
                $val = $row->section_name;
                //$sectionArray += array('name'.$count => $row->section_name);
                $sectionArray[$count] = $row->section_name;
                $count = $count + 1;
            }elseif($val === $row->section_name){
                continue;
            }elseif($row->section_name !== $val){
                $val = $row->section_name;
                //$sectionArray += array('name'.$count => $row->section_name);
                  $sectionArray[$count] = $row->section_name;
                $count = $count + 1;
            }
        }
        return response()->json($sectionArray);
    }
    public function setCourseLoad($teacher,$section,$class,$subject){
            $response = 'Inserted';
            $split_section = explode(',',$section);
            $i = 0;
            for($i;$i<sizeof($split_section)-1;$i++){
                 $validate = teacher_course_load::where('teacher_id',$teacher)
                 ->where('class_id',$class)
                 ->where('subject_id',$subject)
                 ->where('section',$split_section[$i])->get();
                 if(sizeof( $validate) === 0){
                    $teacher_course_load = new teacher_course_load();
                    $teacher_course_load->teacher_id = $teacher;
                    $teacher_course_load->subject_id = $subject;
                    $teacher_course_load->class_id = $class;
                    $teacher_course_load->section = $split_section[$i];
                    $teacher_course_load->save();
                 }else{
                    $response = 'NotInserted';
                    continue;
                 }

                // $course_load_id = teacher_course_load::latest('created_at')->pluck('id')->first();
                // $teacher = teacher::find($course_load_id);
                // $teacher->course_load_id = $course_load_id;
                // $teacher->update();
            }
            //$teacher_course = teacher_course_load::all();

            $teacher_course = DB::table('teacher_course_loads')
            ->join('classes','classes.id','=','teacher_course_loads.class_id')
            ->join('subjects','subjects.id','=','teacher_course_loads.subject_id')
            ->where('teacher_course_loads.teacher_id',$teacher)
            ->get(['class_label',
                    'teacher_course_loads.section',
                    'subject_name',
                    'class_id',
                    'teacher_course_loads.id as id',
                    'teacher_course_loads.teacher_id as teacher_id']);
            return response()->json(['datac'=>$teacher_course, 'status'=>$response]);
        //return response()->json($teacher_course);
    }

    public function getCourseLoad($id){
        $teacher_home_room = DB::table('home_rooms')
                            ->join('classes','home_rooms.class_id','=','classes.id')
                            ->where('home_rooms.employee_id',$id)
                            ->get();
            //    $teacher_home_room = home_room::where('employee_id',$id)->get();
        $teacher_course = DB::table('teacher_course_loads')
        ->join('classes','classes.id','=','teacher_course_loads.class_id')
        ->join('subjects','subjects.id','=','teacher_course_loads.subject_id')
        ->where('teacher_course_loads.teacher_id',$id)
        ->get(['class_label',
                'teacher_course_loads.section',
                'subject_name',
                'class_id',
                'teacher_course_loads.id as id',
                'teacher_course_loads.teacher_id as teacher_id']);
        return response()->json(['teacher_courses'=>$teacher_course,'hoom_room'=>$teacher_home_room]);
    }
    public function deleteCourseLoad($load_id){
        $id = 0;
        $teacher = teacher_course_load::select('teacher_id')->where('id', $load_id)->get();
        foreach($teacher as $row){
            $id = $row->teacher_id;
        }
        $find = teacher_course_load::find($load_id);
        $find->delete();
        $teacher_course = DB::table('teacher_course_loads')
        ->join('classes','classes.id','=','teacher_course_loads.class_id')
        ->join('subjects','subjects.id','=','teacher_course_loads.subject_id')
        ->where('teacher_course_loads.teacher_id',$id)
        ->get(['class_label',
                'teacher_course_loads.section',
                'subject_name',
                'class_id',
                'teacher_course_loads.id as id',
                'teacher_course_loads.teacher_id as teacher_id']);
        return response()->json($teacher_course);
    }

    public function getHomeRoom($teacher_id){
        $student_subject = array();
        $hoom_room = home_room::where('employee_id',$teacher_id)->get();
        $teacher_home_room = DB::table('home_rooms')
        ->join('classes','home_rooms.class_id','classes.id')
        ->where('employee_id',$teacher_id)
        ->get(['class_label','section','home_rooms.id as id']);
        return response()->json($teacher_home_room);
    }


    public function getHomeRoomStudent($teacher_id,$section,$class_name){
        $sec = DB::table('sections')
                ->join('classes','sections.class_id','=','classes.id')
                ->join('students','sections.student_id','=','students.id')
                ->where('section_name',$section)
                ->get();
        $mark = DB::table('student_mark_lists')
                ->join('students','student_mark_lists.student_id','=','students.id')
                ->join('classes','student_mark_lists.class_id','=','classes.id')
                ->join('semisters','student_mark_lists.semister_id','=','semisters.id')
                ->join('assasment_types','student_mark_lists.assasment_type_id','=','assasment_types.id')
                ->join('subjects','student_mark_lists.subject_id','=','subjects.id')
                ->get();
        $semister = semister::all();
        return response()->json(['section'=>$sec,'mark'=>$mark,'semister'=>$semister]);
    }


    public function deleteHomeRoom($hoom_room_id){
        $id = 0;
        $tech = home_room::where('id',$hoom_room_id)->get();
        foreach($tech as $row){
            $id = $row->employee_id;
        }
        $del = home_room::find($hoom_room_id);
        $del->delete();

        $teacher_home_room = DB::table('home_rooms')
        ->join('classes','home_rooms.class_id','classes.id')
        ->where('employee_id',$id)
        ->get(['class_label','section','home_rooms.id as id']);
        return response()->json($teacher_home_room);
    }

    public function setHomeRoom($teacher,$section,$class){
        $response = 'Inserted';
        $split_section = explode(',',$section);
        $i = 0;
        $j = 0;
        for($i;$i<sizeof($split_section)-1;$i++){

             $validate = home_room::where('employee_id',$teacher)
             ->where('class_id',$class)
             ->where('section',$split_section[$i])->get();
             if(sizeof($validate) === 0){
                $home = new home_room();
                $home->employee_id = $teacher;
                $home->class_id = $class;
                $home->section = $split_section[$i];
                $home->save();
                $j =$j + 1;
             }else{
                $response = 'NotInserted';
                continue;
             }
            }
        $home_r =DB::table('home_rooms')
        ->join('classes','home_rooms.class_id','classes.id')
        ->where('employee_id',$teacher)
        ->get(['class_label','section','home_rooms.id as id']);
        return response()->json(['datac'=>$home_r, 'status'=>$response]);
        //return response()->json($j);

    }
    public function setCurrentSemister($id){
        $semister1 = semister::all();
        foreach($semister1 as $row){
            $semister = semister::find($row->id);
            $semister->current_semister = false;
            $semister->update();
        }
        $semister2 = semister::find($id);
        $semister2->current_semister = true;
        $semister2->update();
        $semister3 = semister::all();
        return response()->json($semister3);
    }
}

