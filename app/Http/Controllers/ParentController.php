<?php

namespace App\Http\Controllers;
use App\Models\address;
use App\Models\classes;
use App\Models\section;
use App\Models\student;
use App\Models\students_parent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Util\Json;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $parent_list = students_parent::all();
        $address = address::where('id',$parent_list->address_id);
        return view('admin.parent.view_parent')->with('parent_list',$parent_list);
    }

    public function insert($id){
        $this->insertAddress();
        $this->insertParent($id);
        $parent_list = students_parent::where('student',$id)->get();
        $student = student::where('id',$id)->first();
        return view('admin.parent.view_student_and_parent')->with('parent_list',$parent_list)->with('student',$student);
    }

    public function retrive($id){
        $student = student::where('id',$id)->first();
        $parent_list = students_parent::where('student',$id)->get();
        return view('admin.parent.view_student_and_parent')->with('parent_list',$parent_list)->with('student',$student);
    }

    public function retriveAll(){
        //$parent_list = students_parent::all();
        $parent_list = DB::table('students_parents')
        ->join('addresses','addresses.id','=','students_parents.address_id')
        ->get();
       //echo $parent_list;
         return view('admin.parent.view_parent')->with('parent_list',$parent_list);
    }

    public function deleteParent(Request $req){
            $parent = students_parent::where('id',$req->delete)->get()->first();
            $student = student::where('id',$parent->student)->first();
            $address = address::find($parent->address_id);
            $address->delete();
            $parent->delete();
            $student = student::where('id',$student->id)->first();
            // $parent_list = students_parent::where('student',$id)->get();
            return "success";
    }

    public function addMore($student_id){
        $id = $student_id;
        return view('admin.parent.add_parent')->with('id',$id);
    }


    public function update($id){
        $edit = students_parent::find($id);

        $sub =array();
        $sub['first_name']=request('firstName');
        $sub['middle_name']=request('middleName');
        $sub['last_name']=request('lastName');
        $sub['gender']=request('gender');
        $sub['relation']=request('pRelation');
        $sub['school_closure_priority']=request('School_Closure_Priority');
        $sub['emergency_contact_priority']=request('pEmergency');
        $edit->update($sub);
        $edit->save();


        $addressEdit = address::find($edit->address_id);
        $subAdd =array();
        $subAdd['city']=request('city');
        $subAdd['subcity']=request('subcity');
        $subAdd['kebele']=request('kebele');
        $subAdd['p_o_box']=request('p_o_box');
        $subAdd['email']=request('email');
        $subAdd['phone_number']=request('phone1');
        $subAdd['alternative_phone_number']=request('phone2');
        $subAdd['house_number']=request('houseNumber');
        $addressEdit->update($subAdd);
        $addressEdit->save();

        $student = student::where('id',$edit->student)->first();
        $parent_list = students_parent::where('student',$student->id)->get();
        //return redirect()->route('studentParentList',$id)->withSuccessMessage('Successfully Updated');
        return view('admin.parent.view_student_and_parent')->with('parent_list',$parent_list)->with('student',$student);
    }

    public function editPage($id){
        $update_address = DB::table('students_parents')->join('addresses','students_parents.address_id','=','addresses.id')->where('students_parents.id',$id)->first();
        echo $update_address->p_o_box;
        $parent_update_list = students_parent::where('id',$id)->first();
        return view('admin.parent.add_parent')->with('parent_update_list',$parent_update_list)->with('update_address',$update_address);
    }

    public function insertAddress(){
        $address = new Address();
        $address->city = request('city');
        $address->subcity = request('subcity');
        $address->email = request('email');
        $address->kebele = request('kebele');
        $address->p_o_box = request('p_o_box');
        $address->phone_number = request('phone1');
        $address->alternative_phone_number = request('phone2');
        $address->house_number = request('houseNumber');
        $address->save();
    }

    public function insertParent($id){
        // echo request('firstName');
        $address_fk = Address::latest('created_at')->pluck('id')->first();
        $student_fk = $id;
        $parent = new students_parent();
        $parent->first_name = request('firstName');
        $parent->middle_name = request('middleName');
        $parent->last_name = request('lastName');
        $parent->gender = request('gender');
        $parent->relation = request('pRelation');
        $parent->school_closur_priority = request('School_Closure_Priority');
        $parent->emergency_contact_priority = request('pEmergency');
        $parent->address_id = $address_fk;
        $parent->student = $student_fk;
        $parent->save();
        $student = student::where('id',$parent->student)->first();
        $parent_list = students_parent::where('student',$student->id)->get();
        return view('admin.parent.view_student_and_parent',compact('student'))->with('parent_list',$parent_list);

    }

    public function ParentDashboard(){
        $parent_id = Auth::user()->user_id;
        $student_id = students_parent::where('parent_id',$parent_id)->value('student');
        $student_info = DB::table('students')
                            ->join('classes','students.class_id','=','classes.id')
                            ->join('sections','students.id','=','sections.student_id')
                            ->where('students.id',$student_id)
                            ->get(["students.student_id",
                            DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name'),"class_label","section_name","students.image"]);
        $student_payment_history = (new FinanceController)->fetchPaymentHistory($student_id);
        
        
        $decoded = json_decode($student_payment_history->content(),true);
     
        $unpaid_bill_counter = 0;
        foreach ($decoded["sliced"] as $key) {
            foreach ($key as $key2) {
                $unpaid_bill_counter++;

            
            }
        }
            
         
        return view('admin.parent.parent_dashboard')->with('unpaid_bill_counter',$unpaid_bill_counter)
                    ->with('student_info',$student_info);
    }

    public function viewParentPaymentDetail(){
        $parent_id = Auth::user()->user_id;
        $student_id = students_parent::where('parent_id',$parent_id)->value('student');
        $student_payment_history = (new FinanceController)->fetchPaymentHistory($student_id);
        
        
        $decoded = json_decode($student_payment_history->content(),true);

        foreach ($decoded["sliced"] as $key) {
            foreach ($key as $key2) {
                
                $year_month_array = array();
                $year_month_array = explode("-",$key2["payment_month"]);
                //print_r($year_month_array);
                //$key2["payment_month"] = "hello";
                //dd($key2["payment_month"]);
                //dd($year_month_array[1]);
                //$arr = 
               switch ($year_month_array[1]) {
                   case "01":
                        print_r("hello");
                       $key2["payment_month"] = "መስከረም ".$year_month_array[0];
                       break;

                   case "02":
                        $key2["payment_month"] = "ጥቅምት ".$year_month_array[0];
                        break;

                   case "03":
                        $key2["payment_month"] = "ህዳር ".$year_month_array[0];
                        break;

                   case "04":
                        $key2["payment_month"] = "ታህሳስ ".$year_month_array[0];
                        break;

                    case "05":
                            $key2["payment_month"] = "ጥር ".$year_month_array[0];
                            break;

                    case "06":
                            $key2["payment_month"] = "የካቲት ".$year_month_array[0];
                            break;

                    case "07":
                           $key2["payment_month"] = "መጋቢት ".$year_month_array[0];
                            break;

                    case "08":               
                            $key2["payment_month"] = "ሚያዚያ ".$year_month_array[0];
                            break;

                    case "09":
                            $key2["payment_month"] = "ግንቦት ".$year_month_array[0];
                            break;

                    case "10":
                            $key2["payment_month"] = "ሰኔ ".$year_month_array[0];
                            break;

                    case "11":
                            $key2["payment_month"] = "ሃምሌ ".$year_month_array[0];
                            break;

                    case "12":
                            $key2["payment_month"] = "ነሃሴ ".$year_month_array[0];
                            break;

                    case "13":
                            $key2["payment_month"] = "ጷግሜ ".$year_month_array[0];
                            break;
                   
                   default:
                       # code...
                       print_r("hello");
                       break;
               }

            
            }
        }
        //dd($decoded);
        return view('admin.parent.parent_payment_detail')->with('unpaid_bills',$decoded["sliced"])->with('result_history',$decoded["result_history"]);
    }
}
