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

class StudentsMultipleAssasmentExport implements FromCollection,WithHeadings,WithColumnWidths,ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $assasment = array();
    // public $listOfAssasment = [];

    public function __construct($class,$stream,$section,$assasment,$subject)
    {
        // global $listOfAssasment,$assasment;
        $this->class = $class;
        $this->grade = classes::where('id',$class)->get()->first();
        $this->stream = $stream;
        $this->section = $section;
        array_push($this->assasment,"id");
        array_push($this->assasment,"full_name");
        $this->listOfAssasment = explode(",",$assasment);;
        for ($i=0; $i < count($this->listOfAssasment); $i++){
            array_push( $this->assasment ,  explode(",",$assasment)[$i]."%");
        }

        $this->subject = $subject;
        $this->getStudent = DB::table('sections')
                            ->join("students","sections.student_id","=",'students.id')
                            ->join("classes","sections.class_id","=","classes.id")
                            ->join("streams","sections.stream_id","=","streams.id")
                            ->where("sections.section_name",$this->section)
                            ->where("classes.id",$this->class)
                            ->where("streams.stream_type",$this->stream)
                            ->get(["students.student_id", DB::raw('CONCAT(first_name, " ", middle_name," ",last_name) AS full_name')]);
        $this->alphabet =   array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    }


    public function collection()
    {
        error_log("Class: ".$this->class." Stream: ".$this->stream." Section: ".$this->section);

                            // section::select('Tenant_Id', DB::raw('CONCAT(First_Name, " ", Last_Name) AS full_name'))
                            // ->orderBy('First_Name')
                            // ->lists('full_name', 'Tenant_Id');       // return student::all();
        return $this->getStudent;
    }

    public function headings(): array
    {
       // $header = array("Class and Section");
        //$header = array('Student ID','Student Full Name');

        return [
            ['KAMARA SCHOOL'],
            ['STUDENT MARK LIST'],
            ['GRADE '.$this->grade->class_label.' STREAM '.$this->stream],
            ['SECTION '.$this->section],
            ['SUBJECT '.$this->subject],
            $this->assasment,
         ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 30,
        ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $Kamara = 'A1:A1'; // All headers
                $class = 'A2:A2';
                $grade = 'A3:A3';
                $subject = 'A4:A4';
                $section = 'A5:A5';
                $student = 'A6:B6';
                $event->sheet->getDelegate()->getStyle($Kamara)->getFont()->setSize(18);
                $event->sheet->getDelegate()->getStyle($grade)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($subject)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($section)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($class)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($student)->getFont()->setSize(13);
                $event->sheet->mergeCells('A1:C1');
                $event->sheet->mergeCells('A2:C2');
                $event->sheet->mergeCells('A3:C3');
                $event->sheet->mergeCells('A4:C4');
                $event->sheet->mergeCells('A5:C5');
                $event->sheet->styleCells(
                    'A1:A5',
                    [
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '0492c2'],
                            ],

                        ],
                        'font' => [
                            'name'      =>  'Calibri',
                            'size'      =>  13,
                            'bold'      =>  true,
                            'color'     => ['argb' => '0492c2'],
                            'text-align' => 'center',
                        ],
                    ]
                );

                $event->sheet->styleCells(
                    'A6:'.$this->alphabet[count($this->assasment)-1]."6",
                    [
                        //Set border Style
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '0492c2'],
                            ],

                        ],

                        //Set font style
                        'font' => [
                            'name'      =>  'Calibri',
                            'size'      =>  12,
                            'bold'      =>  true,
                            'color'     => ['argb' => '0492c2'],
                            'text-align' => 'center',
                        ],
                    ]
                );
                $event->sheet->styleCells(
                    'A7:'.$this->alphabet[count($this->assasment)-1].count($this->getStudent)+6,
                    [
                        //Set border Style
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '0492c2'],
                            ],

                        ],

                        //Set font style
                        'font' => [
                            'name'      =>  'Calibri',
                            'size'      =>  11,
                            'bold'      =>  true,
                            'color'     => ['argb' => '0492c2'],
                            'text-align' => 'center',
                        ],
                    ]
                );
            },
        ];
    }
}
