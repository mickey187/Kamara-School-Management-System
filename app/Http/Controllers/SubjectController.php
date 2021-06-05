<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subject;
use App\Models\stream;
use App\Models\subject_group;
use DB;


class SubjectController extends Controller
{
    //

    function index(){

        $stream_data = stream::all();
        $subject_group = subject_group::all();
        return view('admin/curriculum/add_subject')->with('stream_data',$stream_data)
                    ->with('subject_group',$subject_group);
    }

    function indexSubjectGroup(){

        return view('admin/curriculum/add_subject_group');
    }

    function addSubjectGroup(Request $req){
        $subject_group = new subject_group;
        $subject_group->subject_group = $req->subjectgroup;
        $subject_group->save();

        $result = subject_group::all();
        echo $result;
    }
    function addSubject(Request $req)
    {
        $subject_list = subject::all();

        $subject = new subject;
        $subject->stream_id = $req->stream_id; 
        $subject->subject_group_id = $req->subjectgroup;
        $subject->subject_name = $req->subjectname;
        
        
        $subject->save();
        return redirect('/viewSubject')->with('subject_list',$subject_list);;
    }

    function viewsubject(){
      // $subject_list = subject::all();
      $subject_list = DB::table('subjects')
                                ->join('streams', 'subjects.stream_id', '=' ,'streams.id')
                                ->join('subject_groups','subjects.subject_group_id', '=', 'subject_groups.id')
                                ->get(['subjects.id','stream_type','subject_groups.subject_group',
                                'subject_name','subjects.id']);
       
        
        return view('admin/curriculum/view_subjects')->with('subject_list',$subject_list);
    }

    function editSubject($id){
       
        $editSubject = subject::where('id',$id)->first();
        $stream_data = stream::all();
        $subject_group = subject_group::all();
        return view('admin/curriculum/add_subject')->with('stream_data',$stream_data)
                    ->with('subject_group',$subject_group)->with('editSubject',$editSubject);

        


    }

    function editSubjectValue(Request $req, $id){
        //return $req->subjectname;
        $edit = subject::find($id);
        $sub =array();
        $sub['stream_id']=$req->stream_id;
        $sub['subject_name']=$req->subjectname;
        $sub['subject_group_id']=$req->subjectgroup;
    
        $edit->update($sub);

        if($edit->save()){
            echo " 1 row affected";
  //          return redirect()->route('/viewSubject');
        }
        
    }

    function deleteSubject(Request $req){
        echo $req;
    }
}
