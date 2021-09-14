<?php

namespace App\Imports;
use App\Models\assasment_type;
use App\Models\section;
use App\Models\semister;
use App\Models\stream;
use Illuminate\Http\Request;
use App\Models\student_mark_list;
use App\Models\student;
use App\Models\subject;
use App\Models\SubjectGroup;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
class MultipleMarkListImporter implements ToModel,WithHeadingRow,WithStartRow{

    public function __construct($class,$stream,$section,$subject,$assasment){
        
        $this->class = $class;
        $this->stream = $stream;
        $this->section = $section;
        $this->subject = $subject;
        $this->assasment = $assasment;
    }

    public function model(array $row){
        $student = student::where('student_id',(int)$row['id'])->first();
        $getStream = stream::where("stream_type",$this->stream)->get()->first();
        $subject = DB::table('subject_groups')
            ->join('subjects','subject_groups.subject_id','=','subjects.id')
            ->where('subject_name',$this->subject)
            ->get('subject_groups.id as id')
            ->first();
        $semister = semister::where('current_semister',true)->get()->first();
            error_log("student ID: ".$student->id);
            error_log("Stream ID: ".$getStream->id);
            // error_log("Assasment ID: ".$assasment->id);
            // error_log("Load ID: ".$this->load);
            error_log("subject ID: ".$subject->id);
        if($student->class_id == $this->class and $student->stream_id == $getStream->id){
            error_log("it works fine");
            for ($i=0; $i < count($this->assasment); $i++) {
                $splitter = explode("-",$this->assasment[$i]);

                $assasment = assasment_type::where("assasment_type",$splitter[0])->get()->first();
                $load = rtrim($splitter[1],"%");
                // dd(strtolower($splitter[0])."_".$splitter[1]);
                // echo (($assasment->id));
                // dd(strtolower($this->assasment[$i]));
                // dd($row[strtolower($splitter[0])."_".$load]);

                $mark = new student_mark_list();
                    $mark->semister_id = (int)$semister->id;
                    $mark->assasment_type_id = (int)$assasment->id;
                    $mark->subject_group_id = (int)$subject->id;
                    $mark->class_id = (int)$student->class_id;
                    $mark->student_id = (int)$student->id;
                    $mark->test_load = floatval($load);
                    $mark->mark = floatval( $row[strtolower($splitter[0])."_".$load]);
                    $mark->academic_year = 2021;
                $mark->save();
            }
            return null;

        }
    }

    public function headingRow():int{
        return 6;
    }

    public function startRow(): int{
        return 7;
    }


}
