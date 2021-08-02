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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all_class = classes::all();
        $all_stream = stream::all();
        $all_role = Role::all();
         return view('admin.student.add_student')->with('classes',$all_class)->with('streams',$all_stream)->with('role',$all_role);

    }

    public function insert(Request $req){

        $student = array(
            'first_name' => $req->firstName,
            'middle_name' => $req->middleName,
            'last_name' => $req->lastName,
            'birth_date' => $req->birthDate,
            'gender' => $req->gender,
            'image' => $req->image,
            'class' => $req->grade,
            'stream' => $req->stream,
            'role' => $req->role
        );
        echo request('class');
        $student_class_transfer = array(
            'average' =>request('average'),
            'class' =>request('grade'),
            'academic_year' =>request('academic_year'),
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
            $this->insertStudentClassTransfer($student_class_transfer);
            $all_class = classes::all();
            $all_stream = stream::all();
            $all_role = Role::all();
            return view('admin.student.add_student')->with('classes',$all_class)->with('streams',$all_stream)->with('role',$all_role);

        }else{

            $this->insertStudentBackgroud($student_background);
            $this->insertStudentMedicalInfo($student_medical_info);
            $this->insertStudent($student,$req);
            $this->insertStudentClassTransfer($student_class_transfer);
            $this->insertAddress($addres);
            $this->insertParent($parent);
            $all_class = classes::all();
            $all_stream = stream::all();
            $all_role = Role::all();
            return view('admin.student.add_student')->with('classes',$all_class)->with('streams',$all_stream)->with('role',$all_role);
        }

    }

    public function retrive($id){
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
            'section_name'
        ]);
        return view('admin.student.view_student')->with('student_list',$stud_sec);
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
        // $student->image = $data['image'];
        if($req->image->getClientOriginalName()){
            $ext =$req->image->getClientOriginalExtension();
            $image = $data['first_name'].'_'.$data['middle_name'].'_'.$data['last_name'].date('YmdHis').rand(0,99999).'.'.$ext;
            $req->image->storeAs('public/student_image',$image);
        }else{
            $image='';
        }
        $student->image = $image;
        $student->class_id = $data['class'];
        $student->stream_id = $data['stream'];
        $student->student_id = $this->idGeneratorFun();
        $student->save();
        $this->addUserAccount($data['first_name'],$student->student_id,$data['role']);
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
    // public function idGeneratorFun(){
    //     $fourRandomDigit = rand(1000,9999);
    //     $student = student::get(['id']);
    //     foreach($student as $row){
    //         if($row->id==$fourRandomDigit){
    //             $this->idGeneratorFun();
    //         }
    //     }
    //     return $fourRandomDigit;
    // }

    public function idGeneratorFun(){
        $fourRandomDigit = rand(1000,9999);
        $student = student::get(['id']);
        $teacher = teacher::get(['id']);

        foreach($student as $row){
            if($row->id==$fourRandomDigit){
                $this->idGeneratorFun();
            }
        }
        foreach($teacher as $row){
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
    function adminDashboard(){
        return view('admin.dashboard');
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
}

