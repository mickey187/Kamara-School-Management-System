<?php

namespace App\Imports;

use App\Models\assasment_type;
use App\Models\section;
use App\Models\semister;
use Illuminate\Http\Request;
use App\Models\student_mark_list;
use App\Models\student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MarklistImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        error_log($row['id']);
        $semister = (int)request('semister');
        $grade = (int)request('grade');
        $section = request('section');
        $subject = request('subject');
        $assasment_type = request('assasment_type');
        $test_load = request('testLoad');
        if($grade > $test_load){
            $grade = $test_load;
        }
        $academic_year = request('academic_year');

        $student = student::where('student_id',(int)$row['id'])->first();
        $section2 = section::where('student_id',$student->id)
                           ->where('class_id',$grade)
                           ->where('section_name',$section)->first();
            error_log($student->class_id);
            error_log($grade);
            error_log($semister);
            error_log($section);
            error_log($section2);
        if($section2){
            return new student_mark_list([
                'semister_id'=>$semister,
                'assasment_type_id'=>$assasment_type,
                'subject_id'=>$subject,
                'class_id'=>$grade,
                'student_id'=>$student->id,
                'test_load'=>$test_load,
                'mark'=>floatval($row['mark']),
                'academic_year'=>$academic_year
            ]);
        }

    }
}
