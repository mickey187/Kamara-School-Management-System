<?php

namespace App\Imports;

use App\Models\student_mark_list;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use SebastianBergmann\LinesOfCode\Counter;
use Symfony\Component\Finder\Glob;

class HeaderFileImport implements ToModel
{
    public  $counter = 100;
    public static $assasment_and_percentage = null;
    public static $subject = null;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //error_log($row[0]);
        global $counter,$assasment_and_percentage,$subject;
        if($counter == 5){
            //error_log($row[0]);
            $this->setAssasmentPercentage($row[0]);
        }if($counter == 4){
            $this->setSubject($row[0]);
        }

        $counter = $counter + 1;
    }

    function setAssasmentPercentage($data) {
         self::$assasment_and_percentage = $data;
    }

    function setSubject($data){
        self::$subject = $data;
    }

    function getStatic() {
        return self::$assasment_and_percentage;
    }
}
