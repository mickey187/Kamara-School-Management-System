<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment_type;
use App\Models\payment_load;
use App\Models\student;
use App\Models\classes;
use App\Models\student_payment;
use App\Models\student_discount;
use App\Models\student_transportation;
use App\Models\student_payment_load;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Andegna;





class FinanceController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
}

    //Finance Dashboard function
    public function financeDashboard(){

        $total_value_this_month = 0;
        $total_value_this_year = 0;

        $now1 = \Andegna\DateTimeFactory::now();
        $current_year_month = $now1->getYear()."-".$now1->getMonth();

        $total_payment_collected_this_month = student_payment::where('payment_month',$current_year_month)->get(['amount_payed']);
        $total_payment_collected_this_year = student_payment::get(['amount_payed','created_at']);
        foreach ($total_payment_collected_this_year as $total) {
            if ($total->created_at->format('Y') == "20".Carbon::now()->format('y')) {
                $total_value_this_year = $total_value_this_year + $total->amount_payed;
               error_log("foreverrrrrrrrrrrr");
            }

        }
        //return $total_payment_collected;
        foreach ($total_payment_collected_this_month as $total) {
            $total_value_this_month = $total_value_this_month + $total->amount_payed;
        }
        return view('finance.finance_dashboard')->with('total_value_this_month',number_format($total_value_this_month))
                                                ->with('total_value_this_year',number_format($total_value_this_year));
    }

    public function getYealyEarnings(){
        $each_month_earnings = [];
        $months_of_the_year = [];
        $now1 = \Andegna\DateTimeFactory::now();
        for ($i=0; $i <13; $i++) {
            switch ($i) {
                case 0:
                    $months_of_the_year[$i] = $now1->getYear()."-01";
                    break;

                case 1:
                    $months_of_the_year[$i] = $now1->getYear()."-02";
                    break;

                case 2:
                    $months_of_the_year[$i] = $now1->getYear()."-03";
                    break;

                case 3:
                    $months_of_the_year[$i] = $now1->getYear()."-04";
                    break;

                case 4:
                    $months_of_the_year[$i] = $now1->getYear()."-05";
                    break;

                case 5:
                    $months_of_the_year[$i] = $now1->getYear()."-06";
                    break;

                case 6:
                    $months_of_the_year[$i] = $now1->getYear()."-07";
                    break;

                case 7:
                    $months_of_the_year[$i] = $now1->getYear()."-08";
                    break;

                 case 8:
                    $months_of_the_year[$i] = $now1->getYear()."-09";
                    break;

                case 9:
                    $months_of_the_year[$i] = $now1->getYear()."-10";
                    break;

                case 10:
                    $months_of_the_year[$i] = $now1->getYear()."-11";
                    break;

                case 11:
                    $months_of_the_year[$i] = $now1->getYear()."-12";
                    break;
                case 12:
                        $months_of_the_year[$i] = $now1->getYear()."-13";
                        break;

                default:
                    # code...
                    break;
            }



        }
        $length = count($months_of_the_year);
        error_log($length);
        for ($i=0; $i < $length ; $i++) {
            $each_month_earnings[$i] = student_payment::where('payment_month',$months_of_the_year[$i])
                                        ->sum('amount_payed');
        }
        // foreach ($months_of_the_year as $key) {
        //     $each_month_earnings[] = student_payment::where('payment_month',$key)->sum('amount_payed');
        //     error_log($key);
        // }


        return response()->json($each_month_earnings);

    }
    //indexAddPaymentType function
    public function indexAddPaymentType(){
        $view_payment_type = payment_type::all();
        return view('finance.add_payment_type')->with('view_payment_type',$view_payment_type);
    }

    //Add Payment Type
    public function addPaymentType(Request $req){



        $payment_type = new payment_type();
        $payment_type->payment_type = $req->payment_type;
        $payment_type->recurring_type = $req->select_recurring;
        if ($payment_type->save()) {
            $view_payment_type[0] = payment_type::latest()->first();
           error_log($view_payment_type[0]);

            return response()->json(['success'=>'success','view_payment_type'=>$view_payment_type]);


        }
    }

 //view Payment Type
    public function viewPaymentType(){
        $view_payment_type = payment_type::all();

       // return response()->json($view_payment_type);
        return view('finance.view_payment_type')->with('view_payment_type',$view_payment_type);


    }

    public function editPaymentType(Request $req){

        $payment_type = payment_type::find($req->payment_type_id);
        $payment_type->payment_type = $req->payment_type_edit;
        $payment_type->recurring_type = $req->select_recurring_edit;
        if ($payment_type->save()) {

            return response()->json("success");
        }


    }

    public function deletePaymentType(Request $req){

         if (payment_type::destroy($req->payment_type_id)) {
             return response()->json("deleted");
         }


    }


    public function indexAddStudentTransportation(){
        $student_transport = DB::table('student_payment_load')
                                      ->join('payment_loads','student_payment_load.payment_load_id','=','payment_loads.id')
                                      ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
                                      ->join('students','student_payment_load.student_id','=','students.id')
                                      ->join('classes','students.class_id','=','classes.id')
                                      ->where('payment_type','Transportation Fee')
                                      ->get();


        return view('finance.student_transportation')->with('student_transport',$student_transport);
    }




    public function fetchstudentTransportLoad($stud_id){

        $student_data = DB::table('students')
                            ->join('classes','students.class_id','=','classes.id')
                            ->where('student_id',$stud_id)
                            ->get(['students.id as student_table_id','first_name','middle_name','last_name','class_id','class_label']);

        $class_id = null;

                            foreach ($student_data as $row) {

                                $class_id = $row->class_id;

                            }

        $payment_load = DB::table('payment_loads')
                                 ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
                                 ->where('class_id',$class_id)
                                 ->where('payment_types.payment_type','Transportation Fee')
                                 ->get(['payment_loads.id as payment_load_id','amount','payment_type']);
         return response()->json(['student_data'=>$student_data,'payment_load'=>$payment_load]);
    }

    public function registerForTransport($student_table_id, $payment_load_id){
        //return response()->json($stud_id);
        $student_payment_load = new student_payment_load();
        $student_payment_load->student_id = $student_table_id;
        $student_payment_load->payment_load_id = $payment_load_id;

        if (!student_payment_load::where('student_id',$student_table_id)->where('payment_load_id',$payment_load_id)->exists()) {
            if ($student_payment_load->save()) {


                return response()->json("success");
            }
        }

        else if (student_payment_load::where('student_id',$student_table_id)->where('payment_load_id',$payment_load_id)->exists()) {
            return response()->json("already exists");
        }




    }

    public function indexAddStudentPayment(){

        $payment_type = payment_type::all();
        $payment_load = DB::table('payment_loads')
                                  ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
                                  ->join('classes','payment_loads.class_id','=','classes.id')
                                  ->get(['payment_loads.id as load_id','payment_type','class_label','amount']);

       // $student_data = student::get(['id','student_id','first_name','middle_name','last_name','discount','class_id']);
        $student_data = DB::table('students')
                                 ->join('classes','students.class_id','=','classes.id')
                                 ->orderBy('first_name','ASC')
                                 ->orderBy('middle_name','ASC')
                                 ->orderBy('last_name','ASC')
                                 ->orderBy('classes.id','ASC')
                                 ->get(['students.id as student_table_id','student_id','first_name','middle_name','last_name','discount','class_id','class_label']);

            //return $student_data;


        return view('finance.add_student_payments')->with('student_data',$student_data)
                   ->with('payment_type',$payment_type);
    }

    public function fetchTotalPaymentLoad($class_id, $stud_id){
        $total_load = 0;
        $discounted_load = 0;


        $result_load = DB::table('student_payment_load')
                                 ->where('student_id',$stud_id)
                                 ->join('payment_loads','student_payment_load.payment_load_id','=','payment_loads.id')
                                 ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
                                 ->get();

        foreach ($result_load as $individual_load) {

            if ($individual_load->discount_percent > 0) {
                $discounted_load = $individual_load->amount * $individual_load->discount_percent/100;
                $individual_load->amount = $discounted_load;
                $discounted_load = 0;
            }
            if ($individual_load->recurring_type == 'non-recurring') {
                if (student_payment::where('student_id',$stud_id)->where('payment_load_id',$individual_load->payment_load_id)->exists()) {
                    $individual_load->amount = 0;
                }

            }
            $total_load = $total_load + $individual_load->amount;
        }

        $total = array(['total_load' => $total_load]);

        return response()->json(['result_load'=>$result_load,'total_load'=>$total_load]);



    }

//fetch individual payment loads

public function fetchLoad($class_id, $pay_type, $stud_id, $selected_individual_payment){
    $discounted_load = 0;
    $result_load = DB::table('student_payment_load')
                            ->join('payment_loads','student_payment_load.payment_load_id','=','payment_loads.id')
                            ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
                            ->where('payment_types.payment_type',$selected_individual_payment)
                            ->where('student_payment_load.student_id',$stud_id)
                            ->get(['payment_types.id as payment_type_id','payment_loads.id as payment_load_id'
                                    ,'payment_type','amount','recurring_type','discount_percent']);

            foreach ($result_load as $individual_load) {
                if ($individual_load->discount_percent > 0) {
                    $discounted_load = $individual_load->amount * $individual_load->discount_percent/100;
                    $individual_load->amount = $discounted_load;
                    $discounted_load = 0;
                }
               if ($individual_load->recurring_type == 'non-recurring') {
                if (student_payment::where('student_id',$stud_id)->where('payment_load_id',$individual_load->payment_load_id)->exists()) {
                    $individual_load->amount = 0;
                }

            }

        }


            return response()->json($result_load);

}


    public function fetchPaymentHistory($stud_id){

        $result_history = DB::table('student_payments')
                                    ->join('students','student_payments.student_id','=','students.id')
                                    ->join('payment_types','student_payments.payment_type_id','=','payment_types.id')
                                    ->join('payment_loads','student_payments.payment_load_id','=','payment_loads.id')
                                    ->where('student_payments.student_id',$stud_id)
                                    ->orderBy('payment_month','DESC')
                                    ->get(['first_name','middle_name','last_name','payment_type','amount_payed',
                                    'payment_month','student_payments.created_at','fs_number']);


        $student_payment_load = DB::table('student_payment_load')
                                        ->join('payment_loads','student_payment_load.payment_load_id','=','payment_loads.id')
                                        ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
                                        ->join('students','student_payment_load.student_id','=','students.id')
                                        ->where('payment_types.recurring_type','=','recurring')
                                        ->where('student_payment_load.student_id',$stud_id)
                                        ->get();
        $compare =  DB::table('student_payments')
                    ->where('student_id',$stud_id)
                    ->get(['student_id','payment_type_id','payment_load_id','amount_payed','payment_month']);

            error_log("testtttttttt".ltrim(Carbon::now()->format('m'),"0") );
            $now1 = \Andegna\DateTimeFactory::now();
           $current_month_year = $now1->getYear()."-".$now1->getMonth();
           $current_month = ltrim($now1->getMonth(),"0");
           $previous_month = [];

            for ($i = 0; $i <= $current_month -1; $i++){
                  $previous_month[$i] = date("Y-m", strtotime( date( $current_month_year )." -$i months"));

            }
            $length = count($previous_month);

            $array_length = count($student_payment_load);

            $student_missing_payment_coll = collect([]);

            foreach ($student_payment_load as $key) {

                foreach ($previous_month as $key2  ) {
                    $student_missing_payment_coll->push([ 'student_id'=>$key->student_id,
                    'payment_type_id'=>$key->payment_type_id,
                    'payment_load_id'=>$key->payment_load_id,
                    'amount_payed'=>$key->amount,
                    'payment_month'=>$key2,
                    'status'=>'unknown',
                    'payment_type'=>$key->payment_type,
                     ]);
                }

            }
            $array_length2 = count($student_missing_payment_coll);
            $counter = 0;

            foreach ($student_missing_payment_coll as $key) {
               // error_log($key['payment_load_id']."it worked");
                if (!student_payment::where('student_id',$stud_id)
                                        ->where('payment_load_id',$key['payment_load_id'])
                                        ->where('payment_type_id',$key['payment_type_id'])
                                        ->where('payment_month',$key['payment_month'])
                                        ->exists()) {
                                            $counter++;

                        error_log("hurraaaaaaaaaaay it checked".$counter);


                        $student_missing_payment_coll->push([

                            'payment_type_id'=>$key['payment_type_id'],
                            'payment_load_id'=>$key['payment_load_id'],
                            'amount_payed'=>$key['amount_payed'],
                            'payment_month'=>$key['payment_month'],
                            'status'=>'unpaid',
                            'payment_type'=>$key['payment_type']
                        ]);

                    }




            }

            error_log("hellllllllllllo".$student_missing_payment_coll);
            $sliced[] = $student_missing_payment_coll->slice($array_length2);



            error_log($student_missing_payment_coll."from here");

        return response()->json(['unpaid_bill'=>$student_payment_load,'result_history'=>$result_history,'compared'=>$compare
                        ,'student_missing_payment_coll'=>$student_missing_payment_coll,'sliced'=>$sliced]);
    }

    public function makeTotalPayment(Request $req, $stud_id, $month, $fs_number){

        error_log("Heyyyyyyyyyyyy".$stud_id);
        $total_payment = $req->detail;


        $res = null;
        $count = 0;
        $status = null;

        if (student_payment::where('fs_number',$fs_number)->exists()) {
            $status = "duplicate fs number";
        }
        else if(!student_payment::where('fs_number',$fs_number)->exists()){


        foreach ($total_payment as $key) {
             if (!$key['amount'] == 0) {


                 if (!student_payment::where('payment_type_id',$key['payment_type_id'])
                                      ->where('payment_load_id',$key['payment_load_id'])
                                      ->where('payment_month',$month)
                                      ->where('amount_payed',$key['amount'])
                                      ->where('student_id',$stud_id)
                                      ->exists()) {



            $student_payment = new student_payment();
            $student_payment->student_id = $stud_id;
            $student_payment->payment_type_id = $key['payment_type_id'];
            $student_payment->payment_load_id = $key['payment_load_id'];
            $student_payment->amount_payed = $key['amount'];
            $student_payment->payment_month = $month;
            $student_payment->fs_number = $fs_number;
            if ($student_payment->save()) {
                $status = "successful";
                    }

                }
                else if(student_payment::where('payment_type_id',$key['payment_type_id'])
                                        ->where('payment_load_id',$key['payment_load_id'])
                                        ->where('payment_month',$month)
                                        ->where('amount_payed',$key['amount'])
                                        ->where('student_id',$stud_id)
                                        ->exists()){
                    $status = "already paid";
                }
            }



            $count++;


          }
        }
          $student_payment = student_payment::all();

          return response()->json($status);


    }
    public function makeIndividualPayment(Request $req, $stud_id, $month, $fs_number){
        $individual_payment = $req->detail;
        $status = null;
        foreach ($individual_payment as $key) {
            if (!$key['amount'] == 0) {
                if (!student_payment::where('payment_type_id',$key['payment_type_id'])
                                      ->where('payment_load_id',$key['payment_load_id'])
                                      ->where('payment_month',$month)
                                      ->where('amount_payed',$key['amount'])
                                      ->exists()) {
            $student_payment = new student_payment();
            $student_payment->student_id = $stud_id;
            $student_payment->payment_type_id = $key['payment_type_id'];
            $student_payment->payment_load_id = $key['payment_load_id'];
            $student_payment->amount_payed = $key['amount'];
            $student_payment->payment_month = $month;
            $student_payment->fs_number = $fs_number;
            if ($student_payment->save()) {
                $status = "successful";

                }
            }
            else if(student_payment::where('payment_type_id',$key['payment_type_id'])
                                    ->where('payment_load_id',$key['payment_load_id'])
                                    ->where('payment_month',$month)
                                    ->where('amount_payed',$key['amount'])
                                    ->exists()){
                                        $status = "already paid";

            }
        }
        elseif ($key['amount'] == 0) {
            $status = "already paid";
        }


    }
    return response()->json($status);
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

        $payment_type = payment_type::all();
        $class = classes::all();
        $payment_load = DB::table('payment_loads')
        ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
        ->join('classes','payment_loads.class_id','=','classes.id')
        ->get(['payment_loads.id as load_id','payment_type','class_label','amount','payment_types.id as payment_type_id','class_id']);

        return view('finance.add_payment_load')->with('payment_type',$payment_type)->with('class',$class)
               ->with('payment_load',$payment_load);
    }

    public function AddPaymentLoad(Request $req,$class_selected){

        $status = "";
        $counter = 0;
       $class_array = explode(",",$class_selected);
       foreach ($class_array as $key) {
        $payment_load = new payment_load();
        $payment_load->payment_type_id = $req->payment_type_selected;
        $payment_load->class_id = $key;
        $payment_load->amount = $req->payment_amount;
        if ($payment_load->save()) {
            $counter++;
            $status = "success";
            $payment_load = DB::table('payment_loads')
                            ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
                            ->join('classes','payment_loads.class_id','=','classes.id')
                            ->orderBy('payment_loads.created_at','DESC')
                            ->limit($counter)
                            ->get(['payment_loads.id as load_id','payment_type','class_label','amount']);

        }
       }
       return response()->json(['payment_load'=>$payment_load,'status'=>$status]);

    }

    public function editPaymentLoad(Request $req){

        $payment_load =  payment_load::find($req->load_id);
        $payment_load->payment_type_id = $req->payment_type_edit;
        $payment_load->class_id = $req->class_id_edit_val;
        $payment_load->amount = $req->payment_amount_edit;
        if ($payment_load->save()) {
            $status = "success";
            return response()->json($status);
        }




    }

    public function deletePaymentLoad(Request $req){
        // return response()->json($req);
        $status = "";
        if (payment_load::destroy($req->load_id_delete)) {
            $status = "success";
            return response()->json($status);
        }


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
       $student_table_id =  student::where('student_id',$stud_id)->pluck('id');
      // return response()->json($student_table_id);
       foreach ($student_data as $key) {
             $class_id = $key->class_id;
       }


        // $student_payment = DB::table('payment_loads')
        //                             ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
        //                             ->join('classes','payment_loads.class_id','=','classes.id')
        //                             ->where('payment_loads.class_id',$class_id)
        //                             ->get(['payment_loads.id as load_id','payment_type','class_label','amount']);

                                   // $merge = $student_payment->merge($student_data);
        $student_payment = DB::table('student_payment_load')
                                  ->join('payment_loads','student_payment_load.payment_load_id','=','payment_loads.id')
                                  ->join('students','student_payment_load.student_id','=','students.id')
                                  ->join('classes','students.class_id','=','classes.id')
                                  ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
                                  ->where('student_payment_load.student_id',$student_table_id)
                                  ->get();
          return response()->json(['student_data'=>$student_data,'student_payment'=>$student_payment]);

        //return response()->json(['student_data'=>$student_data, 'student_payment'=>$student_payment]);

    }


    public function indexAddStudentDiscount(){

        $student_discount = DB::table('student_payment_load')
                            ->join('students','student_payment_load.student_id','=','students.id')
                            ->join('payment_loads','student_payment_load.payment_load_id','=','payment_loads.id')
                            ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
                            ->where('discount_percent','!=',0)
                            ->get(['students.student_id',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')
                            ,'payment_types.payment_type','discount_percent']);
                          //  dd($student_discount);
        return view('finance.add_student_discount')->with('student_discount',$student_discount);
    }

    public function addStudentDiscount(Request $req){


        $student_discount =  student_payment_load::where('student_id',$req->student_id)
                             ->where('payment_load_id',$req->payment_load_id)->first();

        // $student_discount->student_id = $req->student_id;
        // $student_discount->payment_load_id = $req->payment_load_id;
        $student_discount->discount_percent = $req->discount_amount;
        $student_discount->save();
        return $student_discount;

    }

    public function studentPayment(){

        $payment_type = payment_type::all();
        $student_transport = DB::table('student_payment_load')
                                      ->join('payment_loads','student_payment_load.payment_load_id','=','payment_loads.id')
                                      ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
                                      ->join('students','student_payment_load.student_id','=','students.id')
                                      ->join('classes','students.class_id','=','classes.id')
                                      ->where('payment_type','Transportation Fee')
                                      ->get();


        return view('finance.student_payment')->with('payment_type',$payment_type);


    }

    public function searchStudentForPaymentRegistration($stud_id){

        $student_data = DB::table('students')
                            ->join('classes','students.class_id','=','classes.id')
                            ->where('student_id',$stud_id)
                            ->get(['student_id',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name'),
                            'class_label','class_id','students.id as student_table_id']);

        $student_table_id = student::where('student_id',$stud_id)->pluck('id');

        $student_payment_load = student_payment_load::where('student_id',$student_table_id[0])
                                ->get(['payment_load_id']);

            foreach ($student_payment_load as $key) {
                $payment_type_array[] = payment_load::where('id',$key->payment_load_id)->pluck('payment_type_id');
            }
             return response()->json(['payment_type_array'=>$payment_type_array,'student_data'=>$student_data]);
    }

    public function registerStudentForPayment(Request $req, $stud_id){


        $payment_load_id = payment_load::where('class_id',$req->class_id)->where('payment_type_id',$req->payment_type_select)
                                         ->pluck('id');
                                         error_log("stduent_table_id".$req->stduent_table_id);
        $student_payment_load = new student_payment_load();
        $student_payment_load->student_id = $req->stduent_table_id;
        $student_payment_load->payment_load_id = $payment_load_id[0];
        if ($req->filled('discount_percent')) {
            $student_payment_load->discount_percent = $req->discount_percent;
        }
        else {
            $student_payment_load->discount_percent = 0;
        }



        if (!student_payment_load::where('student_id',$req->stduent_table_id)
            ->where('payment_load_id',$payment_load_id[0])->exists()) {

                if ($student_payment_load->save()) {


                    return response()->json("success");
                }

        }

        elseif (student_payment_load::where('student_id',$req->stduent_table_id)
        ->where('payment_load_id',$payment_load_id[0])->exists()) {
            return response()->json("already exists");
        }

    }

    public function showStudentsRegsiteredForTransport(){

        $student_transport = DB::table('student_payment_load')
                                      ->join('payment_loads','student_payment_load.payment_load_id','=','payment_loads.id')
                                      ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
                                      ->join('students','student_payment_load.student_id','=','students.id')
                                      ->join('classes','students.class_id','=','classes.id')
                                      ->where('payment_type','Transportation Fee')
                                      ->get([DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')
                                   ,'students.student_id as stud_id' ,'payment_type','class_label','amount','discount_percent']);
        error_log($student_transport);
        //$student_transport_arr = array("data"=>$student_transport);
            return response()->json($student_transport);
    }

    public function showStudentsWithDiscount(){
        $student_discount = DB::table('student_payment_load')
                            ->join('students','student_payment_load.student_id','=','students.id')
                            ->join('payment_loads','student_payment_load.payment_load_id','=','payment_loads.id')
                            ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
                            ->join('classes','students.class_id','=','classes.id')
                            ->where('discount_percent','!=',0)
                            ->get(['students.student_id',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')
                            ,'class_label','payment_types.payment_type','discount_percent']);
                            return response()->json($student_discount);
    }

    public function showStudentsRegisteredForSchoolTrip(){

        $student_school_trip = DB::table('student_payment_load')
        ->join('students','student_payment_load.student_id','=','students.id')
        ->join('payment_loads','student_payment_load.payment_load_id','=','payment_loads.id')
        ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
        ->join('classes','students.class_id','=','classes.id')
        ->where('payment_type','=','School Trip')
        ->get(['students.student_id',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')
        ,'class_label','payment_types.payment_type','discount_percent','amount']);

        return response()->json($student_school_trip);
    }

    public function showStudentsRegisteredForGraduation(){

        $student_graduation = DB::table('student_payment_load')
        ->join('students','student_payment_load.student_id','=','students.id')
        ->join('payment_loads','student_payment_load.payment_load_id','=','payment_loads.id')
        ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
        ->join('classes','students.class_id','=','classes.id')
        ->where('payment_type','=','Graduation Magazine & Gown Fee')
        ->get(['students.student_id',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')
        ,'class_label','payment_types.payment_type','discount_percent','amount']);

        return response()->json($student_graduation);
    }

    public function showStudentsRegisteredForSummerCamp(){

        $student_summer_camp = DB::table('student_payment_load')
        ->join('students','student_payment_load.student_id','=','students.id')
        ->join('payment_loads','student_payment_load.payment_load_id','=','payment_loads.id')
        ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
        ->join('classes','students.class_id','=','classes.id')
        ->where('payment_type','=','Summer Camp')
        ->get(['students.student_id',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')
        ,'class_label','payment_types.payment_type','discount_percent','amount']);

        return response()->json($student_summer_camp);
    }

    public function showStudentsRegisteredForTutorial(){

        $student_tutorial = DB::table('student_payment_load')
        ->join('students','student_payment_load.student_id','=','students.id')
        ->join('payment_loads','student_payment_load.payment_load_id','=','payment_loads.id')
        ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
        ->join('classes','students.class_id','=','classes.id')
        ->where('payment_type','=','Tutorial Fee')
        ->get(['students.student_id',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')
        ,'class_label','payment_types.payment_type','discount_percent','amount']);

        return response()->json($student_tutorial);
    }

    public function checkFsNumberExists($fs_number){
        $message = null;
        if (student_payment::where('fs_number',$fs_number)->exists()) {
            $message = "already exists";
            return response()->json($message);
        }
        else if (!student_payment::where('fs_number',$fs_number)->exists()) {
            $message = "good";
            return response()->json($message);
        }
    }
}


