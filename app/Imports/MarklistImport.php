<?php

namespace App\Imports;

use App\Models\student_mark_list;
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
        return new student_mark_list([
            'id'=>$row['id'],
            'assasment_type_id'=>$row['assasment_type_id'],
            'subject_id'=>$row['subject_id'],
            'class_id'=>$row['class_id'],
            'teacher_id'=>$row['teacher_id'],
            'student_id'=>$row['student_id'],
            'mark'=>$row['mark'],
            'academic_year'=>$row['academic_year']
        ]);
    }
}
