<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\employee_job_experience;
use App\Models\employee_religion;
use App\Models\employee_job_position;
use App\Models\employee_emergency_contact;
use App\Models\address;
use App\Models\employee;
use App\Models\academic_background_info;
use App\Models\attendance;
use App\Models\classes;
use App\Models\course_load;
use App\Models\section;
use App\Models\stream;
use App\Models\subject;
use App\Models\teacher_course_load;
use App\Models\training_institution_info;
use App\Models\teacher;
use Illuminate\Support\Facades\DB;

class ListTeacherController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


     public function listTeacher(){
        $teach_list= DB::table('teachers')
                 ->join('academic_background_infos','teachers.academic_background_id','=','academic_background_infos.id')
                 ->join('employees','employees.id','=','teachers.id')
                ->get(['first_name','middle_name','last_name','teachers.id','field_of_study','place_of_study','date_of_study']);
        $subject = subject::all();
        $class = classes::all();
        $stream = stream::all();
        $course_load = DB::table('course_loads')
                         ->join('classes','course_loads.class_id','=','classes.id')
                         ->join('streams','course_loads.stream_id','=','streams.id')
                         ->join('subject_groups','course_loads.subject_group_id','=','subject_groups.id')
                         ->join('subjects','subject_groups.subject_id','=','subjects.id')
                         ->get();
        //echo $teach_list;
                 return view('admin.teacher.listTeacher')->with('teach_list',$teach_list)->with('subject',$subject)->with('stream',$stream)->with('course_load',$course_load)
                 ->with('class',$class);
    }
    public function teacher_classes($id){
        $teacher = teacher::where('id',$id)->get();
        return "Teacher Classes. Teacher ID=".$teacher;
    }

    public function getTeacher($id){

       $edit_employee = employee::where('id', $id)->first();
        $edit_address = address::where('id', $edit_employee->address_id)->first();
        $edit_emp_emergency = employee_emergency_contact::where('id', $edit_employee->employee_emergency_contact_id)->first();
        $edit_job_position = employee_job_position::where('id', $edit_employee->employee_job_position_id)->first();
        $edit_job_experience = employee_job_experience::where('id', $edit_employee->job_experience_id)->first();
        $edit_emp_religion = employee_religion::where('id', $edit_employee->employee_religion_id)->first();

        return view('admin.teacher.edit_teacher')->with('edit_employee', $edit_employee)->with('edit_address', $edit_address)->with('edit_emp_emergency', $edit_emp_emergency)
        ->with('edit_job_position', $edit_job_position)->with('edit_job_experience', $edit_job_experience)->with('edit_emp_religion', $edit_emp_religion);
       // ->with('edit_training_info',$edit_training_info)->with('course_load',$course_load);
    }

    public function deleteTeacher($id){
        $delete_teacher = teacher::find($id);
        $delete_academic_background = academic_background_info::find($delete_teacher->academic_background_id);
        $delete_academic_background->delete();
        // $delete_training_info = training_institution_info::find($delete_teacher->teacher_training_info_id);
        // $delete_training_info->delete();
        $delete_teacher->delete();

        echo $id.' deleted successfuly';
            $teach_list= DB::table('teachers')
                 ->join('academic_background_infos','teachers.academic_background_id','=','academic_background_infos.id')
                 ->join('employees','employees.id','=','teachers.id')
                ->get(['first_name','middle_name','last_name','teachers.id','field_of_study','place_of_study','date_of_study']);

                 return view('admin.teacher.listTeacher')->with('teach_list',$teach_list);


    }

    public function getHomeRoomStream($class){
        $section = DB::table('sections')
                    ->join('streams','sections.stream_id','=','streams.id')
                    ->distinct('stream_type')
                    ->where('class_id',$class)
                    ->get(['stream_type','stream_id']);
        return response()->json($section);
    }


    public function getHomeRoomSection($class,$stream){
        $section2 = DB::table('sections')
                    ->join('streams','sections.stream_id','=','streams.id')
                    // ->join('classes','sections.class_id','=','classes.id')
                    ->where('sections.stream_id',$stream)
                    ->where('sections.class_id',$class)
                    ->distinct('section_name')
                    ->get(['sections.section_name']);
        return response()->json($section2);
    }
}



        // echo $id.' deleted successfuly';
        // $emp_list = DB::table('employees')
        //                         ->join('employee_job_positions', 'employees.employee_job_position_id', '=', 'employee_job_positions.id')
        //                         ->get(['first_name','middle_name','last_name','gender','position_name','hire_type','hired_date','employees.id']);

        // return view('admin.employee.listEmployee')->with('emp_list', $emp_list);
