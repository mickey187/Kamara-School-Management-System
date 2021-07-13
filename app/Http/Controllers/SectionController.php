<?php

namespace App\Http\Controllers;

use App\Models\classes;
use App\Models\stream;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{

    public function index(){
        $class = classes::all();
        $stream = stream::all();


        return view('admin.student.student_section')->with('class',$class)->with('stream',$stream);
        //return $student;
    }
    public function fetchStudent($class_id,$stream_id){
        $class = DB::table('students')
        ->join('classes','classes.id','=','students.class_id')
        ->join('streams','streams.id','=','students.stream_id')
        ->where('class_id',$class_id)
        ->where('stream_id',$stream_id)
        ->get();
        //$class = student::where('class_id',$class_id)->where('stream_id',$stream_id)->get();
        return response()->json($class);
    }
}
