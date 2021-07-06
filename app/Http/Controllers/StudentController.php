<?php

namespace App\Http\Controllers;
use App\Models\address;
use App\Models\classes;
use App\Models\section;
use App\Models\student_background;
use App\Models\student_medical_info;
use App\Models\students_parent;
use App\Models\student;
use App\Models\student_enrolment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller{

    public function index(){
        $this->idGeneratorFun();
       // return view('admin.student.test');
         return view('admin.student.add_student');

    }

    public function insert(Request $req){

        $student = array(
            'first_name' => $req->firstName,
            'middle_name' => $req->middleName,
            'last_name' => $req->lastName,
            'birth_date' => $req->birthDate,
            'gender' => $req->gender,
            'image' => $req->image,
            'grade' => $req->grade
        );

        $student_background = array(
            'transfer_reason' => $req->transferReason,
            'suspension_status' => $req->sespensionStatus,
            'expulsion_status' => $req->expelsionStatus,
            'special_education' => $req->specialEducation,
            'previous_school' => $req->previousSchool,
            'citizenship' => $req->citizenship,
            'native_tongue' => $req->language,
        );

        $student_medical_info = array(
            'disablity' => $req->disability,
            'medical_condtion' => $req->medicalCondtion,
            'blood_type' => $req->bloodType,
        );

        $parent = array(
            'first_name' => $req->pFirstName,
            'middle_name' => $req->pMiddleName,
            'last_name' => $req->pLastName,
            'birth_date' => $req->birthDate,
            'gender' => $req->pGender,
            'relation' => $req->pRelation,
            'school_closur_priority' => $req->School_Closure_Priority,
            'emergency_contact_priority' => $req->pEmergency,
        );

        $addres = array(
            'city' => $req->pFirstName,
            'subcity' => $req->pMiddleName,
            'kebele' => $req->pLastName,
            'houseNumber' => $req->houseNumber,
            'p_o_box' => $req->p_o_box,
            'email' => $req->pRelation,
            'phone1' => $req->School_Closure_Priority,
            'phone2' => $req->pEmergency,
        );

        if ($req->has('student')) {
            $this->insertStudentBackgroud($student_background);
            $this->insertStudentMedicalInfo($student_medical_info);
            $this->insertStudent($student,$req);
            return view('admin.student.add_student');

        }else{

            $this->insertStudentBackgroud($student_background);
            $this->insertStudentMedicalInfo($student_medical_info);
            $this->insertStudent($student,$req);
            $this->insertAddress($addres);
            $this->insertParent($parent);

         return view('admin.student.add_student');
        }

    }

    public function retrive($id){
        // $student = student::where('id',$id)->first();
        // $medical = student_medical_info::where('id',$student->student_medical_info_id)->first();
        // //DB::table('students')->join('student_medical_infos','students.student_medical_info_id','=','student_medical_infos.id')->where('students.student_medical_info_id',$id)->get();
        // $background = student_background::where('id',$student->student_background_id)->first();
        // //DB::table('students')->join('student_backgrounds','students.student_background_id','=','student_backgrounds.id')->where('students.student_background_id',$id)->first();
        // //echo $background->citizenship;
        $student = DB::table('students')
        ->join('student_medical_infos','student_medical_infos.id','=','students.student_medical_info_id')
        ->join('student_backgrounds','student_backgrounds.id','=','students.student_background_id')
        ->where('students.id',$id)
        ->get([
            'students.id',
            'students.first_name',
            'students.middle_name',
            'students.last_name',
            'students.gender',
            'students.birth_year',
            'students.grade',
            'students.image',
            'student_backgrounds.citizenship',
            'student_backgrounds.previous_school',
            'student_backgrounds.transfer_reason',
            'student_backgrounds.expulsion_status',
            'student_backgrounds.suspension_status',
            'student_backgrounds.native_tongue',
            'student_backgrounds.previous_special_education',
            'student_medical_infos.disablity',
            'student_medical_infos.medical_condtion',
            'student_medical_infos.blood_type']
        );


            //return  $student;
             return view('admin.student.edit_student')->with('stud',$student);

       // return view('admin.student.edit_student')->with('student',$student)->with('medical',$medical)->with('background',$background);
    }

    public function retriveAll(){
        $student_list = student::all();
        $stud_sec = classes::all();
        //$stud_sec = DB::table('students')->join('classes','students.class_id','=','classes.id')->get('class_label');

        return view('admin.student.view_student')->with('student_list',$student_list);
    }

    public function update(Request $req, $id){
        $student = student::find($id);
       // return 'DB ='. $student->id. ' FRONT ='.$id;
        $student_background = student_background::find($student->student_background_id);
        $student_background->transfer_reason = Request('transferReason');
        $student_background->suspension_status = Request('sespensionStatus');
        $student_background->expulsion_status = Request('expelsionStatus');
        $student_background->previous_special_education = Request('specialEducation');
        $student_background->citizenship = Request('citizenship');
        $student_background->previous_school = Request('previousSchool');
        $student_background->native_tongue = Request('language');
        $student_background->update();

        $student_medical_info = student_medical_info::find($student->student_medical_info_id);
        $student_medical_info->disablity = Request('disability');
        $student_medical_info->medical_condition = Request('medicalCondtion');
        $student_medical_info->blood_type = Request('bloodType');
        $student->update();

        $student->first_name = Request('firstName');
        $student->middle_name = Request('middleName');
        $student->last_name = Request('lastName');
        $student->gender = Request('gender');
        $student->birth_year = Request('birthDate');
        $student->update();
        $student_list = student::all();
        return view('admin.student.view_student')->with('student_list',$student_list);
    }

    public function delete($id){
        echo "Student With ID = ".$id." will delete soon";
    }

    public function enroll(){

        // $student_enrollment->acadamic_year = request('acadamic_year');

        return view('admin.student.student_enrolment');
    }

    public function register($id){
        $student = student::find($id);
        $student->class_id = request('transfered');
        $student->save();
        $student_enrollment = new student_enrolment();
        $student_enrollment->acadamic_year = request('acadamic_year');
        error_log('ID = '.$id.' and label = '. request('transfered'));
        return redirect()->route('enrollPage')->withSuccessMessage('Student Enroled');
    }

    public function findStudent(){
        $all_class = classes::all();
        $student = student::where('student_id',request('student_id'))->first();
        if($student){
            $class = classes::where('id',$student->class_id)->first();
            if($class){
                $section = section::where('id',$class->section_id)->first();
                return view('admin.student.student_enrolment')->with('student',$student)->with('class',$class)->with('section',$section)->with('all_class',$all_class);
            }else{
                return view('admin.student.student_enrolment')->with('student',$student)->with('all_class',$all_class);
            }
        }else{
            echo 'no student found with ID ='.request('student_id');
        }

    }

    public function insertAddress($data){
        $address = new Address();
        $address->city = $data['city'];
        $address->subcity = $data['subcity'];
        $address->email = $data['email'];
        $address->kebele = $data['kebele'];
        $address->p_o_box = $data['p_o_box'];
        $address->phone_number = $data['phone1'];
        $address->alternative_phone_number = $data['phone2'];
        $address->house_number = $data['houseNumber'];
        $address->save();

    }
    public function insertParent($data){
        $address_fk = Address::latest('created_at')->pluck('id')->first();
        $student_fk = student::latest('created_at')->pluck('id')->first();
        $parent = new students_parent();
        $parent->first_name = $data['first_name'];
        $parent->middle_name = $data['middle_name'];
        $parent->last_name = $data['last_name'];
        $parent->gender = $data['gender'];
        $parent->relation = $data['relation'];
        $parent->school_closur_priority = $data['school_closur_priority'];
        $parent->emergency_contact_priority = $data['emergency_contact_priority'];
        $parent->address_id = $address_fk;
        $parent->student = $student_fk;
        $parent->save();
    }
    public function insertStudentBackgroud($data){
        $studentBackground = new student_background();
        $studentBackground->transfer_reason = $data['transfer_reason'];
        $studentBackground->suspension_status = $data['suspension_status'];
        $studentBackground->expulsion_status = $data['expulsion_status'];
        $studentBackground->citizenship = $data['citizenship'];
        $studentBackground->previous_school = $data['previous_school'];
        $studentBackground->previous_special_education = $data['special_education'];
        $studentBackground->native_tongue = $data['native_tongue'];
        $studentBackground->save();
    }
    public function insertStudentMedicalInfo($data){
        $studentMedicalInfo = new student_medical_info();
        $studentMedicalInfo->disablity = $data['disablity'];
        $studentMedicalInfo->medical_condtion = $data['medical_condtion'];
        $studentMedicalInfo->blood_type = $data['blood_type'];
        $studentMedicalInfo->save();

    }

    public function insertStudent($data,$req){

        $studentBg_fk = student_background::latest('created_at')->pluck('id')->first();
        $studentMedicalInfo_fk = student_medical_info::latest('created_at')->pluck('id')->first();
        $student = new student();
        $student->student_background_id = $studentBg_fk;
        $student->student_medical_info_id = $studentMedicalInfo_fk;
        $student->first_name = $data['first_name'];
        $student->middle_name = $data['middle_name'];
        $student->last_name = $data['last_name'];
        $student->birth_year = $data['birth_date'];
        $student->gender = $data['gender'];
        $student->grade = $data['grade'];
        // $student->image = $data['image'];
        if($req->image->getClientOriginalName()){
            $ext =$req->image->getClientOriginalExtension();
            $image = $data['first_name'].'_'.$data['middle_name'].'_'.$data['last_name'].date('YmdHis').rand(0,99999).'.'.$ext;
            $req->image->storeAs('public/student_image',$image);
        }else{
            $image='';
        }
        $student->image = $image;

        $student->student_id = $this->idGeneratorFun();
        $student->save();
    }

    public function idGeneratorFun(){
        $fourRandomDigit = rand(1000,9999);
        $student = student::get(['id']);
        foreach($student as $row){
            if($row->id==$fourRandomDigit){
                $this->idGeneratorFun();
            }
        }
        return $fourRandomDigit;
    }
}
