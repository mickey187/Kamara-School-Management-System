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
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

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
        $student = student::where('student_id',(int)$row['id'])->first();
        $getStream = stream::where("stream_type",$this->stream)->get()->first();
        $assasment = assasment_type::where("assasment_type",$this->assasment)->get()->first();
        $subject = subject::where("subject_name",$this->subject)->get()->first();
        $semister = semister::where('current_semister',true)->get()->first();
        if($student->class_id == $this->class and $student->stream_id == $getStream->id){
            error_log("it works fine");
            return new student_mark_list([
                'semister_id'=>$semister->id,
                'assasment_type_id'=>$assasment->id,
                'subject_id'=>$subject->id,
                'class_id'=>$student->class_id,
                'student_id'=>$student->id,
                'test_load'=>$this->load,
                'mark'=>floatval($row['mark']),
                'academic_year'=>2021
            ]);
        }
    }
}
