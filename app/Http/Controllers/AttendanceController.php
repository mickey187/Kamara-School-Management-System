<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\employee;
use App\Models\section;
use App\Models\home_room;
use App\Models\stream;
use App\Models\student;
use App\Models\attendance;
use App\Models\semister;
use App\Models\classes;
use DateTime;
use Andegna;

class AttendanceController extends Controller
{
    //
    public function indexAttendance($class_id, $stream_id, $section){

        // $class_id = classes::where('class_label',$class_label)->value('id');
        // $stream_id = stream::where('stream_type',$stream_type)->value('id');
        
        $user_id = Auth::user()->user_id;
        $employee = employee::where('employee_id',$user_id)->first();
        
error_log($class_id." ".$stream_id." ".$section."wzuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuup");
        
        return view('teacher.student_attendance')->with('employee',$employee)
                ->with('class_id',$class_id)->with('stream_id',$stream_id)->with('section',$section);
    }

    public function generateAttendanceList($class_id, $stream_id, $section){
        // $user_id = Auth::user()->user_id;
        // $employee = employee::where('employee_id',$user_id)->first();
        // $employee_id = employee::where('employee_id',$user_id)->value('id');
        // $home_room = home_room::where('employee_id',$employee_id)->first();
        // //$stream_id = stream::where('stream_type',$home_room->stream)->value('id');
        // $stream_id = home_room::where('employee_id',$employee_id)->value('stream_id');
        $section = DB::table('sections')
                        ->join('students','sections.student_id','=','students.id')
                        ->join('classes','sections.class_id','=','classes.id')
                        ->where('sections.class_id',$class_id)->where('sections.stream_id',$stream_id)
                        ->where('section_name',$section)
                        ->orderBy('students.first_name','ASC')
                        ->orderBy('students.middle_name','ASC')
                        ->orderBy('students.last_name','ASC')
                        ->get(['students.student_id','classes.class_label','sections.section_name',
                       DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')
                       ,'sections.class_id','sections.stream_id','students.id AS student_table_id']);

        $now1 = \Andegna\DateTimeFactory::now();
        //dd($now1);
        $gregorian = new DateTime('today');
        $ethipic = new Andegna\DateTime($gregorian);
        $today_date_cookie = $ethipic->format(DATE_COOKIE);
        // $current_date = $now1->getYear()."-".$now1->getMonth()."-".$now1->getDay();


        $current_year = $now1->getYear();
        $current_month = null;        
        $current_date = null;

        if (strlen($now1->getMonth()) < 2) {
            $current_month = "0".$now1->getMonth();
        }

        else{
            $current_month = $now1->getMonth();
        }

        if (strlen($now1->getDay() ) < 2) {
            $current_date = "0".$now1->getDay();
        }

        else {
            $current_date = $now1->getDay();
        }

        $current_date = $current_year."-".$current_month."-".$current_date;

        return response()->json(['current_date'=> $current_date,'section'=>$section,'today_date_cookie'=>$today_date_cookie]);
    }

    

    public function submitAttendance(Request $req){
        $new_arr = $req->student_status_arr;
        $status = null;
        
        $current_semister_and_quarter_id = semister::where('current_semister',true)->value('id');
        $now1 = \Andegna\DateTimeFactory::now();
        $academic_calendar = $now1->getYear();
      
        foreach ($new_arr as $key) {
           //error_log($key->student_table_id);
         
            if (!attendance::where('student_id',$key["student_table_id"])
            ->where('class_id', $key["class_id"])
            ->where('stream_id', $key["stream_id"])
            ->where('section_name', $key["section_name"])
            ->where('date', $key["date"])->exists() ) {

             $attendance = new attendance();
            $attendance->student_id = $key["student_table_id"];
            $attendance->class_id = $key["class_id"];
            $attendance->stream_id = $key["stream_id"];
            $attendance->section_name = $key["section_name"];
            $attendance->status = $key["status"];
            $attendance->date = $key["date"];
            $attendance->semister_id = $current_semister_and_quarter_id;
            $attendance->academic_calendar = $academic_calendar;
            if ($attendance->save()) {
                $status = "success";
            }
            else{
                $status = "failed";
            } 
        }

        elseif(attendance::where('student_id',$key["student_table_id"])
        ->where('class_id', $key["class_id"])
        ->where('stream_id', $key["stream_id"])
        ->where('section_name', $key["section_name"])
        ->where('date', $key["date"])->exists() ){
            $status = "duplicate";
            return response()->json($status);
        }
           
          
        }
        return response()->json($status);
    }

    public function viewAttendance($class_id, $stream_id, $section, $date){
        $status = null;
        error_log($class_id."-".$stream_id."-".$section."-".$date); 
    //     $user_id = Auth::user()->user_id;
    //     $employee = employee::where('employee_id',$user_id)->first();
    //     $employee_id = employee::where('employee_id',$user_id)->value('id');
    //     $home_room = home_room::where('employee_id',$employee_id)->first();
    //    // $stream_id = stream::where('stream_type',$home_room->stream)->value('id');
    //     $stream_id = home_room::where('employee_id',$employee_id)->value('stream_id');

        $student_attendance = DB::table('attendances')
                                ->join('students','attendances.student_id','=','students.id')
                                ->join('classes','attendances.class_id','=','classes.id')
                                ->join('streams','attendances.stream_id','=','streams.id')
                                ->where('attendances.class_id',$class_id)
                                ->where('attendances.stream_id',$stream_id)
                                ->where('attendances.section_name',$section)
                                ->where('date',$date)
                                ->get([DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name'),
                                     'students.student_id', 'attendances.student_id as student_table_id',
                                     'classes.class_label','stream_type','attendances.section_name','status','date'
                                    ,'attendances.stream_id','attendances.class_id','semister_id','academic_calendar']);
        error_log($student_attendance);
        // if (isset($student_attendance)) {
        //     $status = "success";
        //     return response()->json(['status'=>$status,'student_attendance'=>$student_attendance]);

        // } elseif (!isset($student_attendance)) {

        //     $status = "failed";
        //     return response()->json(['status'=>$status]);
        // }
        return response()->json($student_attendance);
    }

    public function viewAttendanceForSpecificDate($class_id, $stream_id, $section, $date){
        $status = null;

        // $user_id = Auth::user()->user_id;
        // $employee = employee::where('employee_id',$user_id)->first();
        // $employee_id = employee::where('employee_id',$user_id)->value('id');
        // $home_room = home_room::where('employee_id',$employee_id)->first();
        // //$stream_id = stream::where('stream_type',$home_room->stream)->value('id');
        // $stream_id = home_room::where('employee_id',$employee_id)->value('stream_id');

        $student_attendance = null;

        // $student_attendance = DB::table('attendances')
        //                         ->join('students','attendances.student_id','=','students.id')
        //                         ->join('classes','attendances.class_id','=','classes.id')
        //                         ->join('streams','attendances.stream_id','=','streams.id')
        //                         ->where('attendances.class_id',$home_room->class_id)
        //                         ->where('attendances.stream_id',$stream_id)
        //                         ->where('attendances.section_name',$home_room->section)
        //                         ->where('date',$date)
        //                         ->get([DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name'),
        //                              'students.student_id',
        //                              'classes.class_label','stream_type','attendances.section_name','status','date']);
            
        if ( DB::table('attendances')
        ->join('students','attendances.student_id','=','students.id')
        ->join('classes','attendances.class_id','=','classes.id')
        ->join('streams','attendances.stream_id','=','streams.id')
        ->where('attendances.class_id',$class_id)
        ->where('attendances.stream_id',$stream_id)
        ->where('attendances.section_name',$section)
        ->where('date',$date)->exists() ) {

            $student_attendance = DB::table('attendances')
            ->join('students','attendances.student_id','=','students.id')
            ->join('classes','attendances.class_id','=','classes.id')
            ->join('streams','attendances.stream_id','=','streams.id')
            ->where('attendances.class_id',$class_id)
            ->where('attendances.stream_id',$stream_id)
            ->where('attendances.section_name',$section)
            ->where('date',$date)
            ->get([DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name'),
                 'students.student_id','attendances.student_id as student_table_id',
                 'classes.class_label','stream_type','attendances.section_name','status','date',
                 'attendances.stream_id','attendances.class_id','semister_id','academic_calendar']);

                 $status = "success";
                 return response()->json(['status'=>$status,'student_attendance'=>$student_attendance]);
        }
        else{
            $status = "failed";
            return response()->json(['status'=>$status,'student_attendance'=>$student_attendance]);
        }
        // if (isset($student_attendance)) {
        //     $status = "success";
        //     return response()->json(['status'=>$status,'student_attendance'=>$student_attendance]);

        // } elseif (!isset($student_attendance)) {

        //     $status = "failed";
        //     return response()->json(['status'=>$status]);
        // }
    }

    public function editStudentAttendanceForSpecificDate($student_id, $class_id, $stream_id, $section, $academic_calendar, $semister_id, $date, $status, $new_status){
        $student_attendance_detail = attendance::where('student_id',$student_id)
                                     ->where('class_id',$class_id)
                                     ->where('stream_id',$stream_id)
                                     ->where('section_name',$section)
                                     ->where('academic_calendar',$academic_calendar)
                                     ->where('semister_id',$semister_id)
                                     ->where('date',$date)
                                     ->where('status',$status)
                                     ->first();

            error_log("hellooo");
            error_log($student_attendance_detail);

        $student_attendance_detail->student_id = $student_id;
        $student_attendance_detail->class_id = $class_id;
        $student_attendance_detail->stream_id = $stream_id;
        $student_attendance_detail->section_name = $section;
        $student_attendance_detail->status = $new_status;
        $student_attendance_detail->date = $date;
        $student_attendance_detail->semister_id = $semister_id;
        $student_attendance_detail->academic_calendar = $academic_calendar;
        $status = "failed";
        if ($student_attendance_detail->save()) {
            $status = "success";
        }

        return response()->json($status);
    }

    public function indexHomeRoomAttendance(){
        $now1 = \Andegna\DateTimeFactory::now();
        $current_date = $now1->format(DATE_COOKIE)/*->getDay()."-".$now1->getMonth()."-".$now1->getYear()*/;

        if ( strlen($now1->getMonth()) < 2 ) {
            
            $current_year_month = $now1->getYear()."-0".$now1->getMonth();
            
        } else{
            $current_year_month = $now1->getYear()."-".$now1->getMonth();
            
        }

        
        return view('admin.attendance.home_room_attendance')->with('current_date',$current_date)
                    ->with('current_year_month',$current_year_month);
    }

    public function getHomeRoomAttendance($year_month){

       // $all_sections = section::distinct()->get(['class_id','stream_id','section_name']);
        $all_sections = DB::table('sections')
                            ->join('classes','sections.class_id','=','classes.id')
                            ->join('streams','sections.stream_id','=','streams.id')
                            ->distinct()
                            ->orderBy('class_id','asc')
                            ->orderBy('stream_id','asc')
                            ->orderBy('section_name','asc')
                            ->get(['class_id','stream_id','section_name']);

        $now1 = \Andegna\DateTimeFactory::now();

        $current_date = null;
        if ( strlen($now1->getMonth()) < 2 ) {
            
            $current_date = $now1->getYear()."-0".$now1->getMonth()."-".$now1->getDay();
            
        } else{
            $current_date = $now1->getYear()."-".$now1->getMonth()."-".$now1->getDay();
            
        }

        $home_attendance_status = collect([]);
        

        foreach ($all_sections as $key) {
            
            if (
                attendance::where('class_id',$key->class_id)->where('stream_id',$key->stream_id)->
                            where('section_name',$key->section_name)->where('date',$current_date)->exists()
            ) {

                $class_label = classes::where('id',$key->class_id)->value('class_label');
                $stream_type = stream::where('id',$key->stream_id)->value('stream_type');


                if (DB::table('home_rooms')
                ->join('employees','home_rooms.employee_id','=','employees.id')
                ->where('class_id',$key->class_id)
                ->where('stream_id',$key->stream_id)
                ->where('section',$key->section_name)
                ->exists()) {
                    
                                    $home_room_teacher_data = DB::table('home_rooms')
                                            ->join('employees','home_rooms.employee_id','=','employees.id')
                                            ->where('class_id',$key->class_id)
                                            ->where('stream_id',$key->stream_id)
                                            ->where('section',$key->section_name)
                                            ->first();

                                            $home_attendance_status->push([
                                                'teacher_id'=>$home_room_teacher_data->employee_id,
                                                'teacher_name'=>$home_room_teacher_data->first_name." ".$home_room_teacher_data->middle_name." ".$home_room_teacher_data->last_name,
                                                'class_label'=>$class_label,
                                                'stream_type'=>$stream_type,
                                                'section_name'=>$key->section_name,
                                                'status'=>"checked"
                                            ]);
                }

                elseif (!DB::table('home_rooms')
                ->join('employees','home_rooms.employee_id','=','employees.id')
                ->where('class_id',$key->class_id)
                ->where('stream_id',$key->stream_id)
                ->where('section',$key->section_name)
                ->exists()) {
                    $home_attendance_status->push([
                        'teacher_id'=>'no home room teacher assigned',
                        'teacher_name'=>'no home room teacher assigned',
                        'class_label'=>$class_label,
                        'stream_type'=>$stream_type,
                        'section_name'=>$key->section_name,
                        'status'=>"checked"
                    ]);
                }

               
            }

            elseif (
                !attendance::where('class_id',$key->class_id)->where('stream_id',$key->stream_id)->
                where('section_name',$key->section_name)->where('date',$current_date)->exists()
            ) {
                $class_label = classes::where('id',$key->class_id)->value('class_label');
                $stream_type = stream::where('id',$key->stream_id)->value('stream_type');

                if (DB::table('home_rooms')
                ->join('employees','home_rooms.employee_id','=','employees.id')
                ->where('class_id',$key->class_id)
                ->where('stream_id',$key->stream_id)
                ->where('section',$key->section_name)
                ->exists()) {
                    
                                    $home_room_teacher_data = DB::table('home_rooms')
                                            ->join('employees','home_rooms.employee_id','=','employees.id')
                                            ->where('class_id',$key->class_id)
                                            ->where('stream_id',$key->stream_id)
                                            ->where('section',$key->section_name)
                                            ->first();

                                            $home_attendance_status->push([
                                                'teacher_id'=>$home_room_teacher_data->employee_id,
                                                'teacher_name'=>$home_room_teacher_data->first_name." ".$home_room_teacher_data->middle_name." ".$home_room_teacher_data->last_name,
                                                'class_label'=>$class_label,
                                                'stream_type'=>$stream_type,
                                                'section_name'=>$key->section_name,
                                                'status'=>"unchecked"
                                            ]);
                }

                elseif (!DB::table('home_rooms')
                ->join('employees','home_rooms.employee_id','=','employees.id')
                ->where('class_id',$key->class_id)
                ->where('stream_id',$key->stream_id)
                ->where('section',$key->section_name)
                ->exists()) {
                    $home_attendance_status->push([
                        'teacher_id'=>'no home room teacher assigned',
                        'teacher_name'=>'no home room teacher assigned',
                        'class_label'=>$class_label,
                        'stream_type'=>$stream_type,
                        'section_name'=>$key->section_name,
                        'status'=>"unchecked"
                    ]);
                }
                // $home_room_teacher_data = DB::table('home_rooms')
                //                                 ->join('employees','home_rooms.employee_id','=','employees.id')
                //                                 ->where('class_id',$key->class_id)
                //                             ->where('stream_id',$key->stream_id)
                //                             ->where('section',$key->section_name)
                //                                 ->first();
                // $home_attendance_status->push([
                //     'teacher_id'=>$home_room_teacher_data->employee_id,
                //     'teacher_name'=>$home_room_teacher_data->first_name." ".$home_room_teacher_data->middle_name." ".$home_room_teacher_data->last_name,
                //     'class_label'=>$class_label,
                //     'stream_type'=>$stream_type,
                //     'section_name'=>$key->section_name,
                //     'status'=>"unchecked"
                // ]);
            }
        }

      // $grouped = $home_room_teacher_data->groupBy('class_label');

        return response()->json($home_attendance_status);
    }

    
}
