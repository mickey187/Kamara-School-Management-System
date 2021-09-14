<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\employee_job_position;
use App\Models\employee_religion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EmployeeInformationController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexEmployee(){
        return view('admin.employee.employee_info');
    }

    public function add_position(Request $request){
            $validator = Validator::make($request->all() , [
            'position_name' => 'required|unique:employee_job_positions|max:30',
            

        ]);

        if($validator->passes()){
             $employee_position = new employee_job_position();
             $employee_position->position_name = $request->position_name;
             
              if($employee_position->save()){
             $status = 'success';
            return response()->json((['status'=>'success']));
       }else{
             $status = 'failed';
            return response()->json((['status'=>'failed']));
         }
        }
        return response()->json(['status'=>$validator->errors()->all()]);
    }


    public function view_position(){
        $position = employee_job_position::all();
        return response()->json($position);
    }

    public function deleteJobPosition(Request $req){
        $status = "";
        if(employee_job_position::destroy($req->delete_posiition_id)){
            $status = "success";
            return response()->json($status);
        }
    }

    public function edit_job_position(Request $req){
        $job_position = employee_job_position::find($req->id);
        $job_position->position_name = $req->job_position_edit;

        if($job_position->save()){
            
            return response()->json("success");
        }
    }

    public function add_religion(Request $request){
             $validator = Validator::make($request->all() ,[
            'religion_name'=>'required|unique:employee_religions|max:30',
        ]);

            if($validator->passes()){
             $employee_religion = new employee_religion();
             $employee_religion->religion_name = $request->religion_name;
              if($employee_religion->save()){
             $status = 'success';
            return response()->json((['status'=>'success']));
       }else{
             $status = 'failed';
            return response()->json((['status'=>'failed']));
         }
        }
        return response()->json(['status'=>$validator->errors()->all()]);
    }

    public function view_religion(){
        $religion = employee_religion::all();
        return response()->json($religion);
    }

    public function edit_religion(Request $req){
        $emp_religion = employee_religion::find($req->id);
        $emp_religion->religion_name = $req->religion_edit;

        if($emp_religion->save()){
            return response()->json("success");
        }
    }

    public function delete_religion(Request $request){
        $status = "";
        if(employee_religion::destroy($request->delete_religion_id)){
            $status = "success";
            return response()->json($status);
        }
    }
};
