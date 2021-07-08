<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\home_room;
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


class TeacherController extends Controller
{
    //
    public function form()
    {
        $employee = DB::table('employees')

        ->join('employee_job_positions', 'employees.employee_job_position_id', '=', 'employee_job_positions.id')
        ->where('position_name', 'Teacher')
        ->get(['employees.id','employees.first_name','middle_name','last_name',]);
        return view('admin.teacher.teacher');
    }
    public function store()
    {
        $this->insertAcademicBackgroundInfo();
        $this->insertTrainingInstitutionInfo();
        $this->insertTeacher();
        //$this->insertHomeRoom();
        $this->insertTeacherCourseLoad();
        return view('admin.teacher.teacher');
    }
    public function update($id)
    {
        $first_name = Request('first_name');

        $employee = employee::find($id);

        $address = address::find($employee->address_id);
        $address->city = request('City');
        $address->subcity = request('sub_city');
        $address->email = request('email');
        $address->kebele = request('Kebele');
        $address->p_o_box = request('POBox');
        $address->phone_number = request('phone1');
        $address->alternative_phone_number = request('phone2');
        $address->house_number = request('house_number');
        $address->update();    

        $employee_religion = employee_religion::find($employee->employee_religion_id);
        $employee_religion->religion_name = request('employee_religion');
        $employee_religion->update();

        $employee_emergency_contact = employee_emergency_contact::find($employee->employee_emergency_contact_id);
        $employee_emergency_contact->contact_name = request('emergency_contact');
        $employee_emergency_contact->relation = request('relation');
        $employee_emergency_contact->update();

        $job_position = employee_job_position::find($employee->employee_job_position_id);
        $job_position->position_name = request('job_position');
        $job_position->update();

        $employee_job_experience = employee_job_experience::find($employee->job_experience_id);
        $employee_job_experience->past_job_position = request('past_job_position');
        $employee_job_experience->past_employee_place = request('past_employment_place');
        $employee_job_experience->update();

        $employee->first_name = request('first_name');
        $employee->middle_name = request('middle_name');
        $employee->last_name = request('last_name');
        $employee->gender = request('gender');
        $employee->birth_date =request('birth_date');
        $employee->education_status =request('education_status');
        $employee->nationality =request('nationality');
        $employee->marrage_status =request('marriage_status');
        $employee->hired_date =request('hired_date');
        $employee->special_skill =request('special_skill');
        $employee->net_salary =request('net_salary');
        $employee->hire_type =request('hire_type');
        $employee->job_trainning =request('job_trainning');
        $employee->update();
      
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
        
  

        return redirect('listTeacher');
    }

    //     $teacher = teacher::find($id);

        //  $academic_background = academic_background_info::find($teacher->academic_background_id);
        //  $academic_background->field_of_study = request('field_of_study');
        //  $academic_background->place_of_study = request('place_of_study');
        //  $academic_background->date_of_study = request('date_of_study');
        //  $academic_background->update();
        
        //  $training_institution_info = training_institution_info::find($teacher->teacher_training_info_id);
        // $training_institution_info->teacher_traning_program = request('teacher_traning_program');
        // $training_institution_info->teacher_traning_year = request('teacher_traning_year');
        // $training_institution_info->teacher_traning_institute = request('teacher_traning_institute');
        // $training_institution_info->update();
        
        //  $teacher->id = request('teacher_name');
        //  $teacher->debut_as_a_teacher = request('debut_as_a_teacher');
        //  $teacher->update();

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
        $academic_background_fk = academic_background_info::latest('created_at')->pluck('id')->first();
        $training_institution_info_fk = training_institution_info::latest('created_at')->pluck('id')->first();
     
        $teacher = new teacher();
        $teacher->id = request('select_teacher');
        $teacher->academic_backgroud_id = $academic_background_fk;
        $teacher->teacher_training_info_id = $training_institution_info_fk;
        $teacher->subject_id = 1;
        $teacher->course_load_id = 1;
        $teacher->debut_as_a_teacher = request('debut_as_a_teacher');
        $teacher->save();

    }
}
