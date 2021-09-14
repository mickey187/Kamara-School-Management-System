<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\employee_job_position;
use Illuminate\Http\Request;

class AddJobPositionController extends Controller
{
    //<?php



    public function indexAddJobPosition(){
        return view('admin.employee.add_job_position');
    }
    public function addJobPosition(Request $req)
    {
        $position =new employee_job_position;
        // $position->position_name = $position2;
        $validated =  $req->validate(['position_name'=>'required|unique:employee_job_positions|max:10']);
        $position->position_name = $validated['position_name'];
        
        if ($position->save()) {
            
             $view_position = employee_job_position::all();
            
        return redirect()->route('/viewJobPosition')->with('view_position', $view_position);
        }
    }

  

    public function viewJobPosition()
    {
        $view_position = employee_job_position::all();
        return view('admin.employee.view_job_position')->with('view_position', $view_position);
    }


    public function editJobPosition($id)
    {
        $edit_emp_position = employee_job_position::find($id);
        return view('admin.employee.add_job_position')->with('edit_emp_position', $edit_emp_position);
    }

    public function editPositionValue($id)
    {
        $edit_emp_position = employee_job_position::find($id);
        $edit_emp_position->position_name = request('employee_position');
        if ($edit_emp_position->save()) {
            $view_position = employee_job_position::all();
           
            return redirect()->route('viewJobPosition')->with('view_position', $view_position);
        }
    }
    public function deleteJobPosition(Request $req){

        $position_id = $req->delete_btn;
        $position = employee_job_position::find($position_id);

        if ($position->delete()) {

            $view_position = employee_job_position::all();
           return redirect()->route('/viewJobPosition')->with('view_position',$view_position);
        }

        else 

        echo "couldn't delete please try again";
        
    }
}

