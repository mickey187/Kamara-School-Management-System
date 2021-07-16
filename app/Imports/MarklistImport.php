<?php

namespace App\Imports;

use App\Models\assasment_type;
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
        $student = student::where('student_id',$row['id'])->first();

        return new student_mark_list([
            'assasment_type_id'=>request('assasment_type'),
            'subject_id'=>request('subject'),
            'class_id'=>request('grade'),
            'student_id'=>$student->id,
            'test_load'=>(int)request('testLoad'),
            'mark'=>floatval($row['mark']),
            'academic_year'=>'2020'
        ]);
    }
}
