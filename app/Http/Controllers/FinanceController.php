<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment_type;
use App\Models\student;

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

    public function indexAddPayment(){

        $view_payment_type = payment_type::all();
        $student_data = student::get(['student_id','first_name','middle_name','last_name']);
        //return $student_data;
        return view('finance.add_payments')->with('student_data',$student_data);
    }
}
