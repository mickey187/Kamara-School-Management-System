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
use Andegna;
class MarklistImport implements ToModel,WithHeadingRow,WithStartRow
{

    public function __construct($class,$stream,$section,$assasment,$load,$subject)
    {
        $this->class = $class;
        $this->stream = $stream;
        $this->section = $section;
        $this->assasment = $assasment;
        $this->load = $load;
        $this->subject = $subject;
    }

    public function headingRow():int{
        return 7;
    }

    public function startRow(): int{

        return 8;
    }

    public function model(array $row)
    {

        error_log($row['id']);
        $now1 = \Andegna\DateTimeFactory::now();
        $current_date = $now1->getYear();
        $student = student::where('student_id',(int)$row['id'])->first();
        $getStream = stream::where("stream_type",$this->stream)->get()->first();
        $assasment = assasment_type::where("assasment_type",$this->assasment)->get()->first();
        $subject = //SubjectGroup::where("subject_name",$this->subject)->get()->first();
                    DB::table('subject_groups')
                        ->join('subjects','subject_groups.subject_id','=','subjects.id')
                        ->where('subject_name',$this->subject)
                        ->get('subject_groups.id as id')
                        ->first();
        $semister = semister::where('current_semister',true)->get()->first();
        error_log("student ID: ".$student->id);
        error_log("Stream ID: ".$getStream->id);
        error_log("Assasment ID: ".$assasment->id);
        error_log("Load ID: ".$this->load);
        error_log("subject ID: ".$subject->id);
        if($student->class_id == $this->class and $student->stream_id == $getStream->id){
            error_log("it works fine");
            return new student_mark_list([
                'semister_id' => (int)$semister->id,
                'assasment_type_id' => (int)$assasment->id,
                'subject_group_id' => (int)$subject->id,
                'class_id' => (int)$student->class_id,
                'student_id' => (int)$student->id,
                'test_load' => floatval($this->load),
                'mark' =>floatval($row['mark']),
                'academic_year' => $current_date,
            ]);
        }
    }
}
