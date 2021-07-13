<?php

namespace App\Imports;

use App\Models\student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new student([
            'first_name'=>$row['first_name'],
            'middle_name'=>$row['middle_name'],
            'last_name'=>$row['last_name'],
            'class_id'=>$row['class_id'],
            'stream_id'=>$row['stream_id'],
            'student_id'=>$this->idGeneratorFun(),
            'gender'=>'male',
            'birth_year'=>'2021-07-11'
        ]);
    }
    public function idGeneratorFun(){
        $fourRandomDigit = rand(1000,9999);
        $student = student::get(['id']);
        foreach($student as $row){
            if($row->id==$fourRandomDigit){
                $this->idGeneratorFun();
            }
        }
        return $fourRandomDigit;
    }
}
