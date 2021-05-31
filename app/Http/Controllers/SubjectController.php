<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subject;
use App\Models\stream;


class SubjectController extends Controller
{
    //

    function openView(){

        $stream_data = stream::all();
        return view('add_subject',['stream_data'=>$stream_data]);
    }
    function addSubject(Request $req)
    {
        $subject_list = subject::all();

        $subject = new subject;
        $subject->stream_id = $req->stream_id; 
        $subject->subject_group = $req->subjectgroup;
        $subject->subject_name = $req->subjectname;
        
        
        $subject->save();
        return redirect('/viewSubject')->with('subject_list',$subject_list);;
    }

    function viewsubject(){
        $subject_list = subject::all();
        
        return view('view_subjects')->with('subject_list',$subject_list);
    }
}
