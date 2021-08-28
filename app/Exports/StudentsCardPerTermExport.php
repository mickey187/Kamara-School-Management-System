<?php

namespace App\Exports;

use App\Http\Controllers\ParentController;
use App\Models\classes;
use App\Models\semister;
use App\Models\student;
use App\Models\StudentTraits;
use App\Models\subject;
use App\Models\SubjectGroup;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use phpDocumentor\Reflection\Types\This;

class StudentsCardPerTermExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($student,$class,$stream,$section,$term)
    {
        $this->student = $student;
        $this->class = $class;
        $this->stream = $stream;
        $this->section = $section;
        $term = semister::find($term);
        $this->term = $term->term;
        $this->grade = classes::where('id',(int)$class)->get()->first();
        $this->countStudent = count(DB::table('sections')
        ->join('students','sections.student_id','=','students.id')
        ->join('classes','sections.class_id','=','classes.id')
        ->join('streams','sections.stream_id','=','streams.id')
        ->where('sections.class_id',$this->class)
        ->where('sections.stream_id',$this->stream)
        ->where('sections.section_name',$this->section)
        ->get(['section_name','first_name','middle_name','last_name']));
    }

    public function sheets(): array
    {
        $studentTraits = StudentTraits::all();
        $sub12 = array();
        $countTraits = 0;
        foreach($studentTraits as $trait){
            if(!(in_array($trait->traits_name, $sub12))){
                array_push($sub12,$trait->traits_name);
            }
        }


        $sheets = [];
            $allStudent = DB::table('sections')
            ->join('students','sections.student_id','=','students.id')
            ->join('classes','sections.class_id','=','classes.id')
            ->join('streams','sections.stream_id','=','streams.id')
            ->where('sections.class_id',$this->class)
            ->where('sections.stream_id',$this->stream)
            ->where('sections.section_name',$this->section)
            ->get(['section_name','first_name','middle_name','last_name','students.student_id']);
            error_log($this->class.$this->stream.$this->section);

            $studentCollection = collect();
            foreach($allStudent as $stud){
                foreach($this->student as $data){
                    if($stud->first_name.' '.$stud->middle_name.' '.$stud->last_name == $data->name){
                        $studentItem = (object) ["name"=>$data->name,"semister"=>$data->semister,"subject"=>$data->subject,"total"=>$data->total,"load"=>$data->load];
                        $studentCollection->push($studentItem);
                    }
                }
            }
            $co = 0;

            foreach($allStudent as $row){
                $co ++;
                $oneStudent = collect();
                $studentItem = (object) ["","header"=>"KAMARA SCHOOL","","","",""];
                $oneStudent->push($studentItem);
                $studentItem = (object) ["","header"=>"Student Progress Report Sheet","","","",""];
                $oneStudent->push($studentItem);
                $studentItem = (object) ["","header"=>"NAME: ".$row->first_name.' '.$row->middle_name.' '.$row->last_name,"","",$this->grade->class_label,""];
                $oneStudent->push($studentItem);
                $studentItem = (object) ["","","","","Basic Skill and",""];
                $oneStudent->push($studentItem);
                $studentItem = (object) ["","","","","Personal Development",""];
                $oneStudent->push($studentItem);
                $studentItem = (object) ["","Subject",$this->term,"","Trait",$this->term];
                $oneStudent->push($studentItem);

                // $subject = subject::all();
                $subject = DB::table('subject_groups')
                                ->join('classes','subject_groups.class_id','=','classes.id')
                                ->join('subjects','subject_groups.subject_id','=','subjects.id')
                                ->where('subject_groups.class_id',$this->class)
                                ->get('subject_name');
                    $allTermOne = 0;
                    foreach($subject as $sub){
                        $term1 = 0;
                        foreach($studentCollection as $data){
                            if($data->subject == $sub->subject_name and $row->first_name.' '.$row->middle_name.' '.$row->last_name == $data->name){
                                if ($data->load > 100) {
                                    $term1 = round(($data->total * 100) / $data->load);
                                }else{
                                    $term1 = $data->total;
                                }
                                // $term1 = $data->total;
                            }
                        }

                        // error_log("The Size-----".sizeof($sub12));
                        if($countTraits < sizeof(StudentTraits::all())){
                            $studentItem = (object) ["","subject"=>$sub->subject_name,"term1"=>$term1,"",$sub12[$countTraits],""];
                            $countTraits++;
                        }else{
                            $studentItem = (object) ["","subject"=>$sub->subject_name,"term1"=>$term1,"","",""];
                            $countTraits++;
                        }
                        $oneStudent->push($studentItem);
                        $allTermOne = $allTermOne + $term1;
                    }

                    error_log("all term is ".$allTermOne);
                    error_log("all Subject is ".$subject->count());
                    if($countTraits < sizeof(StudentTraits::all())){
                        $studentItem = (object) ["","Total"=>"Total",($allTermOne),"",$sub12[$countTraits],""];
                        $oneStudent->push($studentItem);
                        $countTraits++;
                    }else{
                        $studentItem = (object) ["","Total"=>"Total",($allTermOne),"","",""];
                        $oneStudent->push($studentItem);
                    }if($countTraits < sizeof(StudentTraits::all())){
                        $studentItem = (object) ["","Average"=>"Average",round($allTermOne/$subject->count(),2),"",$sub12[$countTraits],""];
                        $oneStudent->push($studentItem);
                        $countTraits++;
                    }else{
                        $studentItem = (object) ["","Average"=>"Average",round($allTermOne/$subject->count(),2),"","",""];
                        $oneStudent->push($studentItem);
                    }if($countTraits < sizeof(StudentTraits::all())){
                        $studentItem = (object) ["","Rank"=>"Rank",0,"",$sub12[$countTraits],""];
                        $oneStudent->push($studentItem);
                        $countTraits++;
                    }else{
                        $studentItem = (object) ["","Rank"=>"Rank",0,"","",""];
                        $oneStudent->push($studentItem);
                    }if($countTraits < sizeof(StudentTraits::all())){
                        $studentItem = (object) ["","Number Of Student"=>"Number Of Student", $this->countStudent,"",$sub12[$countTraits],""];
                        $oneStudent->push($studentItem);
                        $countTraits++;
                    }else{
                        $studentItem = (object) ["","Number Of Student"=>"Number Of Student",$this->countStudent,"","",""];
                        $oneStudent->push($studentItem);
                    }if($countTraits < sizeof(StudentTraits::all())){
                        $studentItem = (object) ["","Conduct"=>"Conduct",0,"",$sub12[$countTraits],""];
                        $oneStudent->push($studentItem);
                        $countTraits++;
                    }else{
                        $studentItem = (object) ["","Conduct"=>"Conduct",0,"","Teacher Name","Sign"];
                        $oneStudent->push($studentItem);
                    }if($countTraits < sizeof(StudentTraits::all())){
                        $studentItem = (object) ["","Absence"=>"Absence",0,"",$sub12[$countTraits],""];
                        $oneStudent->push($studentItem);
                        $countTraits++;
                    }else{
                        $studentItem = (object) ["","Absence"=>"Absence",(string)((new ParentController)->getStudentAbsentDays($row->student_id)),"","",""];
                        $oneStudent->push($studentItem);
                    }
                    $countTraits = 0;

                    $sheets[] = new PreStudentsCardPerTermExport($oneStudent, $this->class,$this->stream,$this->section, $row->first_name.' '.$row->middle_name.' '.$row->last_name,$this->term);
            }
            error_log($co);
        return $sheets;
    }
}
