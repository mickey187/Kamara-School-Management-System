<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment_type;
use App\Models\payment_load;
use App\Models\student;
use App\Models\classes;
use DB;


class FinanceController extends Controller
{
    //indexAddPaymentType function

    public function indexAddPaymentType(){
        return view('finance.add_payment_type');
    }

    public function addPaymentType(Request $req){

        $payment_type = new payment_type();
        $payment_type->payment_type = $req->payment_type;
        if ($payment_type->save()) {
            $view_payment_type = payment_type::all();
            return view('finance.view_payment_type')->with('view_payment_type',$view_payment_type);
        }
    }

    public function viewPaymentType(){
        $view_payment_type = payment_type::all();

        return view('finance.view_payment_type')->with('view_payment_type',$view_payment_type);


    }

    public function indexAddTuitionPayment(){

        $view_payment_type = payment_type::all();
        $student_data = student::get(['student_id','first_name','middle_name','last_name']);
        //return $student_data;
        return view('finance.add_tuition_payments')->with('student_data',$student_data);
    }

    public function viewTuitonPayment(){

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
}
