<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\classes;
use Illuminate\Http\Request;
use App\Models\subject;
use App\Models\stream;
use App\Models\subject_group;
use App\Models\SubjectGroup;
use Illuminate\Database;
use Illuminate\Support\Facades\DB;

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
            $classes = classes::all();
            // $subject->save();
            // $subject_list = subject::all();
            $subjects = subject::all();
            $subject_group = DB::table('subject_groups')
            ->join('classes','subject_groups.class_id','=','classes.id')
            ->join('subjects','subject_groups.subject_id','=','subjects.id')
            ->get();
            return view('admin/curriculum/view_subjects')->with('subject_list',$subject_list)->with('classes',$classes)->with('subjects',$subjects)->with('subject_group',$subject_group);

        }
    }
    function subjectGroup($classes,$subjects)
    {
        $class = explode(",",$classes);
        $subject = explode(",",$subjects);
        for($count = 0; $count<sizeOf($class)-1; $count++){
            for($count2 = 0; $count2<sizeOf($subject)-1; $count2++){
                $subject_group = new SubjectGroup();
                $subject_group->class_id = $class[$count];
                $subject_group->subject_id = $subject[$count2];
                $subject_group->save();
            }
        }
        $allSubjectGroup = DB::table('subject_groups')
                            ->join('classes','subject_groups.class_id','=','classes.id')
                            ->join('subjects','subject_groups.subject_id','=','subjects.id')
                            ->get();
        return response()->json($allSubjectGroup);
    }



    function viewsubject(){
      // $subject_list = subject::all();
      $subject_list = subject::all();
    $classes = classes::all();
    $subjects = subject::all();
    $subject_group = DB::table('subject_groups')
    ->join('classes','subject_groups.class_id','=','classes.id')
    ->join('subjects','subject_groups.subject_id','=','subjects.id')
    ->get();
    return view('admin/curriculum/view_subjects')->with('subject_list',$subject_list)->with('classes',$classes)->with('subjects',$subjects)->with('subject_group',$subject_group);
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
