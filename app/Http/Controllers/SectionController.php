<?php

namespace App\Http\Controllers;

use App\Models\assasment_type;
use App\Models\classes;
use App\Models\home_room;
use App\Models\section;
use App\Models\semister;
use App\Models\stream;
use App\Models\student;
use App\Models\student_mark_list;
use App\Models\teacher;
use App\Models\teacher_course_load;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Averages;

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
        $label = '';
        $status = '';
        $section = array();
        $class = DB::table('sections')
        ->join('students','students.id','=','sections.student_id')
        ->join('classes','classes.id','=','sections.class_id')
        ->join('streams','streams.id','=','students.stream_id')
        ->where('sections.class_id',$class_id)
        ->where('students.stream_id',$stream_id)
        ->get(['students.student_id','stream_type','section_name','class_label',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')]);

        // ->get();
        foreach($class as $row){
            if(($label == '') || ($label != $row->section_name)){
                $label = $row->section_name;
                array_push($section,$row->section_name);
            }
        }
        if($label==''){
            $status = 'false';

            $class = DB::table('students')
                ->join('classes','classes.id','=','students.class_id')
                ->join('streams','streams.id','=','students.stream_id')
                ->where('students.class_id',$class_id)
                ->where('students.stream_id',$stream_id)
                ->get(['students.student_id','stream_type','classes.class_label',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')]);
            //    foreach($class as $row){
            //         $class->$row = $row->push(collect(["section_name"=>"Undifind"]));
            //    }
                // ->get();
        }else{
            $status = 'true';
        }
        return response()->json(['classes'=>$class,'sections'=>$section,'status'=>$status]);
    }
    public function setSection($class_id,$stream_id,$section,$room){

        if($section == 'Alphabet'){
            $student = student::where('class_id',$class_id)->where('stream_id',$stream_id)->orderBy('first_name','ASC')->get();
            $this->sectionLogic($student,$room);
            $label = '';
            $status = '';
            $section = array();
            $class = DB::table('sections')
            ->join('students','students.id','=','sections.student_id')
            ->join('classes','classes.id','=','sections.class_id')
            ->join('streams','streams.id','=','students.stream_id')
            ->where('sections.class_id',$class_id)
            ->where('students.stream_id',$stream_id)
            ->get(['students.student_id','stream_type','section_name','class_label',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')]);
            // ->get();

            foreach($class as $row){
                if(($label == '') || ($label != $row->section_name)){
                    $label = $row->section_name;
                    array_push($section,$row->section_name);
                }
            }
            if($label==''){
                $status = 'false';
                // $class = DB::table('students')
                //     ->join('classes','classes.id','=','students.class_id')
                //     ->join('streams','streams.id','=','students.stream_id')
                //     ->where('students.class_id',$class_id)
                //     ->where('students.stream_id',$stream_id)
                //     ->get(['students.student_id','streams.stream_type','students.class_id as section_name','class_label',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')]);
                //     // ->get();
                    error_log("");
            }else{
                $status = 'true';
            }
            return response()->json(['classes'=>$class,'sections'=>$section,'status'=>$status]);
            // return response()->json("Set With Alaphabet");
            // return view('admin.student.student_section')->with('class',$class)->with('stream',$stream);
        }else if($section == 'RegistrationDate'){
            $student = student::where('class_id',$class_id)->where('stream_id',$stream_id)->orderBy('created_at','ASC')->get();
            $this->sectionLogic($student,$room);
            $label = '';
            $status = '';
            $section = array();
            $class = DB::table('sections')
            ->join('students','students.id','=','sections.student_id')
            ->join('classes','classes.id','=','sections.class_id')
            ->join('streams','streams.id','=','students.stream_id')
            ->where('sections.class_id',$class_id)
            ->where('students.stream_id',$stream_id)
            ->get();
            foreach($class as $row){
                if(($label == '') || ($label != $row->section_name)){
                    $label = $row->section_name;
                    array_push($section,$row->section_name);
                }
            }
            if($label==''){
                $status = 'false';
                $class = DB::table('students')
                    ->join('classes','classes.id','=','students.class_id')
                    ->join('streams','streams.id','=','students.stream_id')
                    ->where('students.class_id',$class_id)
                    ->where('students.stream_id',$stream_id)
                    ->get();
            }else{
                $status = 'true';
            }
            return response()->json(['classes'=>$class,'sections'=>$section,'status'=>$status]);
            // return response()->json("Set With Registration Date");
            // return view('admin.student.student_section')->with('class',$class)->with('stream',$stream);
        }
        // $student = student::where('class_id',$request->class)->where('stream_id',$request->stream)->orderBy('first_name','ASC')->get();

        //return $this->sectionLogic($student,$request->student_size);
    }

    public function sectionLogic($student,$size){
        $count_students = 0;

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
            $sectioned_student = section::where('student_id',$row->id)->get()->first();
            if($sectioned_student){
                $count_students = $count_students+1;
            }else{
                $section = new section();
                $section->class_id = $row->class_id;
                $section->student_id = $row->id;
                $section->stream_id = $row->stream_id;
                $section->section_name = strtoupper($alphabet[$section_label]);
                $section->save();
                if($count_ > $size){
                    $count_ = 0;
                    $section_label = $section_label + 1;
                }
                $count_ = $count_ + 1;
            }
        }
        return $count_students;
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
        // $section = DB::table('sections')
        //             ->join('streams','sections.stream_id','=','streams.id')->get(['section_name','stream_type','streams.id']);
        $section = section::where('class_id',$id)->get();

        $sectionArray = array();
        foreach($section as $row){
            $str = stream::where('id',$row->stream_id)->get()->first();
            if($count == 0 || $val == ''){
                $val = $row->section_name;
                //$sectionArray += array('name'.$count => $row->section_name);
                $sectionArray[$count] = $str->stream_type.'-'. $row->section_name;
                $count = $count + 1;
            }elseif($val === $row->section_name){
                continue;
            }elseif($row->section_name !== $val){
                $val = $row->section_name;
                //$sectionArray += array('name'.$count => $row->section_name);
                $sectionArray[$count] = $str->stream_type.'-'. $row->section_name;
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
                 $split_stream = explode('-',$split_section[$i]);
                 $validate = teacher_course_load::where('teacher_id',$teacher)
                 ->where('class_id',$class)
                 ->where('subject_id',$subject)
                 ->where('section',$split_stream[1])->get();
                 if(sizeof( $validate) === 0){
                    $teacher_course_load = new teacher_course_load();
                    $teacher_course_load->teacher_id = $teacher;
                    $teacher_course_load->subject_id = $subject;
                    $teacher_course_load->class_id = $class;
                    $teacher_course_load->section = $split_stream[1];
                    $teacher_course_load->stream = $split_stream[0];
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
                'teacher_course_loads.teacher_id as teacher_id',
                'teacher_course_loads.stream']);

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
        ->get(['class_label','section','home_rooms.id as id' ,'home_rooms.employee_id','stream']);
        return response()->json($teacher_home_room);
    }


    public function getHomeRoomStudent($teacher_id,$section,$class_name,$stream){
        $getStreamId = stream::where('stream_type',$stream)->get()->first();
        $stream_id = (int)$getStreamId->id;
        //error_log("Stream ID: ".$getStreamId->id);
        $sec = DB::table('sections')
                ->join('classes','sections.class_id','=','classes.id')
                ->join('students','sections.student_id','=','students.id')
                ->join('streams','sections.stream_id','=','streams.id')
                ->where('section_name',$section)
                ->where('class_label',$class_name)
                ->where('streams.id',$stream_id)
                ->get([
                    'students.student_id',
                    'first_name',
                    'middle_name',
                    'last_name',
                    'gender'
                ]);
                error_log("Stream ID: ".$stream_id);

        $mark = DB::table('student_mark_lists')
                ->join('students','student_mark_lists.student_id','=','students.id')
                ->join('classes','student_mark_lists.class_id','=','classes.id')
                ->join('semisters','student_mark_lists.semister_id','=','semisters.id')
                ->join('assasment_types','student_mark_lists.assasment_type_id','=','assasment_types.id')
                ->join('subjects','student_mark_lists.subject_id','=','subjects.id')
                ->get([
                    'students.student_id',
                    'first_name',
                    'middle_name',
                    'last_name',
                    'semister',
                    'term',
                    'subject_name',
                    'test_load',
                    'mark'
                ]);
        $semister = semister::all();
        // return response()->json($this->getTheTotalAvarage($mark));
         //return response()->json(['section'=>$sec,'mark'=>$this->getTheTotalAvarage($mark),'semister'=>$semister]);
         return response()->json(['section'=>$this->getTheTotalAvarage($sec),'mark'=>$mark,'semister'=>$semister]);

//          return response()->json(['section'=>$sec,'mark'=>$mark,'semister'=>$semister]);
        }

    public function getCourseLoadStudent($teacher_id,$section,$class_id,$course_load_id,$stream){
        $subject = '';
        $assasment = '';
        //error_log($stream);
        $check_stream = stream::where('stream_type',$stream)->get()->first();
        //error_log($check_stream->id);
        $course_load = DB::table('teacher_course_loads')
                        ->join('subjects','teacher_course_loads.subject_id','=','subjects.id')
                        ->where('teacher_id',$teacher_id)
                        ->where('section',$section)
                        ->where('class_id',$class_id)
                        ->where('teacher_course_loads.id',$course_load_id)
                        ->get('subject_name');
        foreach($course_load as $row){
            $subject = $row->subject_name;
        }
        $sec = DB::table('sections')
                ->join('classes','sections.class_id','=','classes.id')
                ->join('students','sections.student_id','=','students.id')
                ->where('section_name',$section)
                ->where('sections.stream_id',$check_stream->id)
                ->where('classes.id',$class_id)
                ->get(['first_name',
                        'middle_name',
                        'last_name',
                        'gender',
                        'sections.stream_id',
                        'sections.student_id as ssection_id',
                        'students.student_id',
                        'students.id as studid',
                        'section_name',
                        'classes.id as class_id',
                        'class_label']);
        $mark = DB::table('student_mark_lists')
                ->join('students','student_mark_lists.student_id','=','students.id')
                ->join('classes','student_mark_lists.class_id','=','classes.id')
                ->join('semisters','student_mark_lists.semister_id','=','semisters.id')
                ->join('assasment_types','student_mark_lists.assasment_type_id','=','assasment_types.id')
                ->join('subjects','student_mark_lists.subject_id','=','subjects.id')
                ->where('classes.id',$class_id)
                ->where('subject_name',$subject)
                ->get(['semisters.semister',
                        'students.student_id',
                        'student_mark_lists.test_load',
                        'semisters.term',
                        'student_mark_lists.id as id',
                        'assasment_types.assasment_type',
                        'assasment_types.id as assid',
                        'subjects.subject_name',
                        'subjects.id as subject_id',
                        'semisters.id as semid',
                        'student_mark_lists.mark']);
                $semister = semister::all();
        // error_log("errrrreeeeeeeeeeeee".$subject);
        return response()->json(['section'=>$sec,'mark'=>$mark,'semister'=>$semister,'subject'=>$subject]);
       //return response()->json([$course_load]);
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
            $split_stream = explode('-',$split_section[$i]);
             $validate = home_room::where('employee_id',$teacher)
             ->where('class_id',$class)
             ->where('section',$split_section[$i])->get();
             if(sizeof($validate) === 0){
                $home = new home_room();
                $home->employee_id = $teacher;
                $home->class_id = $class;
                $home->section = $split_stream[1];
                $home->stream = $split_stream[0];
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

    public function getTheTotalAvarage($sec){
         $item = collect();
        foreach($sec as $row){
            $newSemister = 0;
            $subject = array();
            $semister_one_total = 0;
            $semister_one_load = 0;
            $semister_two_total= 0;
            $semister_two_load= 0;
            $semister_three_total= 0;
            $semister_three_load= 0;
            $semister_four_total= 0;
            $semister_four_load= 0;
            $all_total = 0;

                $student = student::where('student_id',$row->student_id)->get()->first();
                $mark= student_mark_list::where('student_id',$student->id)->get();
                $semister = semister::all();
                foreach($semister as $sem){
                    foreach($mark as $ma){
                        if($sem->id == $ma->semister_id and $newSemister==0){
                            $semister_one_total = $semister_one_total + $ma->mark;
                            $semister_one_load = $semister_one_load + 1;
                            if(!(in_array($ma->subject_id, $subject))){
                                array_push($subject, $ma->subject_id);
                            }
                        }elseif($sem->id == $ma->semister_id and $newSemister==1){
                            $semister_two_total = $semister_two_total + $ma->mark;
                            $semister_two_load = $semister_two_load + 1;
                            if(!(in_array($ma->subject_id, $subject))){
                                array_push($subject, $ma->subject_id);
                            }
                        }elseif($sem->id == $ma->semister_id and $newSemister==2){
                            $semister_three_total = $semister_three_total + $ma->mark;
                            $semister_three_load = $semister_three_load + 1;
                            if(!(in_array($ma->subject_id, $subject))){
                                array_push($subject, $ma->subject_id);
                            }
                        }if($sem->id == $ma->semister_id and $newSemister==3){
                            $semister_four_total = $semister_four_total + $ma->mark;
                            $semister_four_load = $semister_four_load + 1;
                            if(!(in_array($ma->subject_id, $subject))){
                                array_push($subject, $ma->subject_id);
                            }
                        }
                    }
                    $newSemister = $newSemister + 1;
                }

            // }
            // error_log("How Much Is it: ". $subject[0]);

            error_log("blaaaaaaaaaaaaaa".$semister_one_total);
            if(!count($subject) <= 0 or !count($subject) <= 0 or !count($subject)<= 0 or !count($subject) <= 0){
                $semister_one_total = ((int) $semister_one_total /  count($subject));
                $semister_two_total = ((int)$semister_two_total / count($subject));
                $semister_three_total = ((int)$semister_three_total / count($subject));
                $semister_four_total = ((int)$semister_four_total / count($subject));
            }
                $item2 = collect([
                "first_name"=>$row->first_name,
                "middle_name"=>$row->middle_name,
                "last_name"=>$row->last_name,
                "student_id"=>$row->student_id,
                // "term"=>$row->term,
                // "semister"=>$row->semister,
                // "subject_name"=>$row->subject_name,
                // "test_load"=>$row->test_load,
                // "mark"=>$row->mark,
                "gender"=>$row->gender,
                "semister_one_total"=>$semister_one_total,
                "semister_two_total"=>$semister_two_total,
                "semister_three_total"=>$semister_three_total,
                "semister_four_total"=>$semister_four_total,
                "all_total"=>''
                ]);

            $item->push($item2);
        }

        return $item;
    }
}

