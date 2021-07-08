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
     public function listTeacher(){
        $teach_list= DB::table('teachers')
                 ->join('academic_background_infos','teachers.academic_background_id','=','academic_background_infos.id')
                 ->join('employees','employees.id','=','teachers.id')
                ->get(['first_name','middle_name','last_name','teachers.id','field_of_study','place_of_study','date_of_study']);

        //echo $teach_list;
                 return view('admin.teacher.listTeacher')->with('teach_list',$teach_list);
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
}



        // echo $id.' deleted successfuly';
        // $emp_list = DB::table('employees')
        //                         ->join('employee_job_positions', 'employees.employee_job_position_id', '=', 'employee_job_positions.id')
        //                         ->get(['first_name','middle_name','last_name','gender','position_name','hire_type','hired_date','employees.id']);
                                
        // return view('admin.employee.listEmployee')->with('emp_list', $emp_list);