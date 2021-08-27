<?php

namespace App\Http\Controllers;

use App\Models\assasment_type;
use App\Models\classes;
use App\Models\course_load;
use App\Models\home_room;
use App\Models\section;
use App\Models\semister;
use App\Models\stream;
use App\Models\student;
use App\Models\student_mark_list;
use App\Models\teacher;
use App\Models\teacher_course_load;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Averages;

class SectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $class = classes::all();
        $stream = stream::all();
        return view('admin.student.student_section')->with('class',$class)->with('stream',$stream);
        //return $student;
    }
    public function fetchStudent($class_id,$stream_id){
        $label = '';
        $status = '';
        $section = array();
        $class = DB::table('sections')
        ->join('students','students.id','=','sections.student_id')
        ->join('classes','classes.id','=','sections.class_id')
        ->join('streams','streams.id','=','students.stream_id')
        ->where('sections.class_id',$class_id)
        ->where('students.stream_id',$stream_id)
        ->get(['students.student_id','stream_type','section_name','class_label',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')]);


        foreach($class as $row){
            if(($label == '') || ($label != $row->section_name)){
                $label = $row->section_name;
                array_push($section,$row->section_name);
            }
        }
        if($label==''){
            $status = 'false';

            $class = DB::table('students')
                ->join('classes','classes.id','=','students.class_id')
                ->join('streams','streams.id','=','students.stream_id')
                ->where('students.class_id',$class_id)
                ->where('students.stream_id',$stream_id)
                ->get(['students.student_id','stream_type','classes.class_label',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')]);
                return response()->json(['classes'=>$class,'sections'=>$section,'status'=>$status]);
            }else{
                $status = 'true';
                return response()->json(['classes'=>$class,'sections'=>$section,'status'=>$status]);
        }
    }
    public function setSection($class_id,$stream_id,$section,$room){

        if($section == 'Alphabet'){
            $student = student::where('class_id',$class_id)->where('stream_id',$stream_id)->orderBy('first_name','ASC')->get();
            $this->sectionLogic($student,$room);
            $label = '';
            $status = '';
            $section = array();
            $class = DB::table('sections')
            ->join('students','students.id','=','sections.student_id')
            ->join('classes','classes.id','=','sections.class_id')
            ->join('streams','streams.id','=','students.stream_id')
            ->where('sections.class_id',$class_id)
            ->where('students.stream_id',$stream_id)
            ->get(['students.student_id','stream_type','section_name','class_label',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')]);
            // ->get();

            foreach($class as $row){
                if(($label == '') || ($label != $row->section_name)){
                    $label = $row->section_name;
                    array_push($section,$row->section_name);
                }
            }
            if($label==''){
                $status = 'false';
                // $class = DB::table('students')
                //     ->join('classes','classes.id','=','students.class_id')
                //     ->join('streams','streams.id','=','students.stream_id')
                //     ->where('students.class_id',$class_id)
                //     ->where('students.stream_id',$stream_id)
                //     ->get(['students.student_id','streams.stream_type','students.class_id as section_name','class_label',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')]);
                //     // ->get();
                    error_log("");
            }else{
                $status = 'true';
            }
            return response()->json(['classes'=>$class,'sections'=>$section,'status'=>$status]);
            // return response()->json("Set With Alaphabet");
            // return view('admin.student.student_section')->with('class',$class)->with('stream',$stream);
        }else if($section == 'RegistrationDate'){
            $student = student::where('class_id',$class_id)->where('stream_id',$stream_id)->orderBy('created_at','ASC')->get();
            $this->sectionLogic($student,$room);
            $label = '';
            $status = '';
            $section = array();
            $class = DB::table('sections')
            ->join('students','students.id','=','sections.student_id')
            ->join('classes','classes.id','=','sections.class_id')
            ->join('streams','streams.id','=','students.stream_id')
            ->where('sections.class_id',$class_id)
            ->where('students.stream_id',$stream_id)
            ->get();
            foreach($class as $row){
                if(($label == '') || ($label != $row->section_name)){
                    $label = $row->section_name;
                    array_push($section,$row->section_name);
                }
            }
            if($label==''){
                $status = 'false';
                $class = DB::table('students')
                    ->join('classes','classes.id','=','students.class_id')
                    ->join('streams','streams.id','=','students.stream_id')
                    ->where('students.class_id',$class_id)
                    ->where('students.stream_id',$stream_id)
                    ->get();
            }else{
                $status = 'true';
            }
            return response()->json(['classes'=>$class,'sections'=>$section,'status'=>$status]);
        }

    }

    public function sectionLogic($student,$size){
        $count_students = 0;

        $count_ = 0;
        $section_label = 0;
        $alphabet = array( 'a', 'b', 'c', 'd', 'e',
        'f', 'g', 'h', 'i', 'j',
        'k', 'l', 'm', 'n', 'o',
        'p', 'q', 'r', 's', 't',
        'u', 'v', 'w', 'x', 'y',
        'z'
        );

        foreach($student as $row){
            $sectioned_student = section::where('student_id',$row->id)->get()->first();
            if($sectioned_student){
                $count_students = $count_students+1;
            }else{
                $section = new section();
                $section->class_id = $row->class_id;
                $section->student_id = $row->id;
                $section->stream_id = $row->stream_id;
                $section->section_name = strtoupper($alphabet[$section_label]);
                $section->save();
                if($count_ > $size){
                    $count_ = 0;
                    $section_label = $section_label + 1;
                }
                $count_ = $count_ + 1;
            }
        }
        return $count_students;
    }
    public function semister(Request $request){
        $semister = semister::all();
        return view('admin.curriculum.add_semister')->with('semister',$semister);
    }

    public function insertSemister(Request $request){
        $semister = semister::all();
            $semister_ = new semister();
            $semister_->semister = $request->semister;
            $semister_->term = $request->term;
            $semister_->current_semister = false;
            $semister_->save();

        return view('admin.curriculum.add_semister')->with('semister',$semister);
    }

    public function customSection($section , $student){
        $studentSplitter = explode(",",$student);
        $count = 0;
        for($i = 0; $i < sizeof($studentSplitter); $i++){
            $getSectionTable = new section();
            $getStudentTable = student::where("student_id",$studentSplitter[$i])->get()->first();
            $getSectionTable->section_name = $section;
            $getSectionTable->class_id = $getStudentTable->class_id;
            $getSectionTable->stream_id = $getStudentTable->stream_id;
            $getSectionTable->student_id = $getStudentTable->id;
            $getSectionTable->save();
            $count++;
        }
        return response()->json($count." Students Set To Section ".$section);
    }




    public function getSectionedClasses(){
        $getSectionedClass = section::all();
        $classes = array();
        $collection = collect();

        foreach($getSectionedClass as $row){
            $class = classes::where('id',$row->class_id)->get()->first();
            $stream = stream::where('id',$row->stream_id)->get()->first();

            if (!(in_array($class->class_label.'-'.$stream->stream_type,$classes))) {
                array_push($classes,$class->class_label.'-'.$stream->stream_type);
                $studentItem = (object) ["class"=>$class->class_label,"stream"=>$stream->stream_type,"section"=>$row->section_name];
                $collection->push($studentItem);
            }
        }

        $getAllStudent = DB::table('sections')
                            ->join('students','sections.student_id','=','students.id')
                            ->join('classes','sections.class_id','=','classes.id')
                            ->join('streams','sections.stream_id','=','streams.id')
                            ->get();

        return response()->json(["class"=>$collection,"student"=>$getAllStudent]);
    }



    public function getNotSectionedClasses(){
        $collection = collect();
        $classes = array();
        $getStudents = student::all();
        foreach($getStudents as $row){
            $class = classes::where('id',$row->class_id)->get()->first();
            $stream = stream::where('id',$row->stream_id)->get()->first();
            $getSection = section::where('student_id',$row->id)->get()->first();
            if (!$getSection && !(in_array($class->class_label.'-'.$stream->stream_type,$classes))) {
                $studentItem = (object) ["class"=>$class->class_label,"stream"=>$stream->stream_type,"priority"=>$class->priority];
                $collection->push($studentItem);
                array_push($classes,$class->class_label.'-'.$stream->stream_type);

            }
        }
        return response()->json($collection);
    }

    public function getAllStudentForSectionning(){
        $collection = collect();
        $getStudents = DB::table('students')
                        ->join('classes','students.class_id','=','classes.id')
                        ->join('streams','students.stream_id','=','streams.id')
                        ->get(['students.id','students.student_id','classes.class_label','streams.stream_type',DB::raw('CONCAT(students.first_name," ",students.middle_name," ",students.last_name) AS full_name')]);
        foreach($getStudents as $row){
            $section = section::where("student_id",$row->id)->get()->first();
            if(!$section){
                $studentItem = (object) ["student_id"=>$row->student_id,"class_label"=>$row->class_label,"stream_type"=>$row->stream_type,"full_name"=>$row->full_name];
                $collection->push($studentItem);
            }
        }
        return response()->json($collection);
    }

    public function assignSectionForStudent($student,$section){
        $getStudent = student::where('student_id',(int)$student)->get()->first();
        $setSection = new section();
        $setSection->student_id = $getStudent->id;
        $setSection->class_id = $getStudent->class_id;
        $setSection->stream_id = $getStudent->stream_id;
        $setSection->section_name = $section;
        if($setSection->save()){
            return response()->json("successfuly Inserted");
        }else{
            return response()->json("Error Happen");
        }
    }


    public function setSectionForClass($classes,$stream){
        // class
            $clas = classes::where("class_label",$classes)->get()->first();
        // stream
            $str = stream::where("stream_type",$stream)->get()->first();

            $getStudent = DB::table('students')
                            // ->join('sections','sections.student_id','=','students.id')
                            ->join('classes','students.class_id','=','classes.id')
                            ->join('streams','students.stream_id','=','streams.id')
                            ->where('classes.id',$clas->id)
                            ->where('streams.id',$str->id)
                            ->get(['students.id','class_label','stream_type','student_id',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')]);
            $collection = collect();
            foreach($getStudent as $row){
                $notSectioned = section::where('student_id',$row->id)->get()->first();
                if(!$notSectioned){
                    $studentItem = (object) ["class_label"=>$row->class_label,"stream_type"=>$row->stream_type,"full_name"=>$row->full_name,"student_id"=>$row->student_id];
                    $collection->push($studentItem);
                }
            }

            $label = '';
            $status = '';
            $section = collect();
            $class = DB::table('sections')
                    ->join('students','students.id','=','sections.student_id')
                    ->join('classes','classes.id','=','sections.class_id')
                    ->join('streams','streams.id','=','students.stream_id')
                    ->where('sections.class_id',$clas->id)
                    ->where('students.stream_id',$str->id)
                    ->get();
            foreach($class as $row){
                if(($label == '') || ($label != $row->section_name)){
                    $label = $row->section_name;
                    $studentItem = (object) ["section"=>$label,"size"=>sizeof(section::where('class_id',$clas->id)->where('stream_id',$str->id)->where('section_name',$label)->get())];
                    $section->push($studentItem);
                }
            }

        return response()->json(["getStudent"=>$collection,"section"=>$section]);
    }

    public function setSectionForSelectedStudent($student,$section){
        $student = student::where('student_id',$student)->get()->first();
        $section2 = new section();
        $section2->student_id = $student->id;
        $section2->class_id = $student->class_id;
        $section2->stream_id = $student->stream_id;
        $section2->section_name = $section;
        if($section2->save()){
            return response()->json("ID: ". $student." SECTION: ".$section);
        }else{
            return response()->json("error");
        }

    }


    public function setSectionAnyWayMode($student,$section,$size){
        $data = explode(",",$student);
        $collection = collect();
        $counter = 0;
        $section_label = 0;
        $alphabet = array( 'a', 'b', 'c', 'd', 'e',
        'f', 'g', 'h', 'i', 'j',
        'k', 'l', 'm', 'n', 'o',
        'p', 'q', 'r', 's', 't',
        'u', 'v', 'w', 'x', 'y',
        'z'
        );
        for($i = 0; $i < (int)$section; $i++){
            for($j = 0; $j < (int)$size; $j++){
                $getStudent = student::where('student_id',$data[$counter])->get()->first();
                $getSection = new section();
                $getSection->student_id = $getStudent->id;
                $getSection->stream_id = $getStudent->stream_id;
                $getSection->class_id = $getStudent->class_id;
                $getSection->section_name =  $alphabet[$i];
                $getSection->save();
                $counter++;
            }
        }
        for ($i=$counter; $i < sizeof($data); $i++) {
            # code...
            $getStudent = DB::table('students')
                    ->join('classes','students.class_id','=','classes.id')
                    ->join('streams','students.stream_id','=','streams.id')
                    ->where('students.student_id',$data[$counter])
                    ->get(['students.id','class_label','stream_type','student_id',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')])->first();
            // $getStudent = student::where('student_id',$data[$counter])->get()->first();
            $list = (object) ['id'=>$getStudent->id,'class_label'=>$getStudent->class_label,'stream_type'=>$getStudent->stream_type,'student_id'=>$getStudent->student_id,'full_name'=>$getStudent->full_name];
            $collection->push($list);
            $counter++;
        }
        return response()->json(["size"=>(int)$section,"getStudent"=>$collection]);
    }


    public function setSectionAutoMode($student,$size,$roomSize){
        $studentList = explode(",",$student);
        $counter = 0;
        $counter2 = 0;
        $label = 0;
        $newSection = array();
        $collection = collect();
        $alphabet = array( 'a', 'b', 'c', 'd', 'e',
        'f', 'g', 'h', 'i', 'j',
        'k', 'l', 'm', 'n', 'o',
        'p', 'q', 'r', 's', 't',
        'u', 'v', 'w', 'x', 'y',
        'z'
        );

        for ($i=0; $i < count($studentList); $i++){

            if ($counter2 == $roomSize) {
                $label++;
                $counter2 = 0;
                array_push($newSection,$roomSize);
            }

            $getStudent = student::where('student_id',$studentList[$counter])->get()->first();
                $getSection = new section();
                $getSection->student_id = $getStudent->id;
                $getSection->stream_id = $getStudent->stream_id;
                $getSection->class_id = $getStudent->class_id;
                $getSection->section_name =  $alphabet[$label];
                $getSection->save();
                $counter++;
                $counter2++;
        }

        $getStud = student::where("student_id",$studentList[0])->get()->first();
        $getStudent = DB::table('students')
                ->join('classes','students.class_id','=','classes.id')
                ->join('streams','students.stream_id','=','streams.id')
                ->where('students.stream_id',$getStud->stream_id)
                ->where('students.class_id',$getStud->class_id)
                ->get(['students.id','class_label','stream_type','student_id',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')]);

        foreach($getStudent as $row){
            $getSec = section::where('student_id',$row->id)->get()->first();
            if(!$getSec){
                error_log("fffffffffffffffffffffffffff: ".($row->full_name));
                $list = (object) ['id'=>$row->id,'class_label'=>$row->class_label,'stream_type'=>$row->stream_type,'student_id'=>$row->student_id,'full_name'=>$row->full_name];
                $collection->push($list);
            }
        }

        return response()->json(["size"=>$newSection,"getStudent"=>$collection,"studentSize"=>$size]);
    }


    public function addNewSectionAndSetMode($student,$section,$size){
        $data = explode(",",$student);
        $odd = (count($data) % $section);
        $newSection = array();
        $collection = collect();
        $counter = 0;
        $alphabet = array( 'a', 'b', 'c', 'd', 'e',
        'f', 'g', 'h', 'i', 'j',
        'k', 'l', 'm', 'n', 'o',
        'p', 'q', 'r', 's', 't',
        'u', 'v', 'w', 'x', 'y',
        'z'
        );

        if($odd == 0) {
            for($i = 0; $i < (int)$section+1; $i++){
                if ($i == (int)$section) {
                    $newSize = ( count($data) - ((int) $size * (int) $section) );
                    array_push($newSection,$newSize);
                 }else{
                     $newSize = $size;
                     array_push($newSection,$newSize);
                 }
                 for($j = 0; $j < $newSize; $j++){
                    $getStudent = student::where('student_id',$data[$counter])->get()->first();
                    $getSection = new section();
                    $getSection->student_id = $getStudent->id;
                    $getSection->stream_id = $getStudent->stream_id;
                    $getSection->class_id = $getStudent->class_id;
                    $getSection->section_name =  $alphabet[$i];
                    $getSection->save();
                    $counter++;
                }
            }

            for ($i=$counter; $i < sizeof($data); $i++) {
                    # code...
                    $getStudent = DB::table('students')
                            ->join('classes','students.class_id','=','classes.id')
                            ->join('streams','students.stream_id','=','streams.id')
                            ->where('students.student_id',$data[$counter])
                            ->get(['students.id','class_label','stream_type','student_id',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')])->first();
                    // $getStudent = student::where('student_id',$data[$counter])->get()->first();
                    $list = (object) ['id'=>$getStudent->id,'class_label'=>$getStudent->class_label,'stream_type'=>$getStudent->stream_type,'student_id'=>$getStudent->student_id,'full_name'=>$getStudent->full_name];
                    $collection->push($list);
                    $counter++;
            }
            return response()->json(["size"=>$newSection,"getStudent"=>$collection,"studentSize"=>$size]);
        }else{
            for($i = 0; $i < (int)$section + 1; $i++){
                if ($i == (int)$section) {
                   $newSize = ( count($data) - ((int) $size * (int) $section) );
                   array_push($newSection,$newSize);
                }else{
                    $newSize = $size;
                    array_push($newSection,$newSize);
                }

                for($j = 0; $j < (int)$newSize; $j++){
                    $getStudent = student::where('student_id',$data[$counter])->get()->first();
                    $getSection = new section();
                    $getSection->student_id = $getStudent->id;
                    $getSection->stream_id = $getStudent->stream_id;
                    $getSection->class_id = $getStudent->class_id;
                    $getSection->section_name =  $alphabet[$i];
                    $getSection->save();
                    $counter++;
                }
            }
            for ($i=$counter; $i < sizeof($data); $i++) {
                # code...
                $getStudent = DB::table('students')
                        ->join('classes','students.class_id','=','classes.id')
                        ->join('streams','students.stream_id','=','streams.id')
                        ->where('students.student_id',$data[$counter])
                        ->get(['students.id','class_label','stream_type','student_id',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')])->first();
                $list = (object) ['id'=>$getStudent->id,'class_label'=>$getStudent->class_label,'stream_type'=>$getStudent->stream_type,'student_id'=>$getStudent->student_id,'full_name'=>$getStudent->full_name];
                $collection->push($list);
                $counter++;
        }
            return response()->json(["size"=>($newSection),"getStudent"=>$collection,"studentSize"=>$size]);
        }
    }


    public function setSectionAndMergeMode($student,$section,$size){
        $data = explode(",",$student);
        $odd = (count($data) % $section);
        $newSection = array();
        $collection = collect();
        $counter = 0;
        $newSectionSize = 0;
        $alphabet = array( 'a', 'b', 'c', 'd', 'e',
        'f', 'g', 'h', 'i', 'j',
        'k', 'l', 'm', 'n', 'o',
        'p', 'q', 'r', 's', 't',
        'u', 'v', 'w', 'x', 'y',
        'z'
        );

        if($odd == 0) {

            $newSectionSize =  (count($data) / $section);
            for($i = 0; $i < (int)$section; $i++){
                array_push($newSection,$newSectionSize);
                for($j = 0; $j < (int)$newSectionSize; $j++){
                    $getStudent = student::where('student_id',$data[$counter])->get()->first();
                    $getSection = new section();
                    $getSection->student_id = $getStudent->id;
                    $getSection->stream_id = $getStudent->stream_id;
                    $getSection->class_id = $getStudent->class_id;
                    $getSection->section_name =  $alphabet[$i];
                    $getSection->save();
                    $counter++;
                }
            }

            for ($i=$counter; $i < sizeof($data); $i++) {
                    # code...
                    $getStudent = DB::table('students')
                            ->join('classes','students.class_id','=','classes.id')
                            ->join('streams','students.stream_id','=','streams.id')
                            ->where('students.student_id',$data[$counter])
                            ->get(['students.id','class_label','stream_type','student_id',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')])->first();
                    // $getStudent = student::where('student_id',$data[$counter])->get()->first();
                    $list = (object) ['id'=>$getStudent->id,'class_label'=>$getStudent->class_label,'stream_type'=>$getStudent->stream_type,'student_id'=>$getStudent->student_id,'full_name'=>$getStudent->full_name];
                    $collection->push($list);
                    $counter++;
            }
            return response()->json(["size"=>$newSection,"getStudent"=>$collection,"studentSize"=>$newSectionSize]);
        }else{

            if ($odd < $section) {
                $newOdd = 0;
                for($i = 0; $i < (int)$section; $i++){
                    if ($newOdd >= $odd) {
                        $newSectionSize = (int) (count($data) / $section);
                        array_push($newSection,$newSectionSize);
                    }else{
                        $newSectionSize = (int) (count($data) / $section) + 1;
                        array_push($newSection,$newSectionSize);
                    }

                    for($j = 0; $j < (int)$newSectionSize; $j++){
                        $getStudent = student::where('student_id',$data[$counter])->get()->first();
                        $getSection = new section();
                        $getSection->student_id = $getStudent->id;
                        $getSection->stream_id = $getStudent->stream_id;
                        $getSection->class_id = $getStudent->class_id;
                        $getSection->section_name =  $alphabet[$i];
                        $getSection->save();
                        $counter++;
                    }
                    $newOdd++;
                }
            }else{
                $newOdd = 0;
                for($i = 0; $i < (int)$section; $i++){

                    $newSectionSize = (int) (count($data) / $section) + 1;
                    array_push($newSection,$newSectionSize);

                    for($j = 0; $j < (int)$newSectionSize; $j++){
                        $getStudent = student::where('student_id',$data[$counter])->get()->first();
                        $getSection = new section();
                        $getSection->student_id = $getStudent->id;
                        $getSection->stream_id = $getStudent->stream_id;
                        $getSection->class_id = $getStudent->class_id;
                        $getSection->section_name =  $alphabet[$i];
                        $getSection->save();
                        $counter++;
                    }
                    $newOdd++;
                }
            }
            for ($i=$counter; $i < sizeof($data); $i++) {
                # code...
                $getStudent = DB::table('students')
                        ->join('classes','students.class_id','=','classes.id')
                        ->join('streams','students.stream_id','=','streams.id')
                        ->where('students.student_id',$data[$counter])
                        ->get(['students.id','class_label','stream_type','student_id',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')])->first();
                // $getStudent = student::where('student_id',$data[$counter])->get()->first();
                $list = (object) ['id'=>$getStudent->id,'class_label'=>$getStudent->class_label,'stream_type'=>$getStudent->stream_type,'student_id'=>$getStudent->student_id,'full_name'=>$getStudent->full_name];
                $collection->push($list);
                $counter++;
            }
            // error_log(count($newSection[0]));
            return response()->json(["size"=>$newSection,"getStudent"=>$collection,"studentSize"=>$newSectionSize]);
        }
    }





    public function findSection($id){
        $val = '';
        $count = 0;
        // $section = DB::table('sections')
        //             ->join('streams','sections.stream_id','=','streams.id')->get(['section_name','stream_type','streams.id']);
        // $section = section::where('class_id',$id)->distnict('section_name')->get();
        $section = DB::table('sections')
                        ->join('streams','sections.stream_id','=','streams.id')
                        ->where('class_id',$id)
                        ->distinct('section_name')
                        ->get(['section_name','stream_type','stream_id','class_id']);
        $subject = DB::table('subject_groups')
                        ->join('subjects','subject_groups.subject_id','=','subjects.id')
                        ->where('class_id',(int) $id)
                        ->get(['subject_name','subject_groups.id']);
        // $sectionArray = array();
        // foreach($section as $row){
        //     $str = stream::where('id',$row->stream_id)->get()->first();
        //     if($count == 0 || $val == ''){
        //         $val = $row->section_name;
        //         //$sectionArray += array('name'.$count => $row->section_name);
        //         $sectionArray[$count] = $str->stream_type.'-'. $row->section_name;
        //         $count = $count + 1;
        //     }elseif($val === $row->section_name){
        //         continue;
        //     }elseif($row->section_name !== $val){
        //         $val = $row->section_name;
        //         //$sectionArray += array('name'.$count => $row->section_name);
        //         $sectionArray[$count] = $str->stream_type.'-'. $row->section_name;
        //         $count = $count + 1;
        //     }
        // }
        // return response()->json($section);

        return response()->json(['section'=>$section,'subject'=>$subject]);
    }

    public function findSectionForHomeRoom($id){
                $val = '';
                $count = 0;
                $section = DB::table('sections')
                            ->join('streams','sections.stream_id','=','streams.id')
                            ->where('class_id',$id)
                            ->distinct('section_name')
                            ->get(['section_name','stream_type','stream_id','stream_type','class_id']);
                // $section = section::where('class_id',$id)->distnict('section_name')->get();
                // $sectionArray = array();
                //         foreach($section as $row){
                //             $str = stream::where('id',$row->stream_id)->get()->first();
                //             if($count == 0 || $val == ''){
                //                 $val = $row->section_name;
                //                 //$sectionArray += array('name'.$count => $row->section_name);
                //                 $sectionArray[$count] = $str->stream_type.'-'. $row->section_name;
                //                 $count = $count + 1;
                //             }elseif($val === $row->section_name){
                //                 continue;
                //             }elseif($row->section_name !== $val){
                //                 $val = $row->section_name;
                //                 //$sectionArray += array('name'.$count => $row->section_name);
                //                 $sectionArray[$count] = $str->stream_type.'-'. $row->section_name;
                //                 $count = $count + 1;
                //             }
                //         }
                        return response()->json($section);
    }

    public function getSectionForSelectedStream($class,$stream){
        $section = DB::table('sections')
                    ->join('streams','sections.stream_id','=','streams.id')
                    ->where('sections.class_id',(int) $class)
                    ->where('sections.stream_id',(int) $stream)
                    ->distinct('section_name')
                    ->get(['sections.section_name']);



        return response()->json($section);

    }
    public function setCourseLoad($teacher,$section,$class,$subject){
            $response = 'Inserted';
            $split_section = explode(',',$section);
            $i = 0;
            for($i;$i<sizeof($split_section)-1;$i++){
                 $split_stream = explode('-',$split_section[$i]);
                 $validate = teacher_course_load::where('teacher_id',$teacher)->get();
                 //  $validate = teacher_course_load::where('teacher_id',$teacher)
                //  ->where('class_id',$class)
                //  ->where('subject_id',$subject)
                //  ->where('section',$split_stream[1])->get();
                 if(sizeof( $validate) === 0){
                    // $teacher_course_load = new teacher_course_load();
                    // $teacher_course_load->teacher_id = $teacher;
                    // $teacher_course_load->subject_id = $subject;
                    // $teacher_course_load->class_id = $class;
                    // $teacher_course_load->section = $split_stream[1];
                    // $teacher_course_load->stream = $split_stream[0];
                    // $teacher_course_load->save();

                    // $teacher_course_load = new course_load();
                    // $teacher_course_load->class_id = $class;
                    // $teacher_course_load->stream_id  = $subject;
                    // $teacher_course_load->subject_group_id  = $subject;
                    // $teacher_course_load->section_label = $split_stream[1];
                    // $teacher_course_load->day = $split_stream[0];
                    // $teacher_course_load->period_number = $split_stream[0];
                    // $teacher_course_load->save();


                 }else{
                    $response = 'NotInserted';
                    continue;
                 }

                // $course_load_id = teacher_course_load::latest('created_at')->pluck('id')->first();
                // $teacher = teacher::find($course_load_id);
                // $teacher->course_load_id = $course_load_id;
                // $teacher->update();
            }
            //$teacher_course = teacher_course_load::all();

            $teacher_course = DB::table('teacher_course_loads')
            ->join('classes','classes.id','=','teacher_course_loads.class_id')
            ->join('subjects','subjects.id','=','teacher_course_loads.subject_id')
            ->where('teacher_course_loads.teacher_id',$teacher)
            ->get(['class_label',
                    'teacher_course_loads.section',
                    'subject_name',
                    'class_id',
                    'teacher_course_loads.id as id',
                    'teacher_course_loads.teacher_id as teacher_id']);
            return response()->json(['datac'=>$teacher_course, 'status'=>$response]);
        //return response()->json($teacher_course);
    }

    public function getCourseLoad($id){
        // $teacher_home_room = DB::table('home_rooms')
        //                     ->join('classes','home_rooms.class_id','=','classes.id')
        //                     ->where('home_rooms.employee_id',$id)
        //                     ->get();
        //     //    $teacher_home_room = home_room::where('employee_id',$id)->get();
        // $teacher_course = DB::table('teacher_course_loads')
        // ->join('classes','classes.id','=','teacher_course_loads.class_id')
        // ->join('subjects','subjects.id','=','teacher_course_loads.subject_id')
        // ->where('teacher_course_loads.teacher_id',$id)
        // ->get(['class_label',
        //         'teacher_course_loads.section',
        //         'subject_name',
        //         'class_id',
        //         'teacher_course_loads.id as id',
        //         'teacher_course_loads.teacher_id as teacher_id',
        //         'teacher_course_loads.stream']);
        $course_load2 = DB::table('teacher_course_loads')
                            ->join('course_loads','teacher_course_loads.course_load_id','=','course_loads.id')
                            ->join('classes','course_loads.class_id','=','classes.id')
                            ->join('streams','course_loads.stream_id','=','streams.id')
                            ->join('subject_groups','course_loads.subject_group_id','=','subject_groups.id')
                            ->join('subjects','subject_groups.subject_id','=','subjects.id')
                            ->where('teacher_id',$id)
                            ->get(['teacher_id','course_loads.class_id','class_label','subject_name','stream_type','section_label','course_loads.id']);
                return response()->json($course_load2);
        // return response()->json(['teacher_courses'=>$teacher_course,'hoom_room'=>$teacher_home_room]);
    }
    public function deleteCourseLoad($load_id){
        $id = 0;
        $get_course_load_id = course_load::where('id',$load_id)->get()->first();
        $teacher = teacher_course_load::where('course_load_id',$get_course_load_id->id)->get()->first();
        $id = $teacher->teacher_id;
        $deleteTeacher = teacher_course_load::find($teacher->id);
        $deleteTeacher->delete();

        $course_load = course_load::find($load_id);
        $course_load->delete();

        $course_load2 = DB::table('teacher_course_loads')
                ->join('course_loads','teacher_course_loads.course_load_id','=','course_loads.id')
                ->join('classes','course_loads.class_id','=','classes.id')
                ->join('streams','course_loads.stream_id','=','streams.id')
                ->join('subject_groups','course_loads.subject_group_id','=','subject_groups.id')
                ->join('subjects','subject_groups.subject_id','=','subjects.id')
                ->where('teacher_course_loads.teacher_id',$id)
                ->get(['class_label','subject_name','stream_type','section_label','course_loads.id']);

        return response()->json($course_load2);
    }

    public function getHomeRoom($teacher_id){
        $student_subject = array();
        $hoom_room = home_room::where('employee_id',$teacher_id)->get();
        $teacher_home_room = DB::table('home_rooms')
        ->join('classes','home_rooms.class_id','classes.id')
        // ->join('streams','home_rooms.stream_id','streams.id')
        ->where('employee_id',$teacher_id)
        ->get(['class_label','section','home_rooms.id as id' ,'home_rooms.employee_id','stream']);
        return response()->json($teacher_home_room);
    }


    public function getHomeRoomStudent($teacher_id,$section,$class_name,$stream){
        $getStreamId = stream::where('stream_type',$stream)->get()->first();
        $stream_id = (int)$getStreamId->id;
        //error_log("Stream ID: ".$getStreamId->id);
        $sec = DB::table('sections')
                ->join('classes','sections.class_id','=','classes.id')
                ->join('students','sections.student_id','=','students.id')
                ->join('student_class_transfers','student_class_transfers.student_id','=','sections.student_id')
                ->join('streams','sections.stream_id','=','streams.id')
                ->where('section_name',$section)
                ->where('class_label',$class_name)
                ->where('streams.id',$stream_id)
                ->get([
                    'students.student_id',
                    'first_name',
                    'middle_name',
                    'last_name',
                    'gender',
                    'student_class_transfers.yearly_average',
                    'student_class_transfers.status'
                ]);
                error_log("Stream ID: ".$stream_id);

        $mark = DB::table('student_mark_lists')
                ->join('students','student_mark_lists.student_id','=','students.id')
                ->join('classes','student_mark_lists.class_id','=','classes.id')
                ->join('semisters','student_mark_lists.semister_id','=','semisters.id')
                ->join('assasment_types','student_mark_lists.assasment_type_id','=','assasment_types.id')
                ->join('subjects','student_mark_lists.subject_id','=','subjects.id')
                ->get([
                    'students.student_id',
                    'first_name',
                    'middle_name',
                    'last_name',
                    'semister',
                    'term',
                    'subject_name',
                    'test_load',
                    'mark'
                ]);
        $semister = semister::all();
        // return response()->json($this->getTheTotalAvarage($mark));
         //return response()->json(['section'=>$sec,'mark'=>$this->getTheTotalAvarage($mark),'semister'=>$semister]);
         return response()->json(['section'=>$this->getTheTotalAvarage($sec),'mark'=>$mark,'semister'=>$semister]);

//          return response()->json(['section'=>$sec,'mark'=>$mark,'semister'=>$semister]);
        }

    public function getCourseLoadStudent($teacher_id,$section,$class_id,$course_load_id,$stream){
        $subject = '';
        $assasment = '';
        //error_log($stream);
        $check_stream = stream::where('stream_type',$stream)->get()->first();
        //error_log($check_stream->id);
        $course_load = DB::table('teacher_course_loads')
                        ->join('course_loads','teacher_course_loads.course_load_id','=','course_loads.id')
                        ->join('subject_groups','course_loads.subject_group_id','=','subject_groups.id')
                        ->join('subjects','subject_groups.subject_id','=','subjects.id')
                        ->where('teacher_id',$teacher_id)
                        ->where('course_loads.section_label',$section)
                        ->where('course_loads.class_id',$class_id)
                        ->where('course_loads.id',$course_load_id)
                        ->get('subject_name');
        foreach($course_load as $row){
            $subject = $row->subject_name;
        }
        $sec = DB::table('sections')
                ->join('classes','sections.class_id','=','classes.id')
                ->join('students','sections.student_id','=','students.id')
                ->where('section_name',$section)
                ->where('sections.stream_id',$check_stream->id)
                ->where('classes.id',$class_id)
                ->get(['first_name',
                        'middle_name',
                        'last_name',
                        'gender',
                        'sections.stream_id',
                        'sections.student_id as ssection_id',
                        'students.student_id',
                        'students.id as studid',
                        'section_name',
                        'classes.id as class_id',
                        'class_label']);
        $mark = DB::table('student_mark_lists')
                ->join('students','student_mark_lists.student_id','=','students.id')
                ->join('classes','student_mark_lists.class_id','=','classes.id')
                ->join('semisters','student_mark_lists.semister_id','=','semisters.id')
                ->join('assasment_types','student_mark_lists.assasment_type_id','=','assasment_types.id')
                ->join('subjects','student_mark_lists.subject_id','=','subjects.id')
                ->where('classes.id',$class_id)
                ->where('subject_name',$subject)
                ->get(['semisters.semister',
                        'students.student_id',
                        'student_mark_lists.test_load',
                        'semisters.term',
                        'student_mark_lists.id as id',
                        'assasment_types.assasment_type',
                        'assasment_types.id as assid',
                        'subjects.subject_name',
                        'subjects.id as subject_id',
                        'semisters.id as semid',
                        'student_mark_lists.mark']);
                $semister = semister::all();
        // error_log("errrrreeeeeeeeeeeee".$subject);
        return response()->json(['section'=>$sec,'mark'=>$mark,'semister'=>$semister,'subject'=>$subject]);
       //return response()->json([$course_load]);
    }

    public function deleteHomeRoom($hoom_room_id){
        $id = 0;
        $tech = home_room::where('id',$hoom_room_id)->get();
        foreach($tech as $row){
            $id = $row->employee_id;
        }
        $del = home_room::find($hoom_room_id);
        $del->delete();

        $teacher_home_room = DB::table('home_rooms')
                                ->join('classes','home_rooms.class_id','classes.id')
                                ->where('employee_id',$id)
                                ->get(['class_label','section','home_rooms.id as id','stream']);

        return response()->json($teacher_home_room);
    }

    public function setHomeRoom($teacher,$section,$class,$stream){
        $getStream = stream::where('id',$stream)->get()->first();
        $validate = home_room::where('class_id',$class)
                            ->where('section',$section)
                            ->where('stream',$getStream->stream_type)
                            ->exists();
        if (!$validate) {
            $home = new home_room();
            $home->employee_id = $teacher;
            $home->class_id = $class;
            $home->section = $section;
            $home->stream = $getStream->stream_type;

            if($home->save()){
                $teacher_home_room = DB::table('home_rooms')
                                    ->join('classes','home_rooms.class_id','classes.id')
                                    ->where('employee_id',$home->employee_id)
                                    ->get(['class_label','section','home_rooms.id as id' ,'home_rooms.employee_id','stream']);
                return response()->json($teacher_home_room);
            }
        }else{
            return response()->json("Already Exist!");
        }
    }
    public function setCurrentSemister($id){
        $semister1 = semister::all();
        foreach($semister1 as $row){
            $semister = semister::find($row->id);
            $semister->current_semister = false;
            $semister->update();
        }
        $semister2 = semister::find($id);
        $semister2->current_semister = true;
        $semister2->update();
        $semister3 = semister::all();
        return response()->json($semister3);
    }

    public function getTheTotalAvarage($sec){
         $item = collect();
        foreach($sec as $row){
            $newSemister = 0;
            $subject = array();
            $semister_one_total = 0;
            $semister_one_load = 0;
            $semister_two_total= 0;
            $semister_two_load= 0;
            $semister_three_total= 0;
            $semister_three_load= 0;
            $semister_four_total= 0;
            $semister_four_load= 0;
            $all_total = 0;

                $student = student::where('student_id',$row->student_id)->get()->first();
                $mark= student_mark_list::where('student_id',$student->id)->get();
                $semister = semister::all();
                foreach($semister as $sem){
                    foreach($mark as $ma){
                        if($sem->id == $ma->semister_id and $newSemister==0){
                            $semister_one_total = $semister_one_total + $ma->mark;
                            $semister_one_load = $semister_one_load + 1;
                            if(!(in_array($ma->subject_id, $subject))){
                                array_push($subject, $ma->subject_id);
                            }
                        }elseif($sem->id == $ma->semister_id and $newSemister==1){
                            $semister_two_total = $semister_two_total + $ma->mark;
                            $semister_two_load = $semister_two_load + 1;
                            if(!(in_array($ma->subject_id, $subject))){
                                array_push($subject, $ma->subject_id);
                            }
                        }elseif($sem->id == $ma->semister_id and $newSemister==2){
                            $semister_three_total = $semister_three_total + $ma->mark;
                            $semister_three_load = $semister_three_load + 1;
                            if(!(in_array($ma->subject_id, $subject))){
                                array_push($subject, $ma->subject_id);
                            }
                        }if($sem->id == $ma->semister_id and $newSemister==3){
                            $semister_four_total = $semister_four_total + $ma->mark;
                            $semister_four_load = $semister_four_load + 1;
                            if(!(in_array($ma->subject_id, $subject))){
                                array_push($subject, $ma->subject_id);
                            }
                        }
                    }
                    $newSemister = $newSemister + 1;
                }

            // }
            // error_log("How Much Is it: ". $subject[0]);

            error_log("blaaaaaaaaaaaaaa".$semister_one_total);
            if(!count($subject) <= 0 or !count($subject) <= 0 or !count($subject)<= 0 or !count($subject) <= 0){
                $semister_one_total = ((int) $semister_one_total /  count($subject));
                $semister_two_total = ((int)$semister_two_total / count($subject));
                $semister_three_total = ((int)$semister_three_total / count($subject));
                $semister_four_total = ((int)$semister_four_total / count($subject));
            }
                $item2 = collect([
                "first_name"=>$row->first_name,
                "middle_name"=>$row->middle_name,
                "last_name"=>$row->last_name,
                "student_id"=>$row->student_id,
                "status"=>$row->status,
                "avarage"=>$row->yearly_average,
                // "subject_name"=>$row->subject_name,
                // "test_load"=>$row->test_load,
                // "mark"=>$row->mark,
                "gender"=>$row->gender,
                "semister_one_total"=>$semister_one_total,
                "semister_two_total"=>$semister_two_total,
                "semister_three_total"=>$semister_three_total,
                "semister_four_total"=>$semister_four_total,
                "all_total"=>''
                ]);

            $item->push($item2);
        }

        return $item;
    }

    public function getCourseLoadData($teacher_id,$class_id,$stream_id,$section,$subject_id){
        $check_course_load = course_load::where('class_id',$class_id)
                                ->where('stream_id',$stream_id)
                                ->where('subject_group_id',$subject_id)
                                ->where('section_label',$section)
                                ->exists(); 
        // $check_teacher_course_load = teacher_course_load::where('course_load_id',$check_course_load->id)->get();
        if (!$check_course_load) {
            $course_load = new course_load();
            $course_load->class_id = $class_id;
            $course_load->stream_id  = $stream_id;
            $course_load->subject_group_id  = $subject_id;
            $course_load->section_label = $section;

            if ($course_load->save()) {
                $teacher_course_load = new teacher_course_load();
                $teacher_course_load->course_load_id = $course_load->id;
                $teacher_course_load->teacher_id = $teacher_id;

                if ($teacher_course_load->save()) {
                    $course_load2 = DB::table('teacher_course_loads')
                    ->join('course_loads','teacher_course_loads.course_load_id','=','course_loads.id')
                    ->join('classes','course_loads.class_id','=','classes.id')
                    ->join('streams','course_loads.stream_id','=','streams.id')
                    ->join('subject_groups','course_loads.subject_group_id','=','subject_groups.id')
                    ->join('subjects','subject_groups.subject_id','=','subjects.id')
                    ->where('teacher_id',$teacher_id)
                    ->get(['class_label','subject_name','stream_type','section_label','course_loads.id']);
                    return response()->json($course_load2);
                }
            }

        }else{
            return response()->json('Alerady Exist!');
        }

    }
}

