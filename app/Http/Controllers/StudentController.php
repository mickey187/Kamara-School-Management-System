<?php

namespace App\Http\Controllers;
use App\Models\address;
use App\Models\classes;
use App\Models\employee;
use App\Models\Role;
use App\Models\User;
use App\Models\section;
use App\Models\semister;
use App\Models\stream;
use App\Models\student_background;
use App\Models\student_medical_info;
use App\Models\students_parent;
use App\Models\student;
use App\Models\student_class_transfer;
use App\Models\student_enrolment;
use App\Models\student_mark_list;
use App\Models\teacher;
use App\Models\student_payment_load;
use App\Models\payment_type;
use App\Models\payment_load;
use App\Models\student_emergency_contact;
use App\Models\student_transport_info;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class StudentController extends Controller{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function generateDocx(){


    }

    public function index(){
        $all_class = classes::all();
        $all_stream = stream::all();
        $all_role = Role::all();
        return view('admin.student.add_student_form')->with('classes',$all_class)->with('streams',$all_stream)->with('role',$all_role);
        //  return view('admin.student.add_student')->with('classes',$all_class)->with('streams',$all_stream)->with('role',$all_role);

    }

    public function insert(Request $req){
        // return $req;              
                $validated = $req->validate([
                    // student info 1st page
                    'studentFirstName' => 'required|max:30|min:2',
                    'studentMiddleName' => 'required|max:30|min:2',
                    'studentLastName' => 'required|max:30|min:2',
                    'studentGender' => 'required',
                    'studentGrade' =>'required',
                    'studentStream' => 'required',
                    'studentBirthDate' => 'required',
                    'studentLanguage' => 'required|min:2',
                    'studentKindergarten' => 'required',
                    'studentDayCareProgram' => 'required',
                    'studentAcademicYear' => 'required',
                    'studentCitizenship' => "nullable|min:2",
                    'studentCountryOfBirth' => "nullable|min:2",
                    'studentStateOfBirth' => "nullable|min:2",

                    //student academic background
                    'academicTransferReason' => "nullable|min:2",
                    'academicSuspension' => "nullable|min:2",
                    'academicExpulsion' => "nullable|min:2",
                    'academicSpecialEducation' => "nullable|min:2",
                    'academicPreviousSchool' => "nullable|min:2",
                    'academicPreviousSchoolCity' => "nullable|min:2",
                    'academicPreviousSchoolState' => "nullable|min:2",
                    'academicPreviousSchoolCountry' => "nullable|min:2",                   
                    'academicMedicalCondtion' => "nullable|min:2",
                    'academicBloodType' => "nullable|min:1",
                    
                    // parent info 3rd page
                    'parentFirstName' => 'required|max:30',
                    'parentMiddleName' => 'required|max:30',
                    'parentLastName' => 'required|max:30',
                    'parentGender' => 'required',
                    'parentRelation' => 'required',              
                    'parentSchoolClosurePriority' => "nullable|min:1",
                    'parentEmergencyContactPriority' => "nullable|min:1",

                    //1st parent address info 3rd page
                    'parentKebele' => 'required',
                    'parentMobilePhoneNo' => 'required|min:10|max:13',
                    'parentUnit' => "nullable|min:1",
                    'parentState' => "nullable|min:2",
                    'parentCountry' => "nullable|min:2",
                    'parentHouseNo' => "nullable|min:2",
                    'parentPOBOX' => "nullable|min:2",
                    'parentEmail' => "nullable|min:2",
                    'parentHomePhoneNo' => "nullable|min:10|max:13",
                    'parentWorkPhoneNo' => "nullable|min:10|max:13",

                    // parent 2 info 3rd page
                    'parentFirstName2' => "nullable|min:2|max:20",
                    'parentMiddleName2' => "nullable|min:2|max:20",
                    'parentLastName2' => "nullable|min:2|max:20",
                    'birthDate2' => "nullable|min:2|max:20",
                    'parentGender2' => "nullable|min:1|max:10",
                    'parentRelation2' => "nullable|min:2",
                    'parentSchoolClosurePriority2' => "nullable|min:1",
                    'parentEmergencyContactPriority2' => "nullable|min:1",

                    //2nd parent address info 3rd page
                    'parentUnit2' => "nullable|min:1",
                    'parentState2' => "nullable|min:1",
                    'parentCountry2' => "nullable|min:1",
                    'parentKebele2' => "nullable|min:1",
                    'parentHouseNo2' => "nullable|min:1",
                    'parentPOBOX2' => "nullable|min:1",
                    'parentEmail2' => "nullable|min:2",
                    'parentHomePhoneNo2' => "nullable|min:10|max:13",
                    'parentWorkPhoneNo2' => "nullable|min:10|max:13",
                    'parentMobilePhoneNo2' => "nullable|min:10|max:13",

                    // parent 3 info 3rd page
                    'parentFirstName3' => "nullable|min:2|max:20",
                    'parentMiddleName3' => "nullable|min:2|max:20",
                    'parentLastName3' => "nullable|min:2|max:20",
                    'birthDate3' => "nullable|min:2|max:20",
                    'parentGender3' => "nullable|min:1",
                    'parentRelation3' => "nullable|min:2",
                    'parentSchoolClosurePriority3' => "nullable|min:1",
                    'parentEmergencyContactPriority3' => "nullable|min:1",

                    //3rd parent address info 3rd page
                    'parentUnit3' => "nullable|min:1",
                    'parentState3' => "nullable|min:1",
                    'parentCountry3' => "nullable|min:1",
                    'parentKebele3' => "nullable|min:1",
                    'parentHouseNo3' => "nullable|min:1",
                    'parentPOBOX3' => "nullable|min:1",
                    'parentEmail3' => "nullable|min:2",
                    'parentHomePhoneNo3' => "nullable|min:10|max:13",
                    'parentWorkPhoneNo3' => "nullable|min:10|max:13",
                    'parentMobilePhoneNo3' => "nullable|min:10|max:13",

                    // emergency information 4th page
                    'emergencyFirstName' => 'required|max:30',
                    'emergencyMiddleName' => 'required|max:30',
                    'emergencyLastName' => 'required|max:30',
                    'emergencyGender' => 'required',
                    'emergencyPhoneNo' => 'required|min:10|max:13',

                    // emergency2 information 4th page
                    'emergencyFirstName2' => "nullable|min:2|max:20",
                    'emergencyMiddleName2' => "nullable|min:2|max:20",
                    'emergencyLastName2' => "nullable|min:2|max:20",
                    'emergencyGender2' => "nullable|min:2|max:20",
                    'emergencyPhoneNo2' => "nullable|min:10|max:13",

                    // emergency3 information 4th page
                    'emergencyFirstName3' => "nullable|min:2|max:20",
                    'emergencyMiddleName3' => "nullable|min:2|max:20",
                    'emergencyLastName3' => "nullable|min:2|max:20",
                    'emergencyGender3' => "nullable|min:2|max:20",
                    'emergencyPhoneNo3' => "nullable|min:10|max:13",

                    // transportation & gurdian info 5th page
                    'transportType' => 'required|max:40',
                    'transportFirstName' => 'required|max:30',
                    'transportMiddleName' => 'required|max:30',
                    'transportLastName' => 'required|max:30',
                    'transportGender' => 'required',
                    'transportPhoneNo' => 'required|min:10|max:13',

                    // transportation 2 & gurdian info 5th page
                    'transportType2' => "nullable|min:2|max:20",
                    'transportFirstName2' => "nullable|min:2|max:20",
                    'transportMiddleName2'=> "nullable|min:2|max:20",
                    'transportLastName2' => "nullable|min:2|max:20",
                    'transportGender2' => "nullable|min:1|max:20",
                    'transportPhoneNo2' => "nullable|min:10|max:13",

                    // transportation 3 & gurdian info 5th page
                    'transportType3' => "nullable|min:1|max:20",
                    'transportFirstName3' => "nullable|min:1|max:20",
                    'transportMiddleName3' => "nullable|min:1|max:20",
                    'transportLastName3' => "nullable|min:1|max:20",
                    'transportGender3' => "nullable|min:1|max:20",
                    'transportPhoneNo3' => "nullable|min:10|max:13",
                ]);
            if ($validated) {
                $student = array(
                'first_name' => $req->studentFirstName,
                'middle_name' => $req->studentMiddleName,
                'last_name' => $req->studentLastName,
                'birth_date' => $req->studentBirthDate,
                'gender' => $req->studentGender,
                'image' => $req->image,
                'class' => $req->studentGrade,
                'stream' => $req->studentStream,
                'role' => 4,
                'transport' => 'no'//$req->transport
                );

                $student_class_transfer = array(
                    'average' =>0,
                    'class' =>$req->studentGrade,
                    'academic_year' =>$req->studentAcademicYear
                );
                $student_background = array(
                    'transfer_reason' => $req->academicTransferReason,
                    'suspension_status' => $req->academicSuspension,
                    'expulsion_status' => $req->academicExpulsion,
                    'special_education' => $req->academicSpecialEducation,
                    'previous_school' => $req->academicPreviousSchool,
                    'previous_school_city' => $req->academicPreviousSchoolCity,
                    'previous_school_state' => $req->academicPreviousSchoolState,
                    'previous_school_country' => $req->academicPreviousSchoolCountry,
                    'citizenship' => $req->studentCitizenship,
                    'native_tongue' => $req->studentLanguage,
                    'day_care_program' => $req->studentDayCareProgram,
                    'kinder_garten' => $req->studentKindergarten,
                    'country_of_birth' => $req->studentCountryOfBirth,
                    'state_of_birth' => $req->studentStateOfBirth,

                );

                $student_medical_info = array(
                    'disablity' => '',
                    'medical_condtion' => $req->academicMedicalCondtion,
                    'blood_type' => $req->academicBloodType,
                );

                $parent1 = array(
                    'first_name' => $req->parentFirstName,
                    'middle_name' => $req->parentMiddleName,
                    'last_name' => $req->parentLastName,
                    'birth_date' => $req->birthDate,
                    'gender' => $req->parentGender,
                    'relation' => $req->parentRelation,
                    'role' => 5,
                    'school_closur_priority' => $req->parentSchoolClosurePriority,
                    'emergency_contact_priority' => $req->parentEmergencyContactPriority,
                );

                $parent2 = array(
                    'first_name' => $req->parentFirstName2,
                    'middle_name' => $req->parentMiddleName2,
                    'last_name' => $req->parentLastName2,
                    'birth_date' => $req->birthDate2,
                    'gender' => $req->parentGender2,
                    'relation' => $req->parentRelation2,
                    'role' => 5,
                    'school_closur_priority' => $req->parentSchoolClosurePriority2,
                    'emergency_contact_priority' => $req->parentEmergencyContactPriority2,
                );

                $parent3 = array(
                    'first_name' => $req->parentFirstName3,
                    'middle_name' => $req->parentFirstName3,
                    'last_name' => $req->parentLastName3,
                    'birth_date' => $req->birthDate3,
                    'gender' => $req->parentGender3,
                    'relation' => $req->parentRelation3,
                    'role' => 5,
                    'school_closur_priority' => $req->parentSchoolClosurePriority3,
                    'emergency_contact_priority' => $req->parentEmergencyContactPriority3,
                );

                $address1 = array(
                    'unit' => $req->parentUnit,
                    'city' => $req->parentState,
                    'country' => $req->parentCountry,
                    'kebele' => $req->parentKebele,
                    'houseNumber' => $req->parentHouseNo,
                    'p_o_box' => $req->parentPOBOX,
                    'email' => $req->parentEmail,
                    'home_phone_number' => $req->parentHomePhoneNo,
                    'work_phone_number' => $req->parentWorkPhoneNo,
                    'phone_number' =>$req->parentMobilePhoneNo
                );

                $address2 = array(
                    'unit' => $req->parentUnit2,
                    'city' => $req->parentState2,
                    'country' => $req->parentCountry2,
                    'kebele' => $req->parentKebele2,
                    'houseNumber' => $req->parentHouseNo2,
                    'p_o_box' => $req->parentPOBOX2,
                    'email' => $req->parentEmail2,
                    'home_phone_number' => $req->parentHomePhoneNo2,
                    'work_phone_number' => $req->parentWorkPhoneNo2,
                    'phone_number' =>$req->parentMobilePhoneNo2
                );
                $address3 = array(
                    'unit' => $req->parentUnit3,
                    'city' => $req->parentState3,
                    'country' => $req->parentCountry3,
                    'kebele' => $req->parentKebele3,
                    'houseNumber' => $req->parentHouseNo3,
                    'p_o_box' => $req->parentPOBOX3,
                    'email' => $req->parentEmail3,
                    'home_phone_number' => $req->parentHomePhoneNo3,
                    'work_phone_number' => $req->parentWorkPhoneNo3,
                    'phone_number' =>$req->parentMobilePhoneNo3
                );

                $emergency1 = array(
                    'first_name' => $req->emergencyFirstName,
                    'middle_name' => $req->emergencyMiddleName,
                    'last_name' => $req->emergencyLastName,
                    'gender' => $req->emergencyGender,
                    'phone' => $req->emergencyPhoneNo
                );

                $emergency2 = array(
                    'first_name' => $req->emergencyFirstName2,
                    'middle_name' => $req->emergencyMiddleName2,
                    'last_name' => $req->emergencyLastName2,
                    'gender' => $req->emergencyGender2,
                    'phone' => $req->emergencyPhoneNo2
                );

                $emergency3 = array(
                    'first_name' => $req->emergencyFirstName3,
                    'middle_name' => $req->emergencyMiddleName3,
                    'last_name' => $req->emergencyLastName3,
                    'gender' => $req->emergencyGender3,
                    'phone' => $req->emergencyPhoneNo3
                );

                $transport1 = array(
                    'transport_type' => $req->transportType,
                    'first_name' => $req->transportFirstName,
                    'middle_name' => $req->transportMiddleName,
                    'last_name' => $req->transportLastName,
                    'gender' => $req->transportGender,
                    'phone' => $req->transportPhoneNo
                );

                $transport2 = array(
                    'transport_type' => $req->transportType2,
                    'first_name' => $req->transportFirstName2,
                    'middle_name' => $req->transportMiddleName2,
                    'last_name' => $req->transportLastName2,
                    'gender' => $req->transportGender2,
                    'phone' => $req->transportPhoneNo2
                );
                $transport3 = array(
                    'transport_type' => $req->transportType3,
                    'first_name' => $req->transportFirstName3,
                    'middle_name' => $req->transportMiddleName3,
                    'last_name' => $req->transportLastName3,
                    'gender' => $req->transportGender3,
                    'phone' => $req->transportPhoneNo3
                );


                $this->insertStudentBackgroud($student_background);
                $this->insertStudentMedicalInfo($student_medical_info);
                $this->insertStudent($student, $req);
                $this->insertStudentClassTransfer($student_class_transfer);
                $this->insertAddress($address1);
                $this->insertParent($parent1);
                if ($parent2['first_name'] && $parent2['middle_name'] && $parent2['last_name']) {
                    $this->insertAddress($address2);
                    $this->insertParent($parent2);
                }
                if ($parent3['first_name'] && $parent3['middle_name'] && $parent3['last_name']) {
                    $this->insertAddress($address3);
                    $this->insertParent($parent3);
                }
                $this->insertEmegency($emergency1);
                if ($emergency2['first_name'] && $emergency2['middle_name'] && $emergency2['last_name']) {
                    $this->insertEmegency($emergency2);
                }
                if ($emergency3['first_name'] && $emergency3['middle_name'] && $emergency3['last_name']) {
                    $this->insertEmegency($emergency3);
                }
                $this->insertTransport($transport1);
                if ($transport2['first_name'] && $transport2['middle_name'] && $transport2['last_name']) {
                    $this->insertTransport($transport2);
                }
                if ($transport3['first_name'] && $transport3['middle_name'] && $transport3['last_name']) {
                    $this->insertTransport($transport3);
                }
            }  

                $all_class = classes::all();
                $all_stream = stream::all();
                $all_role = Role::all();
                return view('admin.student.add_student_form')->with('classes', $all_class)->with('streams', $all_stream)->with('role', $all_role);
            
            
            
    }

    public function retrive($id){
        $student = DB::table('students')
        ->join('student_medical_infos', 'student_medical_infos.id', '=', 'students.student_medical_info_id')
        ->join('student_backgrounds', 'student_backgrounds.id', '=', 'students.student_background_id')
        ->where('students.id', $id)
        ->get(
            [
            'students.id',
            'students.first_name',
            'students.middle_name',
            'students.last_name',
            'students.gender',
            'students.birth_year',
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
    
       
             return view('admin.student.edit_student')->with('stud',$student);
    }

    public function retriveAll(){
        $student_list = student::all();
        //$stud_sec = classes::all();
        $stud_sec = DB::table('students')
        ->join('student_backgrounds','students.student_background_id','=','student_backgrounds.id')
        ->join('student_medical_infos','students.student_medical_info_id','=','student_medical_infos.id')
        ->join('classes','students.class_id','=','classes.id')
        ->join('streams','streams.id','=','students.stream_id')
        ->join('sections','students.id','=','sections.student_id')
       // ->join('streams','sections.stream_id','=','streams.id')
        ->get([
            'students.id',
            'students.student_id',
            'students.first_name',
            'students.middle_name',
            'students.last_name',
            'students.gender',
            'students.image',
            'classes.class_label',
            'stream_type',
            'section_name',
            'disablity',
            'medical_condtion',
            'blood_type',
            'transfer_reason',
            'suspension_status',
            'expulsion_status',
            'previous_special_education',
            'citizenship',
            'previous_school',
            'native_tongue',
            'birth_year'
        ]);
        return view('admin.student.view_student')->with('student_list',$stud_sec);
    }

    public function update(Request $req, $id){
        $student = student::find($id);
        error_log("Medical Info ID: ".$student->student_medical_info_id);

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
        $student_medical_info->medical_condtion = Request('medicalCondtion');
        $student_medical_info->blood_type = Request('bloodType');
        $student_medical_info->update();

        $student->first_name = Request('firstName');
        $student->middle_name = Request('middleName');
        $student->last_name = Request('lastName');
        $student->gender = Request('gender');
        $student->birth_year = Request('birthDate');
        $student->update();
        // $student_list = student::all();
        // return view('admin.student.view_student')->with('student_list',$student_list);
        $stud_sec = DB::table('students')
        ->join('student_backgrounds','students.student_background_id','=','student_backgrounds.id')
        ->join('student_medical_infos','students.student_medical_info_id','=','student_medical_infos.id')
        ->join('classes','students.class_id','=','classes.id')
        ->join('streams','streams.id','=','students.stream_id')
        ->join('sections','students.id','=','sections.student_id')
       // ->join('streams','sections.stream_id','=','streams.id')
        ->get([
            'students.id',
            'students.student_id',
            'students.first_name',
            'students.middle_name',
            'students.last_name',
            'students.gender',
            'students.image',
            'classes.class_label',
            'stream_type',
            'section_name',
            'disablity',
            'medical_condtion',
            'blood_type',
            'transfer_reason',
            'suspension_status',
            'expulsion_status',
            'previous_special_education',
            'citizenship',
            'previous_school',
            'native_tongue',
            'birth_year'
        ]);
        return view('admin.student.view_student')->with('student_list',$stud_sec);
    }

    public function delete($id){
        echo "Student With ID = ".$id." will delete soon";
    }

    public function enroll(){
        $students = DB::table('students')
            ->join('classes','classes.id','=','students.class_id')
            ->join('streams','students.stream_id','=','streams.id')
            ->join('student_class_transfers','student_class_transfers.student_id','=','students.id')
            ->get([
                    'students.student_id','students.id','first_name','middle_name','last_name',
                    'class_label','status','stream_type','gender','image'
                ]);
        return view('admin.student.student_enrolment')->with('students',$students);
    }

    public function register($var){
        $id = str_replace(' ', '', $var);
         $student = student::where('id',$id)->get();
         $student_class = student_class_transfer::where('student_id',$id)->first();
           $student_class_tran = student_class_transfer::find($student_class->id);
            $student_class_tran->status = "Registered";
            $student_class_tran->isRegistered = true;
            $student_class_tran->update();
            $this->insertEnrollment($id);
        return response()->json($student_class);
    }

    public function findStudent(){
        $all_class = classes::all();
        $student = student::where('student_id',request('student_id'))->first();
        $students = DB::table('students')
                ->join('classes','classes.id','=','students.class_id')
                ->join('streams','classes.stream_id','=','streams.id')
                ->get();
        if($student){
            $class = classes::where('id',$student->class_id)->first();
            if($class){
                $section = section::where('id',$class->section_id)->first();
                return view('admin.student.student_enrolment')
                ->with('student',$student)
                ->with('class',$class)
                ->with('section',$section)
                ->with('all_class',$all_class)
                ->with('students',$students);
            }else{
                return view('admin.student.student_enrolment')
                ->with('student',$student)
                ->with('all_class',$all_class)
                ->with('students',$students);
            }
        }else{
            echo 'no student found with ID ='.request('student_id');
        }

    }

    public function insertAddress($data){
        $address = new Address();
        $address->city = $data['city'];
        $address->unit = $data['unit'];
        $address->email = $data['email'];
        $address->kebele = $data['kebele'];
        $address->p_o_box = $data['p_o_box'];
        $address->home_phone_number = $data['home_phone_number'];
        $address->work_phone_number = $data['work_phone_number'];
        $address->phone_number = $data['phone_number'];
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
        $parent->parent_id = $this->idGeneratorFun();
        $parent->student = $student_fk;
        $parent->save();
        error_log("Role--------------------------".$data['role']);
        $this->addUserAccount($data['first_name'],$parent->parent_id,$data['role']);
    }
    public function insertStudentBackgroud($data){
        $studentBackground = new student_background();
        $studentBackground->transfer_reason = $data['transfer_reason'];
        $studentBackground->suspension_status = $data['suspension_status'];
        $studentBackground->expulsion_status = $data['expulsion_status'];
        $studentBackground->citizenship = $data['citizenship'];
        $studentBackground->state_of_birth = $data['state_of_birth'];
        $studentBackground->country_of_birth = $data['country_of_birth'];
        $studentBackground->previous_school = $data['previous_school'];
        $studentBackground->previous_school_city = $data['previous_school_city'];
        $studentBackground->previous_school_state = $data['previous_school_state'];
        $studentBackground->previous_school_country = $data['previous_school_country'];
        $studentBackground->daycare_program = $data['day_care_program'];
        $studentBackground->kindengarten = $data['kinder_garten'];
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

        $generate_id = $this->idGeneratorFun();
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
        // $student->image = $data['image'];
        if (!$req->image == '') {
            # code...
            if($req->image->getClientOriginalName()){
                $ext =$req->image->getClientOriginalExtension();
                $image = $data['first_name'].'_'.$data['middle_name'].'_'.$data['last_name'].$generate_id.'.'.$ext;
                $req->image->storeAs('public/student_image',$image);
            }else{
                $image = null;
            }
        }else{
            $image = null;

        }

        $student->image = $image;
        $student->class_id = $data['class'];
        $student->stream_id = $data['stream'];
        $student->student_id = $generate_id;
        $student->save();




        $this->addUserAccount($data['first_name'],$student->student_id,$data['role']);
        $this->registerStudentForPayment($student->id,$data["class"],$req->transport);
    }

    public function insertStudentClassTransfer($data){
        $student_fk = student::latest('created_at')->pluck('id')->first();
        $studentTransfer = new student_class_transfer();
        $studentTransfer->student_id = $student_fk;
        $studentTransfer->yearly_average = $data['average'];
        $studentTransfer->transfered_from = $data['class'];
        $studentTransfer->transfered_to = $data['class'];
        $studentTransfer->academic_year = $data['academic_year'];
        $studentTransfer->status = 'on load';
        $studentTransfer->isRegistered = false;
        $studentTransfer->save();
    }

    public function insertEnrollment($id){
        $student = student::where('id',$id)->first();
        $student_class_transfer = student_class_transfer::where('student_id',$id)->first();
        $enrollment = new student_enrolment();
        $enrollment->class_id = $student->class_id;
        $enrollment->student_id = $id;
        $enrollment->student_class_transfer_id =  $student_class_transfer->id;
        $enrollment->acadamic_year = $student_class_transfer->academic_year;
        $enrollment->save();
    }

    public function insertEmegency($data){
        $studentEmergencyContact = new student_emergency_contact();
        $studentEmergencyContact->first_name = $data['first_name'];
        $studentEmergencyContact->middle_name = $data['middle_name'];
        $studentEmergencyContact->last_name = $data['last_name'];
        $studentEmergencyContact->gender = $data['gender'];
        $studentEmergencyContact->phone_number = $data['phone'];
        $studentEmergencyContact->save();
    }
    public function insertTransport($data){
        $studentTranspartation = new student_transport_info();
        $studentTranspartation->transportation_type = $data['transport_type'];
        $studentTranspartation->first_name = $data['first_name'];;
        $studentTranspartation->middle_name = $data['middle_name'];
        $studentTranspartation->last_name = $data['last_name'];
        $studentTranspartation->gender = $data['gender'];
        $studentTranspartation->phone_number = $data['phone'];
        $studentTranspartation->save();
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

    function getStudent(Request $req, $id){
        $student = student::where('id',$id)->get();
        return response()->json($student);
    }

    public function getStudentGender(){
        $gender_of_students = array();
        array_push($gender_of_students, student::where('gender','M')->count());
        array_push($gender_of_students, student::where('gender','F')->count());
        return response()->json($gender_of_students);
    }
    function adminDashboard(){

        $number_of_students = student::all()->count();
        $number_of_employees = employee::all()->count();
        $number_of_teachers = DB::table('employees')
                                    ->join('employee_job_positions','employees.employee_job_position_id','=','employee_job_positions.id')
                                    ->where('position_name','Teacher')
                                    ->count();

        return view('admin.dashboard')->with('number_of_students',$number_of_students)
        ->with('number_of_employees',$number_of_employees)->with('number_of_teachers',$number_of_teachers);
    }
    function marklist($id){
        $mark =  DB::table('student_mark_lists')
        ->join('students','students.id','=','student_mark_lists.student_id')
        ->join('assasment_types','assasment_types.id','=','student_mark_lists.assasment_type_id')
        ->join('subjects','subjects.id','=','student_mark_lists.subject_id')
        ->where('student_mark_lists.student_id',$id)->get();
        //$mark = student_mark_list::where('student_id',$id)->get();
        $student = student::where('id',$id)->first();
         return view('admin.student.marklist')->with('mark', $mark)->with('student',$student);
    }
    function studentScore($id){
        $mark =  DB::table('student_mark_lists')
        ->join('students','students.id','=','student_mark_lists.student_id')
        ->join('assasment_types','assasment_types.id','=','student_mark_lists.assasment_type_id')
        ->join('subjects','subjects.id','=','student_mark_lists.subject_id')
        ->where('student_mark_lists.student_id',$id)->get();
        //$mark = student_mark_list::where('student_id',$id)->get();
        // $student = student::where('id',$id)->first();
        $student = DB::table('students')
                ->join('classes','students.class_id','=','classes.id')
                ->join('streams','students.stream_id','=','streams.id')
                ->where('students.id',$id)->get()->first();

         return view('parent.marklist')->with('mark', $mark)->with('student',$student);
    }

    function teacherMarklist($id){
        $count_term = 0;
        $term = '';
        $semister = 0;
        $allTerm = array();
        $mark =  DB::table('student_mark_lists')
        ->join('students','students.id','=','student_mark_lists.student_id')
        ->join('assasment_types','assasment_types.id','=','student_mark_lists.assasment_type_id')
        ->join('subjects','subjects.id','=','student_mark_lists.subject_id')
        ->join('semisters','student_mark_lists.semister_id','=','semisters.id')
        ->where('student_mark_lists.student_id',$id)->get();
        $student = student::where('id',$id)->first();
        $user_id =  Auth::id();
        $user = User::find($user_id);
        $employee = employee::where('employee_id',$user->user_id)->first();
        foreach($mark as $row){
            if($term == '' && $semister == 0 ){
                $term = $row->term;
                $semister = $row->semister;
                $count_term = $count_term + 1;
                array_push($allTerm,'Semister '.$semister.' '. $term);
            }else if($term == $row->term && $semister == $row->semister){
                continue;
            }else{
                $term = $row->term;
                $semister = $row->semister;
                $count_term = $count_term + 1;
                array_push($allTerm,'Semister '.$semister.' '. $term);
            }

        }
       // return $allTerm;
        return view('teacher.marklist')->with('mark', $mark)->with('student',$student)->with('employee',$employee)->with('total_term',$allTerm);
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


public function registerStudentForPayment($stud_id, $class_id, $bool){

    if ($bool == 'yes') {
        //register for transport
    $payment_type_id = payment_type::where('payment_type','Transportation Fee')->pluck('id');
    $payment_load_id = payment_load::where('class_id',$class_id)->where('payment_type_id',$payment_type_id[0])
                                     ->pluck('id');
    $student_payment_load = new student_payment_load();
    $student_payment_load->student_id = $stud_id;
    $student_payment_load->payment_load_id = $payment_load_id[0];
    $student_payment_load->save();

    //registration payment
    $payment_type_id_2 = payment_type::where('payment_type','Registration Fee')->pluck('id');
    $payment_load_id_2 = payment_load::where('class_id',$class_id)->where('payment_type_id',$payment_type_id_2[0])
                                     ->pluck('id');
    $student_payment_load = new student_payment_load();
    $student_payment_load->student_id = $stud_id;
    $student_payment_load->payment_load_id = $payment_load_id_2[0];
    $student_payment_load->save();

    //register for tuition fee
    $payment_type_id_4 = payment_type::where('payment_type','Tuition Fee')->pluck('id');
    $payment_load_id_4 = payment_load::where('class_id',$class_id)->where('payment_type_id',$payment_type_id_4[0])
                                     ->pluck('id');
    $student_payment_load = new student_payment_load();
    $student_payment_load->student_id = $stud_id;
    $student_payment_load->payment_load_id = $payment_load_id_4[0];
    $student_payment_load->save();

    //register for book fee
    $payment_type_id_3 = payment_type::where('payment_type','Book Fee')->pluck('id');
    $payment_load_id_3 = payment_load::where('class_id',$class_id)->where('payment_type_id',$payment_type_id_3[0])
                                     ->pluck('id');
    $student_payment_load = new student_payment_load();
    $student_payment_load->student_id = $stud_id;
    $student_payment_load->payment_load_id = $payment_load_id_3[0];
    $student_payment_load->save();
    }

    elseif ($bool == 'no') {

        //registration payment
    $payment_type_id_2 = payment_type::where('payment_type','Registration Fee')->pluck('id');
    $payment_load_id_2 = payment_load::where('class_id',$class_id)->where('payment_type_id',$payment_type_id_2[0])
                                     ->pluck('id');
    $student_payment_load = new student_payment_load();
    $student_payment_load->student_id = $stud_id;
    $student_payment_load->payment_load_id = $payment_load_id_2[0];
    $student_payment_load->save();

    //register for tuition fee
    $payment_type_id_4 = payment_type::where('payment_type','Tuition Fee')->pluck('id');
    $payment_load_id_4 = payment_load::where('class_id',$class_id)->where('payment_type_id',$payment_type_id_4[0])
                                     ->pluck('id');
    $student_payment_load = new student_payment_load();
    $student_payment_load->student_id = $stud_id;
    $student_payment_load->payment_load_id = $payment_load_id_4[0];
    $student_payment_load->save();

    //register for book fee
    $payment_type_id_3 = payment_type::where('payment_type','Book Fee')->pluck('id');
    $payment_load_id_3 = payment_load::where('class_id',$class_id)->where('payment_type_id',$payment_type_id_3[0])
                                     ->pluck('id');
    $student_payment_load = new student_payment_load();
    $student_payment_load->student_id = $stud_id;
    $student_payment_load->payment_load_id = $payment_load_id_3[0];
    $student_payment_load->save();
    }

}
}

