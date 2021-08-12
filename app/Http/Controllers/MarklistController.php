<?php

namespace App\Http\Controllers;

use App\Exports\StudentsCardExport;
use App\Exports\StudentsCardPerSemisterExport;
use App\Exports\StudentsCardPerTermExport;
use Illuminate\Http\Request;
use App\Imports\MarklistImport;
use App\Imports\StudentImport;
use App\Models\assasment_type;
use App\Models\classes;
use App\Models\section;
use App\Models\semister;
use App\Models\stream;
use App\Models\student;
use App\Models\student_mark_list;
use App\Models\subject;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class MarklistController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function addMarkListForm(){
        $ass = assasment_type::all();
        $classes = classes::all();
        $sub = subject::all();
        $semister = semister::all();
        return view('admin.curriculum.add_marklist')
        ->with('assasment',$ass)
        ->with('classes',$classes)
        ->with('subject',$sub)
        ->with('semister',$semister);
    }

    public function singleAddMarkList($student_id,$class_id,$semister_id,$assasment_id,$subject,$mark,$load){
        $sub = subject::where('subject_name',$subject)->get('id')->first();
        $mark_list = new student_mark_list();
        $mark_list->student_id = $student_id;
        $mark_list->semister_id = $semister_id;
        $mark_list->class_id = $class_id;
        $mark_list->mark = $mark;
        $mark_list->test_load = $load;
        $mark_list->subject_id = $sub->id;
        $mark_list->academic_year = date("Y");
        $mark_list->assasment_type_id = $assasment_id;
        if($mark_list->save()){
            $as = assasment_type::where('id',$assasment_id)->get('assasment_type')->first();
            //'class_label']);
            $mark2 = DB::table('student_mark_lists')
                  //  ->join('students','student_mark_lists.student_id','=','students.id')
                    ->join('classes','student_mark_lists.class_id','=','classes.id')
                    ->join('semisters','student_mark_lists.semister_id','=','semisters.id')
                    ->join('assasment_types','student_mark_lists.assasment_type_id','=','assasment_types.id')
                    ->join('subjects','student_mark_lists.subject_id','=','subjects.id')
                    ->where('classes.id',$class_id)
                    ->where('subject_name',$subject)
                    ->where('student_mark_lists.student_id',$student_id)
                    ->where('semisters.id',$semister_id)
                    ->get(['semisters.semister',
                            'semisters.term',
                            'student_mark_lists.student_id as student_id',
                            'student_mark_lists.test_load',
                            'semisters.id as semister_id',
                            'student_mark_lists.id as id',
                            'assasment_types.assasment_type',
                            'assasment_types.id as assid',
                            'subjects.subject_name',
                            'subjects.id as subject_id',
                            'semisters.id as semid',
                            'student_mark_lists.mark']);
            return response()->json(['mark'=>$mark2,'new'=>$mark_list->id]);
        }else{
            return response()->json("Error");
        }
    }
    // public function import(Request $request){
    //     Excel::import(new MarklistImport(), $request->Excel);
    //     $ass = assasment_type::all();
    //     $classes = classes::all();
    //     $sub = subject::all();
    //     $semister = semister::all();
    //     return view('admin.curriculum.add_marklist')
    //     ->with('assasment',$ass)
    //     ->with('classes',$classes)
    //     ->with('subject',$sub)
    //     ->with('semister',$semister);
    // }

    public function sample_student(Request $request){
        Excel::import(new StudentImport, $request->excel);
         return "Student inserted";
    }

    public function addAssasment(){
        $assasment = new assasment_type();
        $assasment->assasment_type = request('assasment_label');
        $assasment->save();
        $ass = assasment_type::all();
        return view('admin.curriculum.add_assasment_label')->with('assasment',$ass);
    }

    public function assasmentForm(){
        $ass = assasment_type::all();
        return view('admin.curriculum.add_assasment_label')->with('assasment',$ass);
    }

    public function editMarkStudentList($id,$mark,$load,$assasment){
        $mark_list = student_mark_list::find($id);
        $mark_list->mark = $mark;
        $mark_list->test_load = $load;
        if($mark_list->update()){
            return response()->json($id);
        }else{
            return response()->json('Error While Updating');
        }
      //  return response()->json($mark);

    }


    public function generateTotalCard(){

        $data = explode(",",request("data"));
        $getTerm ='';
        if(request('get_term')=="All"){
            $getTerm = request('get_term');
        }elseif(request('get_term')=="semisterOne"){
            $getTerm = request('get_term');
        }else{
            $getTerm = (int)request('get_term');
        }
        $class2 = classes::where('class_label',$data[0])->get()->first();
        $stream2 = stream::where('stream_type',$data[1])->get()->first();
        $studentCardCollection = collect();
        $getAllSubject = subject::all();
        $getAllSemister = semister::all();
        $getStudent = DB::table('sections')
                        ->join('students','sections.student_id','=','students.id')
                        ->join('classes','sections.class_id','=','classes.id')
                        ->join('streams','sections.stream_id','=','streams.id')
                        ->where('sections.class_id',(int) $class2->id)
                        ->where('sections.stream_id',(int) $stream2->id)
                        ->where('sections.section_name',(string) $data[2])
                        ->get(['students.id','first_name','middle_name','last_name']);
        if($getTerm=="All"){
            foreach($getStudent as $student){
                $oneStudentCard = collect();
                foreach($getAllSemister as $semister){
                    $oneSemisterCard = collect();
                    foreach($getAllSubject as $subject){
                        $subjectTotalMark = 0;
                        $subjectTotalLoad = 0;
                        $getStudentMark = DB::table('student_mark_lists')
                                            ->join('semisters','student_mark_lists.semister_id','=','semisters.id')
                                            ->join('subjects','student_mark_lists.subject_id','=','subjects.id')
                                            ->where('student_id',$student->id)
                                            ->where('semister_id',$semister->id)
                                            ->where('subject_id',$subject->id)
                                            ->where('academic_year','2021')
                                            ->get();
                        foreach($getStudentMark as $mark){
                            $subjectTotalMark = $subjectTotalMark + $mark->mark;
                            $subjectTotalLoad = $subjectTotalLoad + $mark->test_load;
                        }
                         $item = (object) [
                             "name"=>$student->first_name.' '.$student->middle_name.' '.$student->last_name,
                             "subject"=>$subject->subject_name,
                             "total"=>$subjectTotalMark,
                             "load"=>$subjectTotalLoad,
                             "semister"=>$semister->id];
                         $oneSemisterCard->push($item);
                    }
                    foreach($oneSemisterCard as $card){
                        $semisterCard = (object) ["name"=>$card->name,"subject"=>$card->subject,"total"=>$card->total,"load"=>$card->load,"semister"=>$semister->id];
                        $oneStudentCard->push($semisterCard);
                    }
                }
                foreach($oneStudentCard as $studentCard){
                    $studentCard = (object) ["name"=>$studentCard->name,"semister"=>$studentCard->semister,"subject"=>$studentCard->subject,"total"=>$studentCard->total,"load"=>$studentCard->load];
                    $studentCardCollection->push($studentCard);
                }
            }
            // return $getTerm;

            return $this->generateExcelForStudentAllYearCard($studentCardCollection,$class2->id,$stream2->id,$data[2]);
        }elseif($getTerm=="semisterOne"){
            //  return $getTerm;
            foreach($getStudent as $student){
                $oneStudentCard = collect();
                foreach($getAllSemister as $semister){
                    $oneSemisterCard = collect();
                    foreach($getAllSubject as $subject){
                        $subjectTotalMark = 0;
                        $subjectTotalLoad = 0;
                        $getStudentMark = DB::table('student_mark_lists')
                                            ->join('semisters','student_mark_lists.semister_id','=','semisters.id')
                                            ->join('subjects','student_mark_lists.subject_id','=','subjects.id')
                                            ->where('student_id',$student->id)
                                            ->where('semister_id',$semister->id)
                                            ->where('subject_id',$subject->id)
                                            ->where('academic_year','2021')
                                            ->get();
                        foreach($getStudentMark as $mark){
                            $subjectTotalMark = $subjectTotalMark + $mark->mark;
                            $subjectTotalLoad = $subjectTotalLoad + $mark->test_load;
                        }
                         $item = (object) [
                             "name"=>$student->first_name.' '.$student->middle_name.' '.$student->last_name,
                             "subject"=>$subject->subject_name,
                             "total"=>$subjectTotalMark,
                             "load"=>$subjectTotalLoad,
                             "semister"=>$semister->id];
                         $oneSemisterCard->push($item);
                    }
                    foreach($oneSemisterCard as $card){
                        $semisterCard = (object) ["name"=>$card->name,"subject"=>$card->subject,"total"=>$card->total,"load"=>$card->load,"semister"=>$semister->id];
                        $oneStudentCard->push($semisterCard);
                    }
                }
                foreach($oneStudentCard as $studentCard){
                    $studentCard = (object) ["name"=>$studentCard->name,"semister"=>$studentCard->semister,"subject"=>$studentCard->subject,"total"=>$studentCard->total,"load"=>$studentCard->load];
                    $studentCardCollection->push($studentCard);
                }
            }
            // return $getTerm;

            return $this->generateExcelFirstSemisterCard($studentCardCollection,$class2->id,$stream2->id,$data[2]);
            // return $this->generateExcelFirstSemisterCard($getStudent,$class2->id,$stream2->id,$data[2],$getTerm);

        }else{
            return $this->generateExcelForStudentCard($getStudent,$class2->id,$stream2->id,$data[2],$getTerm);
        }
    }


    public function generateExcelForStudentAllYearCard($studentData,$class,$stream,$section){
            $clas = classes::find($class);
            $str = stream::find($stream);
            return Excel::download(new StudentsCardExport($studentData,$class,$stream,$section), $clas->class_label.'_'.$str->stream_type.'_'.$section.'.xlsx');
    }
    public function generateExcelFirstSemisterCard($studentData,$class,$stream,$section){
        $clas = classes::find($class);
        $str = stream::find($stream);
        return Excel::download(new StudentsCardPerSemisterExport($studentData,$class,$stream,$section), $clas->class_label.'_'.$str->stream_type.'_'.$section.'.xlsx');
}
    public function generateExcelForStudentCard($getStudent,$class2,$stream2,$section,$getTerm){
        $getAllSubject = subject::all();
        $clas = classes::find($class2);
         $str = stream::find($stream2);
        $studentCardCollection = collect();
        foreach($getStudent as $student){
            $oneStudentCard = collect();
            foreach($getAllSubject as $subject){
                $subjectTotalMark = 0;
                $subjectTotalLoad = 0;
                $getStudentMark = DB::table('student_mark_lists')
                                    ->join('semisters','student_mark_lists.semister_id','=','semisters.id')
                                    ->join('subjects','student_mark_lists.subject_id','=','subjects.id')
                                    ->where('student_id',$student->id)
                                    ->where('semister_id',$getTerm)
                                    ->where('subject_id',$subject->id)
                                    ->where('academic_year','2021')
                                    ->get();
                foreach($getStudentMark as $mark){
                    $subjectTotalMark = $subjectTotalMark + $mark->mark;
                    $subjectTotalLoad = $subjectTotalLoad + $mark->test_load;
                }
                 $item = (object) [
                     "name"=>$student->first_name.' '.$student->middle_name.' '.$student->last_name,
                     "subject"=>$subject->subject_name,
                     "total"=>$subjectTotalMark,
                     "load"=>$subjectTotalLoad,
                     "semister"=>$getTerm
                    ];
                 $oneStudentCard->push($item);
            }
            foreach($oneStudentCard as $studentCard){
                $studentCard = (object) ["name"=>$studentCard->name,"semister"=>$studentCard->semister,"subject"=>$studentCard->subject,"total"=>$studentCard->total,"load"=>$studentCard->load];
                $studentCardCollection->push($studentCard);
            }
            // error_log($studentCardCollection->name);
        }
        return Excel::download(new StudentsCardPerTermExport($studentCardCollection,$class2,$stream2,$section,$getTerm), $clas->class_label.'_'.$str->stream_type.'_'.$section.'.xlsx');
    }
}


