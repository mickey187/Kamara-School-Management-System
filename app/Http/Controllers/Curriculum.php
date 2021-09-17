<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\classes;
use App\Models\stream;
use App\Models\subject;
use App\Models\SubjectGroup;
use App\Models\SubjectPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class Curriculum extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function indexCurriculum(){
        // $subject = DB::table('subject_groups')
        // ->join('subjects','subject_groups.subject_id','=' , 'subjects.id')
        // ->get();
        $subject = subject::all();
        $subject_group = DB::table('subject_groups')
        ->join('subjects','subject_groups.subject_id','=' , 'subjects.id')
        ->join('classes','subject_groups.class_id' , '=' ,'classes.id')
        ->get();
        return view('admin.curriculum.all_curriculum')->with('classes', classes::all())->with('subjects',$subject )
        ->with('subject_group',$subject_group);
    }

     public function addClass(Request $req){
         $validator = Validator::make($req->all(),[
             'class_label'=>'required|unique:classes|max:4',
             'priority'=>'required',
         ]);
         if($validator->passes()){
             $class = new classes();
             $class->class_label =$req->class_label;
             $class->priority = $req->priority;

             if($class->save()){
                 $status ='success';
                 return response()->json((['status'=>'success']));
             }else{
                 $status = 'failed';
                 return response()->json((['status'=>'failed']));
             }

            }
            return response()->json(['status'=>$validator->errors()->all()]);
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

    public function indexAddSubject(Request $req){
        $validator =Validator::make($req->all(), [
            'subject_name'=>'required|max:5',
        ]);
        if ($validator->passes()) {
            $subject = new subject();
            $subject->subject_name = $req->subject_name;

            if ($subject->save()) {
                $status = 'success';
                return response()->json((['status'=>'success']));
            } else {
                $status = 'failed';
                return response()->json((['status'=>'failed']));
            }
        }
        return response()->json(['status'=>$validator->errors()->all()]);
    }

    public function view_subject(){
        $subjects = subject::all();
        // $classes = classes::all();

        return response()->json($subjects);
    }

    function view_subject_group($classes,$subjects)
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

    public function get_subject_for_period($class){
            $collection = collect();

                $subject_group = DB::table('subject_groups')
                ->join('classes','subject_groups.class_id','=','classes.id')
                ->join('subjects','subject_groups.subject_id','=','subjects.id')
                ->where('subject_groups.class_id',(int) $class)
                ->get(['subject_groups.id','subjects.subject_name','class_label']);
                foreach($subject_group as $row){
                        $item = (object) ['subject'=>$row->subject_name,'id'=>$row->id, 'class'=>$row->class_label];
                        $collection->push($item);
                    // }
                }
            // }
            return response()->json($collection);
        }

    public function set_subject_period($class,$period,$subject){
        $subjects = explode(",",$subject);
        for ($i=0; $i < count($subjects); $i++) {
            $Period = SubjectPeriod::where('subject_group_id',$subjects[$i])
                                    ->where('class_id',(int) $class)->get()->first();
            if (!$Period) {
                $setPeriod = new SubjectPeriod();
                $setPeriod->subject_group_id = $subjects[$i];
                $setPeriod->class_id = (int) $class;
                $setPeriod->total_period =(int) $period;
                if(!$setPeriod->save()){
                    return response()->json("error-Error-Error Happen While inserting");
                }
            }else{
                return response()->json("warning-Warning-Already Exist");
            }

        }
        return response()->json("success-Successful-Successfuly Inserted");
    }

    public function indexaddStream(Request $req){
    $validator = Validator::make($req->all(),[
    'stream_type'=>'required|unique:streams|max:30',
    ]);

    if($validator->passes()){
        $stream = new stream();
        $stream->stream_type = $req->stream_type;

        if($stream->save()){
            $status = 'success';
            return response()->json((['status'=>'success']));
        }else{
            $status ='failed';
            return response()->json((['status'=>'failed']));
        }
    }
        return response()->json(['status'=>$validator->errors()->all()]);
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

    public function getCLassStreamSection(){
        $class = classes::all();
        $stream = stream::all();

        return response()->json(['class'=>$class,'stream'=>$stream]);
    }

    public function getCLassStreamSection2($class_id,$stream_id){
        $section = DB::table('sections')
            ->where('class_id',$class_id)
            ->where('stream_id',$stream_id)
            ->distinct('section_name')
            ->get('section_name');

        return response()->json($section);
    }

}
