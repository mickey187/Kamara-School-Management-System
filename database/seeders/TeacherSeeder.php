<?php

namespace Database\Seeders;

use App\Models\academic_background_info;
use App\Models\address;
use App\Models\employee;
use App\Models\employee_job_experience;
use App\Models\employee_job_position;
use App\Models\student;
use App\Models\students_parent;
use App\Models\teacher;
use App\Models\training_institution_info;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $address = new address();
        $address->city = 'Nazret';
        $address->kebele = 03;
        $address->house_number = 11455;
        $address->save();

        $employee_job_experience = new employee_job_experience();
        $employee_job_experience->past_job_position = 'Teacher';
        $employee_job_experience->past_employee_place = 'Nazret';
        $employee_job_experience->address_id = $address->id;
        $employee_job_experience->save();

        $employee_posotion = new employee_job_position();
        $employee_posotion->position_name = 'Teacher';
        $employee_posotion->save();

        $employee = new employee();
        $employee->role_id = 3;
        $employee->employee_job_position_id = $employee_posotion->id;
        $employee->job_experience_id   = $employee_job_experience->id;
        $employee->address_id = $address->id;

        $employee->employee_id = $this->idGeneratorFun();
        $employee->first_name = 'Solomon';
        $employee->middle_name = 'Ayele';
        $employee->last_name = 'Alemu';
        $employee->gender = 'Male';
        $employee->education_status ='Dgree';
        $employee->nationality ='Ethiopian';
        $employee->marrage_status ='';
        $employee->hired_date ='05-02-2005'.' to '.'01-01-2015';
        $employee->previous_employment ='Teacher';
        $employee->special_skill ='Teaching';
        $employee->net_salary =12500;
        $employee->hire_type =' Contract';
        $employee->job_trainning ='yes';
        $employee->save();

        $academic_background = new academic_background_info();
        $academic_background->field_of_study ='Applied Maths';
        $academic_background->save();


        $training_institution_info = new training_institution_info();
        $training_institution_info->teacher_traning_program = 'Teaching';
        $training_institution_info->save();

        $teacher = new teacher();
        $teacher->id = $employee->id;
        $teacher->academic_background_id = $academic_background->id;
        $teacher->teacher_training_info_id = $training_institution_info->id;
        $teacher->debut_as_a_teacher = '01-01-2010';
        $teacher->save();
        $this->addUserAccount('Solomon',$employee->employee_id,$employee->role_id);
// SecondTeacher
        // $address = new address();
        // $address->city = 'Bahir Dar';
        // $address->kebele = 11;
        // $address->house_number = 114525;
        // $address->save();

        // $employee_job_experience = new employee_job_experience();
        // $employee_job_experience->past_job_position = 'Teacher';
        // $employee_job_experience->past_employee_place = 'Addis Ababa';
        // $employee_job_experience->address_id = $address->id;
        // $employee_job_experience->save();

        // $employee_posotion = new employee_job_position();
        // $employee_posotion->position_name = 'Teacher';
        // $employee_posotion->save();

        // $employee = new employee();
        // $employee->role_id = 3;
        // $employee->employee_job_position_id = $employee_posotion->id;
        // $employee->job_experience_id   = $employee_job_experience->id;
        // $employee->address_id = $address->id;

        // $employee->employee_id = $this->idGeneratorFun();
        // $employee->first_name = 'Kebede';
        // $employee->middle_name = 'Zeleke';
        // $employee->last_name = 'Kinfe';
        // $employee->gender = 'Male';
        // $employee->education_status ='Dgree';
        // $employee->nationality ='Ethiopian';
        // $employee->marrage_status ='';
        // $employee->hired_date ='05-02-2005'.' to '.'01-01-2015';
        // $employee->previous_employment ='Teacher';
        // $employee->special_skill ='Teaching';
        // $employee->net_salary =12500;
        // $employee->hire_type =' Contract';
        // $employee->job_trainning ='yes';
        // $employee->save();

        // $academic_background = new academic_background_info();
        // $academic_background->field_of_study ='Applied Maths';
        // $academic_background->save();


        // $training_institution_info = new training_institution_info();
        // $training_institution_info->teacher_traning_program = 'Teaching';
        // $training_institution_info->save();

        // $teacher = new teacher();
        // $teacher->id = $employee->id;
        // $teacher->academic_background_id = $academic_background->id;
        // $teacher->teacher_training_info_id = $training_institution_info->id;
        // $teacher->debut_as_a_teacher = '01-01-2010';
        // $teacher->save();
        // $this->addUserAccount('Kebede',$employee->employee_id,$employee->role_id);

    }
    public function idGeneratorFun(){
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
}
