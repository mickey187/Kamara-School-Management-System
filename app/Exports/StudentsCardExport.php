<?php

namespace App\Exports;
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
                $subject = subject::all();
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
                        $studentItem = (object) ["subject"=>$sub->subject_name,"term1"=>$term1,"term2"=>$term2,"term3"=>$term3,"term4"=>$term4,"total"=>($term1+$term2+$term3+$term4)/4];
                        $oneStudent->push($studentItem);
                        $allTermOne = $allTermOne + $term1;
                        $allTermTwo = $allTermTwo + $term2;
                        $allTermThree = $allTermThree + $term3;
                        $allTermFour = $allTermFour + $term4;
                        $totalTerm = $totalTerm + (($term1+$term2+$term3+$term4)/4);
                    }
                    $studentItem = (object) ["Total"=>"Total",round($allTermOne/$subject->count(),2),round($allTermTwo/$subject->count(),2),round($allTermThree/$subject->count(),2),round($allTermFour/$subject->count(),2),round($totalTerm/$subject->count(),2)];
                    $oneStudent->push($studentItem);
                    
                    $studentItem = (object) ["Rank"=>"Rank",0,0,0,0,0];
                    $oneStudent->push($studentItem);
                    $sheets[] = new PerStudentsCardExport($oneStudent, $this->class,$this->stream,$this->section, $row->first_name.' '.$row->middle_name.' '.$row->last_name);
            }
            error_log($co);
        return $sheets;
    }
}
