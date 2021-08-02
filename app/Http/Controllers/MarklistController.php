<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\MarklistImport;
use App\Imports\StudentImport;
use App\Models\assasment_type;
use App\Models\classes;
use App\Models\semister;
use App\Models\student;
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

    public function singleAddMarkList($student_id,$class_id,$semister_id,$assasment_id,$subject,$mark,$load){
        $sub = subject::where('subject_name',$subject)->get('id')->first();
        $mark_list = new student_mark_list();
        $mark_list->student_id = $student_id;
        $mark_list->semister_id = $semister_id;
        $mark_list->class_id = $class_id;
        $mark_list->mark = $mark;
        $mark_list->test_load = $load;
        $mark_list->subject_id = $sub->id;
        $mark_list->academic_year = date("Y");
        $mark_list->assasment_type_id = $assasment_id;
        if($mark_list->save()){
            $as = assasment_type::where('id',$assasment_id)->get('assasment_type')->first();
            //'class_label']);
            $mark2 = DB::table('student_mark_lists')
                  //  ->join('students','student_mark_lists.student_id','=','students.id')
                    ->join('classes','student_mark_lists.class_id','=','classes.id')
                    ->join('semisters','student_mark_lists.semister_id','=','semisters.id')
                    ->join('assasment_types','student_mark_lists.assasment_type_id','=','assasment_types.id')
                    ->join('subjects','student_mark_lists.subject_id','=','subjects.id')
                    ->where('classes.id',$class_id)
                    ->where('subject_name',$subject)
                    ->where('student_mark_lists.student_id',$student_id)
                    ->where('semisters.id',$semister_id)
                    ->get(['semisters.semister',
                            'semisters.term',
                            'student_mark_lists.student_id as student_id',
                            'student_mark_lists.test_load',
                            'semisters.id as semister_id',
                            'student_mark_lists.id as id',
                            'assasment_types.assasment_type',
                            'assasment_types.id as assid',
                            'subjects.subject_name',
                            'subjects.id as subject_id',
                            'semisters.id as semid',
                            'student_mark_lists.mark']);
            return response()->json(['mark'=>$mark2,'new'=>$mark_list->id]);
        }else{
            return response()->json("Error");
        }
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
