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
    public static $excelRow = 0;
    public static $assasment_and_percentage = null;
    public static $subject = null;
    public static $assasmentList = array();
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //error_log($row[0]);
        global $counter,$assasment_and_percentage,$subject,$excelRow,$assasmentList;
        if($counter == 5){
            //error_log($row[0]);
            $this->setAssasmentPercentage($row[0]);
        }if($counter == 4){
            $this->setSubject($row[0]);
        }if($counter == 5){
            for ($i=0; $i < count($row); $i++) {
                error_log("Assasment: ".$row[$i]);
                if ($i > 1) {
                    $this->setAssasmentList($row[$i]);
                }
            }
        }
        $counter = $counter + 1;
        $this->setExcelRow();
    }

    function setAssasmentPercentage($data) {
         self::$assasment_and_percentage = $data;
    }

    function setSubject($data){
        self::$subject = $data;
    }

    function setExcelRow(){
        self::$excelRow++;

    }

    function getStatic() {
        return self::$assasment_and_percentage;
    }

    function setAssasmentList($data){
        array_push(self::$assasmentList,$data);
    }
}
