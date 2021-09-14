<?php

namespace Database\Seeders;

use App\Models\student;
use App\Models\student_class_transfer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentClassTransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $student = student::all();
        foreach ($student as $stud) {
            $class = DB::table('classes')->where('id',$stud->class_id)->get()->first();
            $newClass = DB::table('classes')->where('priority',$class->priority + 1)->get()->first();
            if ($newClass) {

                $studentClassTra = new student_class_transfer();
                $studentClassTra->student_id = $stud->id;
                $studentClassTra->status = 'loading';
                $studentClassTra->transfered_from = $class->id;
                $studentClassTra->transfered_to = $class->id;
                $studentClassTra->yearly_average = 0;
                $studentClassTra->academic_year = 2013;
                $studentClassTra->isRegistered = true;
                $studentClassTra->save();
                $newStudent = student::find($stud->id);
                $newStudent->class_id = $class->id;
                $newStudent->update();

            }

        }


    }
}
