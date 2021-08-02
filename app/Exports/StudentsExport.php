<?php

namespace App\Exports;

use App\Models\classes;
use App\Models\section;
use App\Models\student;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class StudentsExport implements FromCollection,WithHeadings,WithColumnFormatting,WithColumnWidths,ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function __construct($class,$stream,$section,$assasment,$courseLoad,$subject)
    {
        $this->class = $class;
        $this->stream = $stream;
        $this->section = $section;
        $this->assasment = $assasment;
        $this->courseLoad = $courseLoad;
        $this->subject = $subject;
    }

    public function collection()
    {
        error_log("Class: ".$this->class." Stream: ".$this->stream." Section: ".$this->section);
            $getStudent = DB::table('sections')
                            ->join("students","sections.student_id","=",'students.id')
                            ->join("classes","sections.class_id","=","classes.id")
                            ->join("streams","sections.stream_id","=","streams.id")
                            ->where("sections.section_name",$this->section)
                            ->where("classes.id",$this->class)
                            ->where("streams.stream_type",$this->stream)
                            ->get(["students.student_id", DB::raw('CONCAT(first_name, " ", middle_name," ",last_name) AS full_name')]);

                            // section::select('Tenant_Id', DB::raw('CONCAT(First_Name, " ", Last_Name) AS full_name'))
                            // ->orderBy('First_Name')
                            // ->lists('full_name', 'Tenant_Id');       // return student::all();
        return $getStudent;
    }

    public function headings(): array
    {
       // $header = array("Class and Section");
        //$header = array('Student ID','Student Full Name');
        return [
            ['KAMARA SCHOOL'],
            ['STUDENT MARK LIST'],
            ['GRADE '.$this->class.' STREAM '.$this->stream],
            ['SECTION '.$this->section],
            ['SUBJECT '.$this->subject],
            ['ASSASMENT TYPE '.$this->assasment.' PERCENTAGE '.$this->courseLoad.'%'],
            ['id','full name','mark'],
         ];
    }
    public function columnFormats(): array
    {
        return [
            'A' =>'0',
            'B' => '@'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'C' => 20,
            'G' => 5,
        ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $Kamara = 'A1:W1'; // All headers
                $class = 'A2:W2';
                $grade = 'A3:W3';
                $subject = 'A4:W4';
                $section = 'A5:W5';
                $assasment = 'A6:W6';
                $student = 'A7:W7';
                $event->sheet->getDelegate()->getStyle($Kamara)->getFont()->setSize(18);
                $event->sheet->getDelegate()->getStyle($grade)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($subject)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($section)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($class)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($student)->getFont()->setSize(13);
                $event->sheet->getDelegate()->getStyle($assasment)->getFont()->setSize(14);
                $event->sheet->mergeCells('A1:C1');
                $event->sheet->mergeCells('A2:C2');
                $event->sheet->mergeCells('A3:C3');
                $event->sheet->mergeCells('A4:C4');
                $event->sheet->mergeCells('A5:C5');
                $event->sheet->mergeCells('A6:C6');
            },
        ];
    }
}
