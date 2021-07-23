<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\MarklistImport;
use App\Imports\StudentImport;
use App\Models\assasment_type;
use App\Models\classes;
use App\Models\semister;
use App\Models\student_mark_list;
use App\Models\subject;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class MarklistController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function addMarkListForm(){
        $ass = assasment_type::all();
        $classes = classes::all();
        $sub = subject::all();
        $semister = semister::all();
        return view('admin.curriculum.add_marklist')
        ->with('assasment',$ass)
        ->with('classes',$classes)
        ->with('subject',$sub)
        ->with('semister',$semister);
    }

    public function import(Request $request){
        Excel::import(new MarklistImport, $request->Excel);
        $ass = assasment_type::all();
        $classes = classes::all();
        $sub = subject::all();
        $semister = semister::all();
        return view('admin.curriculum.add_marklist')
        ->with('assasment',$ass)
        ->with('classes',$classes)
        ->with('subject',$sub)
        ->with('semister',$semister);
    }

    public function sample_student(Request $request){
        Excel::import(new StudentImport, $request->excel);
         return "Student inserted";
    }

    public function addAssasment(){
        $assasment = new assasment_type();
        $assasment->assasment_type = request('assasment_label');
        $assasment->save();
        $ass = assasment_type::all();
        return view('admin.curriculum.add_assasment_label')->with('assasment',$ass);
    }

    public function assasmentForm(){
        $ass = assasment_type::all();
        return view('admin.curriculum.add_assasment_label')->with('assasment',$ass);
    }

    public function editMarkStudentList($id,$mark,$load,$assasment){
        $mark_list = student_mark_list::find($id);
        $mark_list->mark = $mark;
        $mark_list->test_load = $load;
        if($mark_list->update()){
            return response()->json($id);
        }else{
            return response()->json('Error While Updating');
        }
      //  return response()->json($mark);

    }
}
