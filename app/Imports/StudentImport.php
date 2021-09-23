<?php

namespace App\Imports;

use App\Models\address;
use App\Models\employee;
use App\Models\student;
use App\Models\student_background;
use App\Models\student_emergency_contact;
use App\Models\student_medical_info;
use App\Models\student_transport_info;
use App\Models\students_parent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StudentImport implements ToModel,WithHeadingRow,WithStartRow{

    public function model(array $row){
        $getSTudentId = $this->idGeneratorFun();
        error_log("=============================================================================");
        $insertStudentBackground = new student_background();
            $insertStudentBackground->transfer_reason = $row['transfer_reason'];
            $insertStudentBackground->suspension_status = $row['suspension_status'];
            $insertStudentBackground->expulsion_status = $row['expulsion_status'];
            $insertStudentBackground->previous_special_education = $row['special_education'];
            $insertStudentBackground->citizenship = $row['country_of_citizenship'];
            $insertStudentBackground->previous_school = $row['previous_school_name'];
            $insertStudentBackground->previous_school_city = $row['previous_school_city'];
            $insertStudentBackground->previous_school_state = $row['previous_school_state'];
            $insertStudentBackground->previous_school_country = $row['previous_school_counrty'];
            $insertStudentBackground->native_tongue = $row['native_tongue'];
            $insertStudentBackground->save();

        $studentMedical = new student_medical_info();
            $studentMedical->blood_type = 'not set';
            $studentMedical->medical_condtion = $row['medical_alert_info'];
            $studentMedical->disablity = 'no';
            $studentMedical->save(); 

        $full_name = explode(" ",$row['student_pickup_guardian']);
        $studentTranspartation = new student_transport_info();
            if (sizeof($full_name) == 3) {
                $studentTranspartation->first_name = $full_name[0];
                $studentTranspartation->middle_name = $full_name[1];
                $studentTranspartation->last_name = $full_name[2];
            }if (sizeof($full_name) == 2) {
                $studentTranspartation->first_name = $full_name[0];
                $studentTranspartation->middle_name = $full_name[1];
                $studentTranspartation->last_name = '';
            }if (sizeof($full_name) == 1) {
                $studentTranspartation->first_name = $full_name[0];
                $studentTranspartation->middle_name = '';
                $studentTranspartation->last_name = '';}
        $studentTranspartation->transportation_type = $row['transportation'];
        $studentTranspartation->phone_number = $row['student_pickup_contact'];
        $studentTranspartation->save();

        $full_name2 = explode(" ",$row['emergency_contact_name']);
        error_log(count($full_name2));
        $studentEmergencyContact = new student_emergency_contact();
        if (count($full_name2) == 3) {
            $studentEmergencyContact->first_name = $full_name2[0];
            $studentEmergencyContact->middle_name = $full_name2[1];
            $studentEmergencyContact->last_name = $full_name2[2];
        }if (count($full_name2) == 2) {
            $studentEmergencyContact->first_name = $full_name2[0];
            $studentEmergencyContact->middle_name = $full_name2[1];
            $studentEmergencyContact->last_name = '';
        }if (count($full_name2) == 1) {
            $studentEmergencyContact->first_name = $full_name2[0];
            $studentEmergencyContact->middle_name = '';
            $studentEmergencyContact->last_name = '';}
        $studentEmergencyContact->gender = $row['emergeny_contact_gender'];
        $studentEmergencyContact->save();

        $address = new address();
            $address->city = $row['city'];
            $address->unit = $row['unit'];
            $address->phone_number = $row['phone_no'];
            $address->home_phone_number = $row['p_home_phone_no'];
            $address->work_phone_number = $row['work_phone'];
            // $address->alternative_phone_number = $row['phone2'];
            $address->kebele = $row['kebele'];
            $address->house_number = $row['house_no'];
            $address->email = $row['email'];
            $address->p_o_box = $row['p_o_box'];
            $address->save();

        $getParentId = $this->idGeneratorFun();
        $insertStudent = new student();
            $insertStudent->student_background_id = $insertStudentBackground->id;
            $insertStudent->student_medical_info_id = $studentMedical->id;
            $insertStudent->student_transport_info_id = $studentTranspartation->id;
            $insertStudent->student_emergency_contact_id  = $studentEmergencyContact->id;
            $insertStudent->first_name = $row['first_name'];
            $insertStudent->middle_name = $row['father_name'];
            $insertStudent->last_name = $row['gfather_name'];
            $insertStudent->class_id=$row['grade'];
            $insertStudent->stream_id=$row['stream'];
            $insertStudent->student_id=$getSTudentId;
            $insertStudent->gender=$row['gender'];
            $insertStudent->birth_year=$row['birth_date'];
            $insertStudent->save();

        $parent = new students_parent();
            $parent->address_id = $address->id;
            $parent->parent_id =  $getParentId;
            $parent->student =  $insertStudent->id;
            $parent->first_name = $row['p_first_name'];
            $parent->middle_name = $row['p_father_name'];
            $parent->last_name = $row['p_gfather_name'];
            $parent->gender = $row['p_gender'];
            $parent->relation = $row['p_relation'];
            $parent->school_closur_priority = $row['school_closure_priority'];
            $parent->emergency_contact_priority = $row['emergeny_contact_priority'];
            $parent->save();


        // $insertStudent = new student([
        //     'student_background_id' => $insertStudentBackground->id,
        //     'student_medical_id' => $studentMedical->id,
        //     'first_name'=>$row['first_name'],
        //     'middle_name'=>$row['father_name'],
        //     'last_name'=>$row['gfather_name'],
        //     'class_id'=>$row['grade'],
        //     'stream_id'=>$row['stream'],
        //     'student_id'=>$getId,
        //     'gender'=>$row['gender'],
        //     'birth_year'=>$row['birth_date']
        // ]);

         $this->addUserAccount($row['first_name'],$getSTudentId,4);
         $this->addUserAccount($row['p_first_name'],$getParentId,5);
        return $insertStudent;
    }


    public function idGeneratorFun(){
        $fourRandomDigit = rand(100000,999999);
        $student = student::get(['student_id']);
        $employee = employee::get(['employee_id']);
        $parent = students_parent::get(['parent_id']);
        foreach($student as $row){
            if($row->id==$fourRandomDigit){
                $this->idGeneratorFun();
            }
        }
        foreach($employee as $row){
            if($row->id==$fourRandomDigit){
                $this->idGeneratorFun();
            }
        }foreach($parent as $row){
            if($row->id==$fourRandomDigit){
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
