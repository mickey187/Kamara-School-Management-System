<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subject;
use App\Models\stream;
use App\Models\subject_group;
use Illuminate\Database;


class SubjectController extends Controller
{
    //
    public function __construct()
{
    $this->middleware('auth');
}


    function index(){

        $stream_data = stream::all();
        return view('admin/curriculum/add_subject');
    }



    // function addSubjectGroup(Request $req){

    //     $subject_group = new subject_group;
    //     $subject_group->subject_group = $req->subjectgroup;
    //     $subject_group->save();
    //     $subject_group = subject_group::all();

    //    // $result = subject_group::all();
    //    return redirect()->route('viewsubjectgroup')->with('subject_group',$subject_group);
    // }
    function addSubject($subject)
    {
        $subject = new subject();
        $subject->subject_name = $subject;

        if ($subject->save()) {
            $subject_list = subject::all();
            // $subject->save();
            // $subject_list = subject::all();
            return redirect('/viewSubject')->with('subject_list', $subject_list);
            
        }
    }


    function viewsubject(){
      // $subject_list = subject::all();
      $subject_list = subject::all();


        return view('admin/curriculum/view_subjects')->with('subject_list',$subject_list);
    }

    function editSubject($id){

        $editSubject = subject::where('id',$id)->first();
        $stream_data = stream::all();

        return view('admin/curriculum/add_subject')
                    ->with('editSubject',$editSubject);




    }

    function editSubjectValue(Request $req, $id){
        //return $req->subjectname;
        $edit = subject::find($id);
      //  echo $edit;

       // $sub =array();
        $edit->stream_id = $req->stream_id;
        $edit->subject_name = $req->subjectname;




        if($edit->save()){
            $subject_list = subject::all();

          return redirect()->route('/viewSubject')->with('subject_list',$subject_list);
        }

    }

    function deleteSubject(Request $req){
        //echo $id;
       // $id = (int)$req;

        if(subject::destroy($req->delete)){
            $subject_list = subject::all();
            return redirect()->route('/viewSubject')->with('subject_list',$subject_list);
        }
        else{
            echo "failed";
        }

    }
}
