<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee_religion;
use Illuminate\Database;

class AddReligionController extends Controller
{
    public function addReligionPage(){
        return view('admin.employee.add_religion');
    }


   public function addReligion(Request $req)
    {
        $religion =new employee_religion;
        $validated = $req->validate(['religion_name'=>'required|unique:employee_religions|max:30']);
        $religion->religion_name = $validated['religion_name'];
        
        if ($religion->save()) {
            $view_religion = employee_religion::all();
        return redirect()->route('/viewReligion')->with('view_religion', $view_religion);
        }
    }

    public function viewReligion()
    {
        $view_religion = employee_religion::all();
        return view('admin.employee.view_religion')->with('view_religion', $view_religion);
    }


    public function editReligion($id)
    {
        $edit_employee_religion = employee_religion::find($id);
        return view('admin.employee.add_religion')->with('edit_employee_religion', $edit_employee_religion);
    }

    public function editReligionValue($id)
    {
        $edit_employee_religion = employee_religion::find($id);
        $edit_employee_religion->religion_name = request('employee_religion');
        
        if ($edit_employee_religion->save()) {
            $view_religion = employee_religion::all();
           
            return redirect()->route('viewReligion')->with('view_religion', $view_religion);
        }
    }
    public function deleteReligion(Request $req){
        

        $religion_id = $req->delete_btn;
        $religion = employee_religion::find($religion_id);

        if ($religion->delete()) {

            $view_religion = employee_religion::all();
           return redirect()->route('viewReligion')->with('view_religion',$view_religion);
        }

        else 

        echo "couldn't delete please try again";
        
    }
}