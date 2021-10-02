<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\Models\student_background;
use App\Models\student_emergency_contact;
use App\Models\student_medical_info;
use App\Models\student_transport_info;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
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
use App\Models\Role;
use App\Models\section;
use App\Models\stream;
use App\Models\student;
use App\Models\students_parent;
use App\Models\subject;
use App\Models\teacher_course_load;
use App\Models\training_institution_info;
use App\Models\teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class EmployeeImport implements ToModel,WithHeadingRow,WithStartRow
{

    public function model(array $row){

        $address = new Address();
        $address->city = $row['city'];
        // $address->unit = $row['unit'];
        // $address->email = $row['email'];
        $address->kebele = $row['kebele'];
        // $address->p_o_box = $row['POBox'];
        // $address->phone_number = $row['phone_number'];
        // $address->home_phone_number = $row['home_phone_number'];
        $address->house_number = $row['house_number'];
        $address->save();
        $role = null;
        if($row['job_position'] == 'Teacher' || $row['job_position'] == 'teacher'){
            $role = Role::where('role_name',strtolower((string)$row['job_position']))->value('id');
        }else if ($row['job_position']=='Adminster and Finance' || $row['job_position']=='adminster and finance') {
            $role = Role::where('role_name','finance');
        }else if ($row['job_position']=='Asistant teacher' || $row['job_position']=='asistant teacher') {
            $role = Role::where('role_name','asistant teacher');
        }else if ($row['job_position']=='Vice Director' || $row['job_position']=='vice director') {
            $role = Role::where('role_name','vice director');
        }else if ($row['job_position']=='Assistance' || $row['job_position']=='assistance') {
            $role = Role::where('role_name','assistance');
        }else if ($row['job_position']=='Supervisor' || $row['job_position']=='supervisor') {
            $role = Role::where('role_name','supervisor');
        }else if ($row['job_position']=='Secretary' || $row['job_position']=='secretary') {
            $role = Role::where('role_name','secretary');
        }
        // $employee_emergency_contact = new employee_emergency_contact();
        // $employee_emergency_contact->contact_name = $row['emergency_contact'];
        // $employee_emergency_contact->relation = $row['relation'];
        // $employee_emergency_contact->save();

        $employee_job_experience = new employee_job_experience();
        $employee_job_experience->past_job_position = $row['past_employement_place_experience'];
        $employee_job_experience->past_employee_place = $row['other_employement_place_experience'];
        $employee_job_experience->address_id = $address->id;
        $employee_job_experience->save();

        $employee_posotion = new employee_job_position();
        $employee_posotion->position_name = $row['job_position'];
        $employee_posotion->save();

        $employee = new employee();
        $employee->role_id = $role;
        $employee->employee_job_position_id = $employee_posotion->id;
        $employee->job_experience_id   = $employee_job_experience->id;
        $employee->address_id = $address->id;

        $employee->employee_id = $this->idGeneratorFun();
        $employee->first_name = $row['first_name'];
        $employee->middle_name = $row['middle_name'];
        $employee->last_name = $row['last_name'];
        $employee->gender = $row['gender'];
        $employee->education_status =$row['education_status'];
        $employee->nationality ='Ethiopian';
        $employee->marrage_status ='';
        $employee->hired_date =$row['hired_date_from'].' to '.$row['hired_date_to'];
        $employee->previous_employment =$row['other_employement_place_experience'];
        $employee->special_skill =$row['special_skill'];
        $employee->net_salary =$row['net_salary'];
        $employee->hire_type =$row['hire_type'];
        $employee->job_trainning =$row['training'];
        $employee->save();

        if($row['job_position']=='Teacher' || $row['job_position']=='teacher'){
            $academic_background = new academic_background_info();
            $academic_background->field_of_study = $row['education_status'];
            // $academic_background->place_of_study = $row['place_of_study'];
            // $academic_background->date_of_study = $row['date_of_study'];
            $academic_background->save();


            $training_institution_info = new training_institution_info();
            $training_institution_info->teacher_traning_program = $row['training'];
            // $training_institution_info->teacher_traning_year = $row['teacher_traning_year'];
            // $training_institution_info->teacher_traning_institute = $row['teacher_traning_institute'];
            $training_institution_info->save();

            $teacher = new teacher();
            $teacher->id = $employee->id;
            $teacher->academic_background_id = $academic_background->id;
            $teacher->teacher_training_info_id = $training_institution_info->id;
            $teacher->debut_as_a_teacher = $row['hired_date_from'];
            $teacher->save();

        }
        $this->addUserAccount($row['first_name'],$employee->employee_id,$employee->role_id);


        return $employee;
    }

    public function idGeneratorFun(){
        global $idArray;
        $fourRandomDigit = rand(100000,999999);
        $student = student::all();
        $employee = employee::all();
        $parent = students_parent::all();
        foreach($student as $row){
            if($row->student_id == $fourRandomDigit){
                $this->idGeneratorFun();
            }
        }
        foreach($employee as $row){
            if($row->employee_id==$fourRandomDigit){
                $this->idGeneratorFun();
            }
        }foreach($parent as $row){
            if($row->parent_id==$fourRandomDigit){
                $this->idGeneratorFun();
            }
        }

        return $fourRandomDigit;
    }

    function addUserAccount($name, $id,$role_id2){
        $userAccount = new User();
        $userAccount->name = $name.$id;
        $userAccount->user_id = $id;
        $userAccount->email = $name.$id.'@gmail.com';
        $userAccount->password = Hash::make($name.$id);
        $userAccount->save();
        $roleId = $role_id2;
        $userAccount->roles()->attach($roleId);
    }

    public function headingRow():int{
        return 2;
    }

    public function startRow(): int{
        return 3;
    }
}
