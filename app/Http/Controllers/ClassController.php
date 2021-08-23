<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subject;
use App\Models\classes;
use App\Models\section;
use App\Models\stream;
use App\Models\class_subject;
use App\Models\subject_group;
use RealRashid\SweetAlert\Facades\Alert;
use Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
}



//load the add_class_subject page
   public function indexAddClassSubject(){

      $subject = subject::all();
      $stream = stream::all();
      $class_data = classes::all();
   // return $class_data;
//       $class_data = DB::table('classes')
//                              ->join('streams','classes.stream_id','=','streams.id')
//    ->get(['classes.id as class_id','streams.id as stream_id','class_label','stream_type']);
                             //return $class_data;


                                 return view('admin/curriculum/add_class_subject')->with('class_data',$class_data)
                                 ->with('subject',$subject)->with('stream',$stream);

    }

    public function indexClassLabel(){
        $stream = stream::all();


        return view('admin/curriculum/add_class_label')->with('stream',$stream);
    }

   public function viewclasslabel(){

    $class_label = classes::all();


    return view('admin/curriculum/view_class_label')->with('class_label',$class_label);
    }

   public function addClassLabel(Request $req){
       $class = new classes();
       $class->class_label = $req->class_label;
       $class->priority = $req->class_priority;
       if ( $class->save()) {
           $class_label = classes::all();
           return redirect()->route('viewclasslabel')->with('class_label',$class_label);

       }

       else echo "Failed to add class please try again";
   }

   public function deleteClassLabel(Request $req){
    $class_label_id = $req->delete_btn;
    $class_label = classes::find($class_label_id);

    if ($class_label->delete()) {
        $class_data = classes::all();

        return redirect()->route('viewclasslabel')->with('class_data',$class_data);
    }

   }

   public function editClassLabel($id){

    $class_label = classes::find($id);
    return view('admin.curriculum.add_class_label')->with('class_label', $class_label);
   }

   public function editClassLabelValue(Request $req, $id){

    $class_label = classes::find($id);
    $class_label->class_label = $req->class_label;

    if ($class_label->save()) {

        $class_data = classes::all();
        return redirect()->route('viewclasslabel')->with('class_label',$class_label);
    }

    else echo"please try again";

   }


    function addClassSubject(Request $req){
       // return $req;



        $subjects_id = $req->input('subjects');
        $class_id = $req->input('class_label');
        $stream_id = $req->stream;

//$class = array($req->input('class_label'));
        foreach($class_id as $cls){

            foreach ($subjects_id as $sub) {

                // $insert_cls_sub = array(
                //     array('class_id'=> $cls,'subject_id'=>$sub)
                // );
                // class_subject::insert($insert_cls_sub);

                $class_subject = new class_subject();
                $class_subject->class_id = $cls;
                $class_subject->subject_id = $sub;
                $class_subject->stream_id = $stream_id;
                $bools = $class_subject->save();






            }


        }




 if($bools){
    $class_data = DB::table('class_subjects')
    ->join('classes','class_subjects.class_id','=','classes.id')
    ->join('streams','class_subjects.stream_id','=','streams.id')
    ->join('subjects','class_subjects.subject_id','=','subjects.id')
    ->get(['class_label','subject_name','stream_type']);
return redirect()->route('/viewClassSubject');
 }

 }




    function viewClassSubject(){

        $class_data = DB::table('class_subjects')
                                ->join('classes','class_subjects.class_id','=','classes.id')
                                ->join('streams','class_subjects.stream_id','=','streams.id')
                                ->join('subjects','class_subjects.subject_id','=','subjects.id')
                                ->get(['class_subjects.id as cls_sub_id','class_label','subject_name','stream_type'
                                    ,'subjects.id as sub_id']);

                                return view('admin/curriculum/view_class_subject')->with('class_data',$class_data);
        $class_data = array();
        $class = classes::all();
        foreach ($class as $cls) {
            # code...
        //     print($cls->id);
        //    print($cls->class_label);
            array_push($class_data,($cls->class_label));

            $class_subject = DB::table('class_subjects')
                                        ->join('streams','class_subjects.stream_id','=','streams.id')
                                        ->join('subjects','class_subjects.subject_id','=','subjects.id')
                                        ->where('class_subjects.class_id',$cls->id)
                                        ->get();
            //$class_subject = class_subject::where('class_id',$cls->id)->get();
            $stream = 0;
            // dd($class_subject);
            $subject_array = array();
            foreach ($class_subject as $subject ) {
                # code...
                if($stream ==0){
                    $stream = $subject->stream_type;
                }elseif($stream!= $subject->stream_type){
                    $stream = $subject->stream_type;
                }

                // print($subject->subject_id );
                // print($subject->subject_name);
               array_push($subject_array,array('subject_id'=>$subject->subject_id,'subject_name'=>$subject->subject_name));
            }

           // print($stream);
            array_push($class_data,$subject_array,$stream);
           // print('<br>');

        }


    }

    public function editClassSubject($id){

        //return $id;
        $edit_cls_sub = class_subject::find($id);
        $class_data = classes::all();
        $stream = stream::all();
        $subject = subject::all();
        return view('admin.curriculum.add_class_subject')->with('class_data',$class_data)
        ->with('edit_cls_sub',$edit_cls_sub)->with('stream',$stream)->with('subject',$subject);
    //     $subject = subject::all();
    //     $stream = stream::all();

    //     $cls_sub_selected = class_subject::find($id);
    //     $class_id_selected = $cls_sub_selected->class_id;
    //     //return $cls_sub_selected;

    //    // $class_data = classes::all();
    //    $class_data = DB::table('classes')
    //                          ->join('streams','classes.stream_id','=','streams.id')
    //             ->get(['classes.id as class_id','streams.id as stream_id','class_label','stream_type']);


    //     $cls_subject = DB::table('class_subjects')
    //     ->join('classes','class_subjects.class_id','=','classes.id')
    //     //->join('streams','classes.id','=','streams.id')
    //     ->join('subjects','class_subjects.subject_id','=','subjects.id')
    //     ->where('class_subjects.id',$id)/*->where('subject_id',$id_sub)*/
    // ->get(/*['classes.id','class_label','subject_name','stream_type']*/);
    //     // return $cls_subject;
    //     $id_cls = $id;

    //     foreach($cls_subject as $key){
    //        $id_edit = $key->id;
    //       // $stream_edit = $key->stream_type;
    //        $subject_edit = $key->subject_name;

    //     }
    //return $class_data;
        // return view('admin.curriculum.add_class_subject')->with('cls_subject',$cls_subject)
        //                         ->with('subject',$subject)->with('stream',$stream)
        //                         ->with('class_data',$class_data)->with('id_edit',$id_edit)
        //                        /* ->with('stream_edit',$stream_edit)*/->with('subject_edit',$subject_edit)
        //                         ->with('id_cls',$id_cls)->with('class_id_selected',$class_id_selected);
    }

    public function editClassSubjectValue(Request $req, $id_cls){


        $cls_subject = class_subject::find($id_cls);
        //return $cls_subject;
        $class_label_id = $req->input('class_label');
        $subject_id = $req->input('subjects');


       // $cls_subject->id = $id_cls;
        $cls_subject->class_id = $class_label_id[0];
        $cls_subject->stream_id = $req->stream;
        $cls_subject->subject_id = $subject_id[0];

        if ($cls_subject->save()) {
            $class_data = DB::table('class_subjects')
            ->join('classes','class_subjects.class_id','=','classes.id')
            ->join('streams','class_subjects.stream_id','=','streams.id')
            ->join('subjects','class_subjects.subject_id','=','subjects.id')
            ->get(['class_subjects.id as cls_sub_id','class_label','subject_name','stream_type'
                ,'subjects.id as sub_id']);
        return redirect()->route('/viewClassSubject')->with('class_data',$class_data);
        }

    }

   public function deleteClassSubject(Request $req){
     $class_subject_id = $req->cls_subject;

     $class_subject = class_subject::find($class_subject_id);



     if ($class_subject->delete()) {
        $class_data = DB::table('class_subjects')
        ->join('classes','class_subjects.class_id','=','classes.id')
        ->join('streams','class_subjects.stream_id','=','streams.id')
        ->join('subjects','class_subjects.subject_id','=','subjects.id')
        ->get(['class_label','subject_name','stream_type']);
    return redirect()->route('/viewClassSubject')->with('class_data',$class_data);
     }
    }



    function getSubjects(Request $req, $class_group){


        $subject = subject::where('subject_group_id',$class_group)->get();
        return response()->json($subject);
    }
}
