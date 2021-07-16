<?php

namespace App\Imports;

use App\Models\student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        $getId = $this->idGeneratorFun();
        $insertStudent = new student([
            'first_name'=>$row['first_name'],
            'middle_name'=>$row['middle_name'],
            'last_name'=>$row['last_name'],
            'class_id'=>$row['class_id'],
            'stream_id'=>$row['stream_id'],
            'student_id'=>$getId,
            'gender'=>'male',
            'birth_year'=>'2021-07-11'
        ]);
         $this->addUserAccount($row['first_name'],$getId);
        return $insertStudent;
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

    function addUserAccount($name, $id){

        $userAccount = new User();
        $userAccount->name = $name.$id;
        $userAccount->email = $name.$id.'@gmail.com';
        $userAccount->password = Hash::make($name.$id);
        $userAccount->save();
        $roleId = 2;
        $userAccount->roles()->attach($roleId);
}
}
