<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\employee;
use App\Models\employee_emergency_contact;
use App\Models\employee_job_experience;
use App\Models\employee_job_position;
use App\Models\employee_religion;
use App\Models\Role;
use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListEmployeeController extends Controller
{

    //
    public function listEmployee()
    {
        //$emp_list= employee::all();
        $emp_list = DB::table('employees')
                                ->join('employee_job_positions', 'employees.employee_job_position_id', '=', 'employee_job_positions.id')
                                ->get(['first_name','middle_name','last_name','gender','position_name','hire_type','hired_date','employees.id']);

        return view('admin.employee.listEmployee')->with('emp_list', $emp_list);
    }
    public function getEmployee($id)
    {
        $edit_all_role = Role::all();
        $job_position = employee_job_position::all();
        $edit_all = employee_religion::all();
        $teacher = DB::table('teachers')
        ->join('academic_background_infos','academic_background_infos.id','=','teachers.academic_background_id')
        ->join('training_institution_infos','training_institution_infos.id','=','teachers.teacher_training_info_id')
        ->where('teachers.id',$id)
        ->get([
            'teachers.id as teacher_id','debut_as_a_teacher','teacher_traning_program','teacher_traning_year','teacher_traning_institute',
            'field_of_study','place_of_study','date_of_study'
        ]);

        $employee_data = DB::table('employees')
        ->join('roles','employees.role_id','=','roles.id')
        ->join('addresses','addresses.id','=','employees.address_id')
        ->join('employee_emergency_contacts','employee_emergency_contacts.id','=','employees.employee_emergency_contact_id')
        ->join('employee_job_positions','employee_job_positions.id','=','employees.employee_job_position_id')
        ->join('employee_job_experiences','employee_job_experiences.id','=','employees.job_experience_id')
        ->join('employee_religions','employee_religions.id','=','employees.employee_religion_id')
        ->where('employees.id',$id)
        ->get([
            'employees.id','first_name','middle_name','last_name','gender','birth_date','hired_date',
            'education_status','marrage_status','previous_employment','special_skill','net_salary','relation','role_id','employee_job_position_id',
            'job_trainning','nationality','hire_type','contact_name','past_job_position','past_employee_place','house_number','employee_religion_id',
            'position_name','religion_name','city','subcity','email','kebele','p_o_box','phone_number','alternative_phone_number'
        ]);


         return view('admin.employee.employee_edit')
         ->with('edit_em',$employee_data)
         ->with('teacher_',$teacher)
         ->with('edit_all',$edit_all)
         ->with('job_position',$job_position)
         ->with('edit_all_role',$edit_all_role);
    }

    public function findEmployee()
    {
        $employee = employee::find(Request('employee_id'));
        $job = employee_job_position::where('id', $employee->employee_job_position_id)->first();
        echo $job->position_name;
        return view('admin.teacher.teacher')->with('employee', $employee)->with('job', $job);
    }
    public function removeEmployee()
    {
        //  return request();
          $id = request('delete');
        $delete_employee = employee::find($id);
        $delete_employee_role = Role::find($delete_employee->role_id );
        $delete_employee_role->delete();
        $delete_employee_job_position = employee_job_position::find($delete_employee->employee_job_position_id);
        $delete_employee_job_position->delete();
        $delete_employee_emergency = employee_emergency_contact::find($delete_employee->employee_emergency_contact_id);
        $delete_employee_emergency->delete();
        $delete_employee_experiance = employee_job_experience::find($delete_employee->job_experience_id);
        $delete_employee_experiance->delete();
        $delete_employee_religion = employee_religion::find($delete_employee->employee_religion_id);
        $delete_employee_religion->delete();
        $delete_employee_address = address::find($delete_employee->address_id);
        $delete_employee_address->delete();
        $delete_employee->delete();

         echo $id.' deleted successfuly';
        $emp_list = DB::table('employees')
                                ->join('employee_job_positions', 'employees.employee_job_position_id', '=', 'employee_job_positions.id')
                                ->get(['first_name','middle_name','last_name','gender','position_name','hire_type','hired_date','employees.id']);

        return view('admin.employee.listEmployee')->with('emp_list', $emp_list);
    }
}
