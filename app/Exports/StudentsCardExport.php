<?php

namespace App\Exports;

use App\Models\StudentTraits;
use App\Models\subject;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class StudentsCardExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($student,$class,$stream,$section)
    {
        $this->student = $student;
        $this->class = $class;
        $this->stream = $stream;
        $this->section = $section;
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
                        ->get(['section_name','first_name','middle_name','last_name']);
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
                // $subject = subject::all();
                $subject = DB::table('subject_groups')
                ->join('classes','subject_groups.class_id','=','classes.id')
                ->join('subjects','subject_groups.subject_id','=','subjects.id')
                ->where('subject_groups.class_id',$this->class)
                ->get('subject_name');
                    $allTermOne = 0;
                    $allTermTwo = 0;
                    $allTermThree = 0;
                    $allTermFour = 0;
                    $totalTerm = 0;
                    foreach($subject as $sub){
                        $term1 = 0;
                        $term2 = 0;
                        $term3 = 0;
                        $term4 = 0;
                        foreach($studentCollection as $data){
                            if($data->subject == $sub->subject_name and $row->first_name.' '.$row->middle_name.' '.$row->last_name == $data->name){
                                if($data->semister == 1){
                                    $term1 = $data->total;
                                }elseif($data->semister == 2){
                                    $term2 = $data->total;
                                }elseif($data->semister == 3){
                                    $term3 = $data->total;
                                }elseif($data->semister == 4){
                                    $term4 = $data->total;
                                }
                            }
                        }
                        if($countTraits < sizeof(StudentTraits::all())){
                            $studentItem = (object) ["subject"=>$sub->subject_name,"term1"=>$term1,"term2"=>$term2,"Semister"=>($term1+$term2)/2,"term3"=>$term3,"term4"=>$term4,"Semister2"=>($term3+$term4)/2,"total"=>($term1+$term2+$term3+$term4)/4,"","",$sub12[$countTraits],"","","",""];
                            $countTraits++;
                        }else{
                            $studentItem = (object) ["subject"=>$sub->subject_name,"term1"=>$term1,"term2"=>$term2,"Semister"=>($term1+$term2)/2,"term3"=>$term3,"term4"=>$term4,"Semister2"=>($term3+$term4)/2,"total"=>($term1+$term2+$term3+$term4)/4];
                            $countTraits++;
                        }
                        // $studentItem = (object) ["subject"=>$sub->subject_name,"term1"=>$term1,"term2"=>$term2,"Semister"=>($term1+$term2)/2,"term3"=>$term3,"term4"=>$term4,"Semister2"=>($term3+$term4)/2,"total"=>($term1+$term2+$term3+$term4)/4];
                        $oneStudent->push($studentItem);
                        $allTermOne = $allTermOne + $term1;
                        $allTermTwo = $allTermTwo + $term2;
                        $allTermThree = $allTermThree + $term3;
                        $allTermFour = $allTermFour + $term4;
                        $totalTerm = $totalTerm + (($term1+$term2+$term3+$term4)/4);
                        $firstSemister = round($allTermOne/$subject->count(),2) + round($allTermTwo/$subject->count(),2);
                        $secondSemister = round($allTermThree/$subject->count(),2) + round($allTermFour/$subject->count(),2);
                    }
                    if($countTraits < sizeof(StudentTraits::all())){
                        $studentItem = (object) ["Total"=>"Total",round($allTermOne,2),round($allTermTwo,2),round(($allTermOne + $allTermTwo)/2,2),round($allTermThree,2),round($allTermFour,2),round(($allTermThree + $allTermFour)/2,2),round($totalTerm,2),"","",$sub12[$countTraits],"","","",""];
                        $oneStudent->push($studentItem);
                        $countTraits++;
                    }else{
                        $studentItem = (object) ["Total"=>"Total",round($allTermOne,2),round($allTermTwo,2),round(($allTermOne + $allTermTwo)/2,2),round($allTermThree,2),round($allTermFour,2),round(($allTermThree + $allTermFour)/2,2),round($totalTerm,2)];
                        $oneStudent->push($studentItem);
                    }if($countTraits < sizeof(StudentTraits::all())){
                        $studentItem = (object) ["Avarage"=>"Avarage",round($allTermOne/$subject->count(),2),round($allTermTwo/$subject->count(),2),round($firstSemister/2,2),round($allTermThree/$subject->count(),2),round($allTermFour/$subject->count(),2),round($secondSemister/2,2),round($totalTerm/$subject->count(),2),"","",$sub12[$countTraits],"","","",""];
                        $oneStudent->push($studentItem);
                        $countTraits++;
                    }else{
                        $studentItem = (object) ["Avarage"=>"Avarage",round($allTermOne/$subject->count(),2),round($allTermTwo/$subject->count(),2),round($firstSemister/2,2),round($allTermThree/$subject->count(),2),round($allTermFour/$subject->count(),2),round($secondSemister/2,2),round($totalTerm/$subject->count(),2)];
                        $oneStudent->push($studentItem);
                    }if($countTraits < sizeof(StudentTraits::all())){
                        $studentItem = (object) ["Rank"=>"Rank",0,0,0,0,0,0,0,"","",$sub12[$countTraits],"","","",""];
                        $oneStudent->push($studentItem);
                        $countTraits++;
                    }else{
                        $studentItem = (object) ["Rank"=>"Rank",0,0,0,0,0,0,0];
                        $oneStudent->push($studentItem);
                    }if($countTraits < sizeof(StudentTraits::all())){
                        $studentItem = (object) ["Student"=>"Number of Students",0,0,0,0,0,0,0,"","",$sub12[$countTraits],"","","",""];
                        $oneStudent->push($studentItem);
                        $countTraits++;
                    }else{
                        $studentItem = (object) ["Student"=>"Number of Students",0,0,0,0,0,0,0];
                        $oneStudent->push($studentItem);
                    }if($countTraits < sizeof(StudentTraits::all())){
                        $studentItem = (object) ["Conduct"=>"Conduct","","","","","","","","","",$sub12[$countTraits],"","","",""];
                        $oneStudent->push($studentItem);
                        $countTraits++;
                    }else{
                        $studentItem = (object) ["Conduct"=>"Conduct","","","","",""];
                        $oneStudent->push($studentItem);
                    }if($countTraits < sizeof(StudentTraits::all())){
                        $studentItem = (object) ["Absence"=>"Absence","","","","","","","","","",$sub12[$countTraits],"","","",""];
                        $oneStudent->push($studentItem);
                        $countTraits++;
                    }else{
                        $studentItem = (object) ["Absence"=>"Absence","","","","",""];
                        $oneStudent->push($studentItem);
                    }
                    // $studentItem = (object) ["Total"=>"Total",round($allTermOne,2),round($allTermTwo,2),round(($allTermOne + $allTermTwo)/2,2),round($allTermThree,2),round($allTermFour,2),round(($allTermThree + $allTermFour)/2,2),round($totalTerm,2)];
                    // $oneStudent->push($studentItem);
                    // $studentItem = (object) ["Avarage"=>"Avarage",round($allTermOne/$subject->count(),2),round($allTermTwo/$subject->count(),2),round($firstSemister/2,2),round($allTermThree/$subject->count(),2),round($allTermFour/$subject->count(),2),round($secondSemister/2,2),round($totalTerm/$subject->count(),2)];
                    // $oneStudent->push($studentItem);
                    // $studentItem = (object) ["Rank"=>"Rank",0,0,0,0,0];
                    // $oneStudent->push($studentItem);
                    // $studentItem = (object) ["Student"=>"Number of Students",0,0,0,0,0];
                    // $oneStudent->push($studentItem);
                    // $studentItem = (object) ["Conduct"=>"Conduct","","","","",""];
                    // $oneStudent->push($studentItem);
                    // $studentItem = (object) ["Absence"=>"Absence","","","","",""];
                    // $oneStudent->push($studentItem);
                    $sheets[] = new PerStudentsCardExport($oneStudent, $this->class,$this->stream,$this->section, $row->first_name.' '.$row->middle_name.' '.$row->last_name);
            }
            error_log($co);
        return $sheets;
    }
}
