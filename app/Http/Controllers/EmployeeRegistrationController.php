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

class EmployeeRegistrationController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

      public function form(){
          $edit_job_position = employee_job_position::all();
          $job_position = employee_job_position::all();
          $employee_religion = employee_religion::all();
          $edit_all = employee_religion::all();
          $edit_role = Role::all();
          $edit_all_role = Role::all();
          return view('admin.employee.employee_registration')->with('edit_job_position',$edit_job_position)
           ->with('job_position',$job_position)
           ->with('employee_religion',$employee_religion)->with('edit_all',$edit_all)->with('edit_role',$edit_role)
           ->with('edit_all_role',$edit_all_role);

      }

    //
    public function store(Request $req){
        if(Request('job_position')==='1'){
            // $this->insertRole();
            $this->insertAddress();
            $this->insertEmergencyContact();
            $this->insertEmployeeJobExperience();
            $this->insertEmployee();
            //inserting employee before ;
            //inserting teacher
            $this->insertAcademicBackgroundInfo();
            $this->insertTrainingInstitutionInfo();
            $this->insertTeacher();
            //$this->insertHomeRoom();
            $this->insertTeacherCourseLoad();
             $edit_job_position = employee_job_position::all();
            $job_position = employee_job_position::all();
            $employee_religion = employee_religion::all();
            $edit_role = Role::all();
            $edit_all_role = Role::all();
            $edit_all_religion = employee_religion::all();
               return view('admin.employee.employee_registration')->with('edit_job_position',$edit_job_position)
                     ->with('job_position',$job_position)->with('employee_religion',$employee_religion)
                    ->with('edit_all',$edit_all_religion)->with('edit_role',$edit_role)->with('edit_all_role',$edit_all_role);
           // return view('admin.employee.employee_registration');
        }else{
            // $this->insertRole();
            $this->insertAddress();
            $this->insertEmergencyContact();
            $this->insertEmployeeJobExperience();
            $this->insertEmployee();
             //return redirect('/addEmployee');
            $edit_job_position = employee_job_position::all();
            $job_position = employee_job_position::all();
            $employee_religion = employee_religion::all();
            $edit_role = Role::all();
            $edit_all_role = Role::all();
            $edit_all_religion = employee_religion::all();
               return view('admin.employee.employee_registration')->with('edit_job_position',$edit_job_position)
                     ->with('job_position',$job_position)->with('employee_religion',$employee_religion)
                    ->with('edit_all',$edit_all_religion)->with('edit_role',$edit_role)->with('edit_all_role',$edit_all_role);
        }

    }


    public function update($id){
    //    $first_name = Request('first_name');

        $employee = employee::find($id);

        $role = Role::find($employee->role_id);
        $role->role_name = request('employee_role');
        $role->update();

        $religion = employee_religion::find($employee->employee_religion_id );
        $religion->religion_name = request('employee_religion');
        $religion->update();

        $address = address::find($employee->address_id);
        $address->city = request('City');
        $address->unit = request('emp_unit');
        $address->email = request('email');
        $address->kebele = request('Kebele');
        $address->p_o_box = request('POBox');
        $address->phone_number = request('phone_number');
        $address->home_phone_number = request('home_phone_number');
        $address->house_number = request('house_number');
        $address->update();



        $employee_emergency_contact = employee_emergency_contact::find($employee->employee_emergency_contact_id);
        $employee_emergency_contact->contact_name = request('emergency_contact');
        $employee_emergency_contact->relation = request('relation');
        $employee_emergency_contact->update();

         $employee_job_experience = employee_job_experience::find($employee->job_experience_id);
         $employee_job_experience->past_job_position = request('past_job_position');
         $employee_job_experience->past_employee_place = request('past_employment_place');
         $employee_job_experience->update();

        $employee->first_name = request('first_name');
        $employee->middle_name = request('middle_name');
        $employee->last_name = request('last_name');
        $employee->gender = request('gender');
        $employee->birth_date = request('birth_date');
        $employee->education_status =request('education_status');
        $employee->nationality =request('citizen');
        $employee->marrage_status =request('marriage_status');
        $employee->hired_date =request('hired_date');
        $employee->special_skill =request('special_skill');
        $employee->net_salary =request('net_salary');
        $employee->hire_type =request('hire_type');
        $employee->job_trainning =request('job_trainning');
         $employee->employee_job_position_id = request('job_position');
        $employee->update();
        if(request('job_position') == '1'){
            $teacher = teacher::find($employee->id);
            //echo $employee->id ;
            $academic_background = academic_background_info::find($teacher->academic_background_id);
            $academic_background->field_of_study = request('field_of_study');
            $academic_background->place_of_study = request('place_of_study');
            $academic_background->date_of_study = request('date_of_study');
            $academic_background->update();

            $training_institution_info = training_institution_info::find($teacher->teacher_training_info_id);
            $training_institution_info->teacher_traning_program = request('teacher_traning_program');
            $training_institution_info->teacher_traning_year = request('teacher_traning_year');
            $training_institution_info->teacher_traning_institute = request('teacher_traning_institute');
            $training_institution_info->update();

            $teacher->debut_as_a_teacher = request('debut_as_a_teacher');
            $teacher->update();
        }


       return redirect('listEmployee');

    }
    public function insertReligion(){
        $religion = new employee_religion();
        $religion->religion_name = request('religion_name');
        $religion->save();
    }
    public function insertRole(){
        $role = new Role();
        $role->role_name = request('role_name');
        //  return request('role_name');
        $role->save();
    }

     public function insertAddress(){
        $address = new Address();
        $address->city = request('City');
        $address->unit = request('unit');
        $address->email = request('email');
        $address->kebele = request('Kebele');
        $address->p_o_box = request('POBox');
        $address->phone_number = request('phone_number');
        $address->home_phone_number = request('home_phone_number');
        $address->house_number = request('house_number');
        $address->save();
    }



public function insertEmergencyContact(){

$employee_emergency_contact = new employee_emergency_contact();
$employee_emergency_contact->contact_name = request('emergency_contact');
$employee_emergency_contact->relation = request('relation');
$employee_emergency_contact->save();
}

public function insertEmployeeJobExperience(){

    $address_fk = Address::latest('created_at')->pluck('id')->first();
    $employee_job_experience = new employee_job_experience();
    $employee_job_experience->past_job_position = request('past_job_position');
     $employee_job_experience->past_employee_place = request('past_employment_place');
     $employee_job_experience->address_id = $address_fk;

     if($employee_job_experience->save()){
     }

}
public function insertEmployee(){
    $role_fk = Role::latest('created_at')->pluck('id')->first();
    $job_experience_fk = employee_job_experience::latest('created_at')->pluck('id')->first();
    $employee_religion_fk = employee_religion::latest('created_at')->pluck('id')->first();
    $employee_emergency_contact_fk = employee_emergency_contact::latest('created_at')->pluck('id')->first();
    $employee_job_position_fk = employee_job_position::latest('created_at')->pluck('id')->first();
    $address_fk = Address::latest('created_at')->pluck('id')->first();

        $employee = new employee();
        $employee->role_id = request('employee_role');
        $employee->job_experience_id   = $job_experience_fk;
        $employee->employee_religion_id  = request('employee_religion');
        $employee->employee_emergency_contact_id  = $employee_emergency_contact_fk;
        $employee->employee_job_position_id  = request('job_position');
        $employee->address_id = $address_fk;

        $employee->employee_id = $this->idGeneratorFun();
        $employee->first_name = request('first_name');
        $employee->middle_name = request('middle_name');
        $employee->last_name = request('last_name');
        $employee->gender = request('gender');
        $employee->birth_date =request ('birth_date');
        $employee->education_status =request('education_status');
        $employee->nationality =request('citizen');
        $employee->marrage_status =request('marriage_status');
        $employee->hired_date =request('hired_date');
        $employee->previous_employment =request('previous_employment');
        $employee->special_skill =request('special_skill');
        $employee->net_salary =request('net_salary');
        $employee->hire_type =request('hire_type');
        $employee->job_trainning =request('job_trainning');

        $employee->save();
        $this->addUserAccount(request('first_name'),$employee->employee_id,$employee->role_id);
}
public function insertAcademicBackgroundInfo(){
        $academic_background = new academic_background_info();
        $academic_background->field_of_study = request('field_of_study');
         $academic_background->place_of_study = request('place_of_study');
         $academic_background->date_of_study = request('date_of_study');
         $academic_background->save();

    }
    public function insertTrainingInstitutionInfo(){
        $training_institution_info = new training_institution_info();
        $training_institution_info->teacher_traning_program = request('teacher_traning_program');
        $training_institution_info->teacher_traning_year = request('teacher_traning_year');
        $training_institution_info->teacher_traning_institute = request('teacher_traning_institute');
        $training_institution_info->save();
    }
    public function insertHomeRoom(){
        $section_fk = section::latest('created_at')->pluck('id')->first();
         $class_fk = classes::latest('created_at')->pluck('id')->first();
          $stream_fk = stream::latest('created_at')->pluck('id')->first();
           $employee_fk = employee::latest('created_at')->pluck('id')->first();
            $attendance_fk = attendance::latest('created_at')->pluck('id')->first();
    }
    public function insertTeacherCourseLoad(){
        $section_fk = section::latest('created_at')->pluck('id')->first();
        $subject_fk = subject::latest('created_at')->pluck('id')->first();

    }
    public function insertTeacher(){
        $subject_fk = subject::latest('created_at')->pluck('id')->first();
        $teacher_course_load_fk = teacher_course_load::latest('created_at')->pluck('id')->first();
        $employee_id_fk = employee::latest('created_at')->pluck('id')->first();
        $academic_background_fk = academic_background_info::latest('created_at')->pluck('id')->first();
        $training_institution_info_fk = training_institution_info::latest('created_at')->pluck('id')->first();

        $teacher = new teacher();
        $teacher->id = $employee_id_fk;
        $teacher->academic_background_id = $academic_background_fk;
        $teacher->teacher_training_info_id = $training_institution_info_fk;
        // $teacher->subject_id = 3;
        // $teacher->course_load_id = 3;
        // $teacher->teacher_id = $this->idGeneratorFun();
        $teacher->debut_as_a_teacher = request('debut_as_a_teacher');
        $teacher->save();

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
}
