<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\classes;
use App\Models\stream;
use App\Models\subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Curriculum extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function indexCurriculum(){
        return view('admin.curriculum.all_curriculum');
    }

     public function addClass($class_label, $class_priority){
         $status = null;
         $class = new classes();
         $class->class_label = $class_label;
         $class->priority = $class_priority;

         if($class->save()){
             $status= 'success';
            return response()->json($status);
         }else{
             $status = 'failed';
             return response()->json($status);
         }
    }



public function viewClass(){
    $class = classes::all();
    return response()->json($class);
}

public function edit_class_label(Request $req){
    $edit_class_label = classes::find($req->id);
    $edit_class_label->class_label = $req->class_label_edit;
    $edit_class_label->priority = $req->priority_edit;

    if($edit_class_label->save()){
        return response()->json("success");
    }
}

public function delete_class_label(Request $request){
    $status = "";
    if(classes::destroy($request->delete_class_label_id)){
        $status = "success";
        return response()->json($status);
    }
}

public function indexAddSubject($subject_name){
    $status = null;
    $add_subject = new subject();
    $add_subject->subject_name = $subject_name;

    if($add_subject->save()){
        $status = 'success';
        return response()->json($status);
    }else{
        $status = 'failed';
        return response()->json($status);
    }
}

public function view_subject(){
    $subject = subject::all();
    return response()->json($subject);
}

public function edit_subject(Request $request){
    $subject = subject::find($request->id);
    $subject->subject_name = $request->edit_subject;

    if($subject->save()){
        return response()->json("success");
    }
}

public function delete_subject(Request $request){
    $status = "";
    if(subject::destroy($request->delete_subject_id)){
        $status = "success";
        return response()->json($status);
    }
}

public function indexaddStream($stream_type){
    $status = null;
    $add_stream = new stream();
    $add_stream->stream_type = $stream_type;

    if($add_stream->save()){
        $status = 'success';
        return response()->json($status);
    }else{
        $status = 'failed';
        return response()->json($status);
    }
}

public function view_stream(){
    $stream = stream::all();
    return response()->json($stream);
}

public function edit_stream(Request $request){
    $stream = stream::find($request->id);
    $stream->stream_type = $request->edit_stream;

    if($stream->save()){
        return response()->json("success");
    }
}

public function delete_stream(Request $request){
    $status = "";
    if(stream::destroy($request->delete_stream_id)){
        $status = "success";
        return response()->json($status);
    }
}

};