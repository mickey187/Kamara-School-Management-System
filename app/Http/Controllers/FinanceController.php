<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment_type;
use App\Models\payment_load;
use App\Models\student;
use App\Models\classes;
use App\Models\student_payment;
use App\Models\student_discount;
use DB;


class FinanceController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
}

    //indexAddPaymentType function

    public function indexAddPaymentType(){
        return view('finance.add_payment_type');
    }

    public function addPaymentType(Request $req){

        $payment_type = new payment_type();
        $payment_type->payment_type = $req->payment_type;
        $payment_type->recurring_type = $req->recurring_type;
        if ($payment_type->save()) {
            $view_payment_type = payment_type::all();
            return view('finance.view_payment_type')->with('view_payment_type',$view_payment_type);
        }
    }

    public function viewPaymentType(){
        $view_payment_type = payment_type::all();

        return view('finance.view_payment_type')->with('view_payment_type',$view_payment_type);


    }

    public function indexAddStudentPayment(){

        $payment_type = payment_type::all();
        $payment_load = DB::table('payment_loads')
                                  ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
                                  ->join('classes','payment_loads.class_id','=','classes.id')
                                  ->get(['payment_loads.id as load_id','payment_type','class_label','amount']);
                                  
        $student_data = student::get(['id','student_id','first_name','middle_name','last_name','discount','class_id']);
       
            //return $student_data;
       
        
        return view('finance.add_student_payments')->with('student_data',$student_data)
                   ->with('payment_type',$payment_type);
    }

    public function fetchLoad($class_id, $pay_type, $stud_id){

        $result_load = DB::table('payment_loads')
        ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
        ->join('classes','payment_loads.class_id','=','classes.id')
        ->where('class_id',$class_id)
        ->where('payment_type_id',$pay_type)
        ->get(['payment_loads.id as load_id','payment_type','class_label','amount']);

        $load_id_value = 0;

        foreach ($result_load as $key) {
           
            $load_id_value = $key->load_id;
        }

        if (student_discount::where('student_id',$stud_id)->where('payment_load_id',$load_id_value)->exists()) {
            error_log("hellooooooooooooooooo mate");

           $fetch_discount = student_discount::where('student_id',$stud_id)->where('payment_load_id',$load_id_value)->get(['discount_percent']);
           $discount_value = 0;
           foreach ($fetch_discount as $key) {
               $discount_value = $key->discount_percent ;
           }

           foreach ($result_load as $key) {
               $temp = $key->amount;
               $temp = $temp* $discount_value/100;
               $key->amount = $key->amount-$temp;
           }

        }

        
            // foreach ($result_load as $key) {
            //     $temp = $key->amount;
            //     $temp = $temp * $discount/100;
            //     $key->amount = $key->amount - $temp;
            //  }
        
    
        
    
         return response()->json($result_load);
    }

    public function fetchPaymentHistory($stud_id){

        $result_history = DB::table('student_payments')
                                    ->join('students','student_payments.student_id','=','students.id')
                                    ->join('payment_types','student_payments.payment_type_id','=','payment_types.id')
                                    ->join('payment_loads','student_payments.payment_load_id','=','payment_loads.id')
                                    ->where('student_payments.student_id',$stud_id)
                                    ->get(['first_name','middle_name','last_name','payment_type','amount_payed','payment_month']);

    //         $result_history = DB::table('tuition_fees')
    //                                 ->join('students','tuition_fees.student_id','=','students.id')
    //                                 //->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
    //                                 ->where('students.id',$stud_id)
    // ->get(['first_name','middle_name','last_name','amount_payed','payment_month','payment_load_id as payment_type']);
    //        // $result_history = tuition_fee::all();
    //        foreach ($result_history as $key) {
               
    //             $sub_result = DB::table('payment_loads')
    //                                 ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
    //                                 ->where('payment_loads.id',$key->payment_type)
    //                                 ->get(['payment_type']);
    //                                 foreach ($sub_result as $key2) {
    //                                     $key->payment_type = $key2->payment_type;
    //                                 }
                                
    //        }

           

                                    return response()->json($result_history);
    }

    public function addStudentPayment(Request $req){
        //return $req;
        $student_payment = new student_payment();
        $student_payment->student_id = $req->submit;
        $student_payment->payment_type_id = $req->select_payment_type;
        $student_payment->payment_load_id = $req->load_id;
        $student_payment->amount_payed = $req->amount;
        $student_payment->payment_month = $req->month;
        $student_payment->save();
        
    }

    public function viewStudentPayment(){

    }
    

    public function indexAddPaymentLoad(){

        $payment_load = payment_type::all();
        $class = classes::all();
        return view('finance.add_payment_load')->with('payment_load',$payment_load)->with('class',$class);
    }

    public function AddPaymentLoad(Request $req){

        $payment_type = $req->select_payment_type;
        $class = $req->select_class;
        $payment_amount = $req->payment_amount;

        $payment_load = new payment_load();

        $payment_load->payment_type_id = $req->select_payment_type;
        $payment_load->class_id = $req->select_class;
        $payment_load->amount = $req->payment_amount;
        $payment_load->save();

    }

    public function viewPaymentLoad(){
        $payment_load = DB::table('payment_loads')
                                  ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
                                  ->join('classes','payment_loads.class_id','=','classes.id')
                                  ->get(['payment_loads.id as load_id','payment_type','class_label','amount']);
                                  return view('finance.view_payment_load')->with('payment_load',$payment_load);
    }

    public function fetchStudent($stud_id){
        $class_id = "";
       $student_data =  student::where('student_id',$stud_id)->get(['students.id as student_id','first_name','middle_name','last_name','class_id']);
       foreach ($student_data as $key) {
             $class_id = $key->class_id;
       }
      
       
        $student_payment = DB::table('payment_loads')
                                    ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
                                    ->join('classes','payment_loads.class_id','=','classes.id')
                                    ->where('payment_loads.class_id',$class_id)
                                    ->get(['payment_loads.id as load_id','payment_type','class_label','amount']);

                                   // $merge = $student_payment->merge($student_data);

        return response()->json(['student_data'=>$student_data, 'student_payment'=>$student_payment]);

    }


    public function indexAddStudentDiscount(){

        return view('finance.add_student_discount');
    }

    public function addStudentDiscount(Request $req){

        $student_discount = new student_discount();
        $student_discount->student_id = $req->student_id;
        $student_discount->payment_load_id = $req->load_id;
        $student_discount->discount_percent = $req->discount_amount;
        $student_discount->save();

    }
}
