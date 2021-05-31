<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subject;
use App\Models\classes;
use App\Models\stream;

class ClassController extends Controller
{
    //
    
   

   public function showSubjectList(){
        $data =subject::all();
        $stream_data = stream::all();
        // echo $stream_data;

    
        // $stream_data = array('amaharic' =>$stream_data);
        return view('add_class')->with('stream_data',$stream_data)->with('data',$data);
        // ->with('data'=>$data, 'stream_data'=>$stream_data);
     //  return view('add_class', array('data'=>$data, 'stream_data'=>$stream_data));
    }


    function addClass(Request $req){

        $data =subject::all();
        $stream_data = stream::all();
        $classes = classes::all();

        $classes = new classes;
        $classes->subject_id = $req->select_subject;
        $classes->stream_id = $req->stream_id;
        $classes->section_id = $req->select_section;
        $classes->class_label = $req->class_label;
                       
        if($classes->save()){
            return redirect()->route('/viewClass')->with('classes',$classes);
        }
       
        //return view('add_class')->with('stream_data',$stream_data)->with('data',$data);

        
    }

    function viewClass(){
        $classes = classes::all();
        return view('view_class')->with('classes',$classes);
    }
}
