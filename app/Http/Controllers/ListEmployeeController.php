<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\employee;
use App\Models\employee_emergency_contact;
use App\Models\employee_job_experience;
use App\Models\employee_job_position;
use App\Models\employee_religion;
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
        $edit_employee = employee::where('id', $id)->first();
        $edit_address = address::where('id', $edit_employee->address_id)->first();
        $edit_emp_emergency = employee_emergency_contact::where('id', $edit_employee->employee_emergency_contact_id)->first();
        $edit_job_position = employee_job_position::where('id', $edit_employee->employee_job_position_id)->first();
       $job_position = employee_job_position::all();
        $edit_job_experience = employee_job_experience::where('id', $edit_employee->job_experience_id)->first();
        $edit_emp_religion = employee_religion::where('id', $edit_employee->employee_religion_id)->first();
        $edit_all = employee_religion::all();
        $teacher = teacher::where('id',$id)->first();
        // return $edit_employee;
    
        
        return view('admin.employee.employee_registration')->with('edit_employee', $edit_employee)->with('edit_address', $edit_address)->with('edit_emp_emergency', $edit_emp_emergency)
        ->with('edit_job_position', $edit_job_position)->with('edit_job_experience', $edit_job_experience)->with('edit_emp_religion', $edit_emp_religion)->with('teacher',$teacher)->with('edit_all',$edit_all)->with('job_position',$job_position);
    }

    public function findEmployee()
    {
        $employee = employee::find(Request('employee_id'));
        $job = employee_job_position::where('id', $employee->employee_job_position_id)->first();
        echo $job->position_name;
        return view('admin.teacher.teacher')->with('employee', $employee)->with('job', $job);
    }
    public function removeEmployee($id)
    {
        $delete_employee = employee::find($id);
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
