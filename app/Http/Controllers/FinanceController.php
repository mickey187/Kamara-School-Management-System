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


class FinanceController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
}

    //Finance Dashboard function
    public function financeDashboard(){
        
        $total_value = 0;  
        $total_payment_collected = student_payment::where('payment_month',"20".Carbon::now()->format('y-m'))->get(['amount_payed']);
        //return $total_payment_collected;
        foreach ($total_payment_collected as $total) {
            $total_value = $total_value + $total->amount_payed;
        }
        return view('finance.finance_dashboard')->with('total_value',number_format($total_value));
    }
    //indexAddPaymentType function
    public function indexAddPaymentType(){
        return view('finance.add_payment_type');
    }

    //Add Payment Type
    public function addPaymentType(Request $req){

        $payment_type = new payment_type();
        $payment_type->payment_type = $req->payment_type;
        $payment_type->recurring_type = $req->recurring_type;
        if ($payment_type->save()) {
            $view_payment_type = payment_type::all();
            return view('finance.view_payment_type')->with('view_payment_type',$view_payment_type);
        }
    }

 //view Payment Type
    public function viewPaymentType(){
        $view_payment_type = payment_type::all();

        return view('finance.view_payment_type')->with('view_payment_type',$view_payment_type);


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

    public function showStudentsRegsiteredForTransport(){

        $student_transport = DB::table('student_payment_load')
                                      ->join('payment_loads','student_payment_load.payment_load_id','=','payment_loads.id')
                                      ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
                                      ->join('students','student_payment_load.student_id','=','students.id')
                                      ->join('classes','students.class_id','=','classes.id')
                                      ->where('payment_type','Transportation Fee')
                                      ->get();

            return response()->json($student_transport);
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
       
        
        // $student_transport = new student_transportation();
        // $student_transport->student_id = $student_table_id;
        // $student_transport->payment_load_id = $payment_load_id;
       
        // if ($student_transport->save()) {
        //     $res = student_transportation::all();
            
        // }

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

   /* public function fetchTotalPaymentLoad($class_id, $stud_id){
        
//fetch general student payment load
        $result_load = DB::table('payment_loads')
        ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
        ->join('classes','payment_loads.class_id','=','classes.id')
        ->where('class_id',$class_id)
        
        ->get(['payment_loads.id as load_id','payment_type','class_label','amount','recurring_type'
        ,'payment_types.id as pay_type_id']);
        $total_load = 0;

        foreach ($result_load as $key) {

//check for student discount
     if (student_discount::where('student_id',$stud_id)->where('payment_load_id',$key->load_id)->exists()) {
            
                error_log("Levelllllllllllllllll");
                $fetch_discount = student_discount::where('student_id',$stud_id)->where('payment_load_id',$key->load_id)->get(['discount_percent']);
                $discount_value = 0;
                foreach ($fetch_discount as $row) {
                    $discount_value = $row->discount_percent ;
                }
     
                
                    $temp = $key->amount;
                    $temp = $temp * $discount_value/100;
                    $key->amount = $key->amount-$temp;
                    
                    
                
     
             }
//check if non recurring payments are already payed

             if ($key->recurring_type == 'non-recurring') {
                if (student_payment::where('student_id',$stud_id)->where('payment_load_id',$key->load_id)->exists()) {
                    $key->amount = 0;
                }
            }
//check if a student is registered for transportation

             if (!student_transportation::where('student_id',$stud_id)->exists()) {
                 foreach ($result_load as $key) {
                     # code...
                     
                     if ($key->payment_type == 'Transportation Fee') {
                         # code...
                         $key->amount = 0;
                     }
                 }
            //    $payment_load_id = student_transportation::pluck('payment_load_id')->first();
            //    if ($key->load_id == $payment_load_id) {
            //        $key->amount = 0;
            //    }
             }

            }
            
        
//calculate total payment for a student 
        foreach ($result_load as $row) {
            $total_load = $total_load + $row->amount;
        }
        $total = array(['total_load' => $total_load]);

     
//json response to AJAX REQUEST
        return response()->json(['result_load' => $result_load, 'total_load' => $total]);

    }
    */
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
  /*  public function fetchLoad($class_id, $pay_type, $stud_id){

        $result_load = DB::table('payment_loads')
        ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
        ->join('classes','payment_loads.class_id','=','classes.id')
        ->where('class_id',$class_id)
        ->where('payment_type_id',$pay_type)
        ->get(['payment_loads.id as load_id','payment_type','class_label','amount','recurring_type']);

        $load_id_value = 0;

        foreach ($result_load as $key) {
           
            $load_id_value = $key->load_id;

            if (!student_transportation::where('student_id',$stud_id)->exists()) {
                $payment_load_id = student_transportation::pluck('payment_load_id')->first();
                if ($key->load_id == $payment_load_id) {
                    $key->amount = 0;
                }
              }
            }
            foreach ($result_load as $key) {
                # code...
            
              if ($key->recurring_type == 'non-recurring') {
                  if (student_payment::where('student_id',$stud_id)->where('payment_load_id',$key->load_id)->exists()) {
                      $key->amount = "already payed";
                  }
              }
            }
        

    if (student_discount::where('student_id',$stud_id)->where('payment_load_id',$load_id_value)->exists()) {
            

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
    }*/

    public function fetchPaymentHistory($stud_id){

        $result_history = DB::table('student_payments')
                                    ->join('students','student_payments.student_id','=','students.id')
                                    ->join('payment_types','student_payments.payment_type_id','=','payment_types.id')
                                    ->join('payment_loads','student_payments.payment_load_id','=','payment_loads.id')
                                    ->where('student_payments.student_id',$stud_id)
                                    ->orderBy('payment_month','DESC')
                                    ->get(['first_name','middle_name','last_name','payment_type','amount_payed','payment_month']);


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
        #student_payment::where('student_id',$stud_id)->get(['student_id','payment_type_id','payment_load_id'
                                        #,'amount_payed','payment_month']);
                   
                       
        //    $compared = $compare->diffAssoc($student_payment_load);
            error_log("testtttttttt".ltrim(Carbon::now()->format('m'),"0") );
           $current_month = ltrim(Carbon::now()->format('m'),"0");
           $previous_month = [];

            for ($i = 0; $i <= $current_month -1; $i++){ 
                  $previous_month[$i] = date("Y-m", strtotime( date( 'Y-m-01' )." -$i months"));
           
            }
            $length = count($previous_month);

            for ($i=1; $i < $length ; $i++) { 
                
                 error_log($previous_month[$i]);

            }
            $array_length = count($student_payment_load);
            $student_missing_payment_coll = collect([]);
            foreach ($student_payment_load as $key) {

                foreach ($previous_month as $key2  ) {
                   // $student_payment_load['unpaid-'.$key->payment_type."-".$key2] = $key->amount;
                    $student_payment_load[] = ['student_id'=>$key->student_id,
                                             'payment_type_id'=>$key->payment_type_id,
                                             'payment_load_id'=>$key->payment_load_id,                                            
                                             'amount_payed'=>$key->amount,
                                             'payment_month'=>$key2
                    
                                            ]; 
                    $student_missing_payment_coll->push([ 'student_id'=>$key->student_id,
                    'payment_type_id'=>$key->payment_type_id,
                    'payment_load_id'=>$key->payment_load_id,                                            
                    'amount_payed'=>$key->amount,
                    'payment_month'=>$key2,
                    'status'=>'unknown'
                     ]);
                    // $student_missing_payment_coll = collect([
                    //    [ 'student_id'=>$key->student_id,
                    //     'payment_type_id'=>$key->payment_type_id,
                    //     'payment_load_id'=>$key->payment_load_id,                                            
                    //     'amount_payed'=>$key->amount,
                    //     'payment_month'=>$key2 ]
                        
                    // ]);
                
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
                            'status'=>'unpaid'
                        ]);

                    }
                
                
            }
            $sliced[] = $student_missing_payment_coll->slice($array_length2);
            
          // $sliced = $student_payment_load->slice($array_length);
          
           // foreach ($result_history as $individual_load) {
                foreach ($sliced as $compare) {
                   // error_log("hurraaaaaaaaaaay it checked".$compare);
                    // if (student_payment::where('student_id',$stud_id)
                    //                     ->where('payment_load_id',$compare->payment_load_id)
                    //                     ->where('payment_type_id',$compare->payment_type_id)
                    //                     ->where('payment_month',$compare->payment_month)
                    //                     ->exists()) {
                    //                         $counter++;
                    //     error_log("hurraaaaaaaaaaay it checked".$counter);
                    // }
                    
                }
           // }

            error_log($student_missing_payment_coll."from here");
  
        return response()->json(['unpaid_bill'=>$student_payment_load,'result_history'=>$result_history,'compared'=>$compare
                        ,'student_missing_payment_coll'=>$student_missing_payment_coll,'sliced'=>$sliced]);
    }

    public function makeTotalPayment(Request $req, $stud_id, $month){

        error_log("Heyyyyyyyyyyyy".$req);
        $total_payment = $req->detail;
        
       
        $res = null;
        $count = 0;
       
        foreach ($total_payment as $key) {
             if (!$key['amount'] == 0) {
            $student_payment = new student_payment();
            $student_payment->student_id = $stud_id;
            $student_payment->payment_type_id = $key['payment_type_id'];
            $student_payment->payment_load_id = $key['payment_load_id'];
            $student_payment->amount_payed = $key['amount'];
            $student_payment->payment_month = $month;
            $student_payment->save();
            //$total_payment = [];
            }

            
            
            $count++;
            

          }
          $student_payment = student_payment::all();
         
          return response()->json($student_payment);
        

    }
    public function makeIndividualPayment(Request $req, $stud_id, $month){
        $individual_payment = $req->detail;

        foreach ($individual_payment as $key) {
            
            $student_payment = new student_payment();
            $student_payment->student_id = $stud_id;
            $student_payment->payment_type_id = $key['payment_type_id'];
            $student_payment->payment_load_id = $key['payment_load_id'];
            $student_payment->amount_payed = $key['amount'];
            $student_payment->payment_month = $month;
            if ($student_payment->save()) {
                
                return response()->json($student_payment);
            }

          }
        
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
        
        if ($payment_load->save()) {
            $payment_load = DB::table('payment_loads')
            ->join('payment_types','payment_loads.payment_type_id','=','payment_types.id')
            ->join('classes','payment_loads.class_id','=','classes.id')
            ->get(['payment_loads.id as load_id','payment_type','class_label','amount']);
            return view('finance.view_payment_load')->with('payment_load',$payment_load);
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

        return view('finance.add_student_discount');
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
}
