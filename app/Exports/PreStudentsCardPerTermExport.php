<?php

namespace App\Exports;

use App\Models\classes;
use App\Models\semister;
use App\Models\student;
use App\Models\StudentTraits;
use App\Models\subject;
use App\Models\SubjectGroup;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpWord\Style\Shadow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class PreStudentsCardPerTermExport implements FromCollection,WithTitle,WithEvents,WithColumnWidths,WithDrawings,WithCustomStartCell
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($student,$class,$stream,$section,$name,$term)
    {
        $this->student = $student;
        $this->class = $class;
        $this->stream = $stream;
        $this->section = $section;
        $this->name = $name;
        $this->term = $term;
        // $this->subjectSize = count(subject::all())+14;
        $this->subjectSize = count(
            DB::table('subject_groups')
            ->join('classes','subject_groups.class_id','=','classes.id')
            ->join('subjects','subject_groups.subject_id','=','subjects.id')
            ->where('subject_groups.class_id',$this->class)
            ->get('subject_name'))+14;
            // SubjectGroup::where('id',(int)$class)->get())+14;
            // error_log("Size BOP: ".$this->subjectSize);
        $this->getTraitSize = count(StudentTraits::all())+14;
                    // error_log("Size BOP: ".count(StudentTraits::all())+14);


    }

    public function startCell(): string
    {
        return 'A9';
    }

    public function collection()
    {
        return $this->student;
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(storage_path('left_top_corner.jpg'));
        $drawing->setCoordinates('B1');
        $drawing->setWidth(350);

        $drawing2 = new Drawing();
        $drawing2->setName('Logo');
        $drawing2->setDescription('This is my logo');
        $drawing2->setPath(storage_path('right_top_corner.jpg'));
        $drawing2->setCoordinates('E1');
        $drawing2->setWidth(125);
        $drawing2->setOffsetX(70);

        $drawing3 = new Drawing();
        $drawing3->setName('Logo');
        $drawing3->setDescription('This is my logo');
        $drawing3->setPath(storage_path('left_bottom_corner.jpg'));
        $drawing3->setCoordinates('B'.$this->subjectSize+8);
        $drawing3->setWidth(320);
        $drawing3->setOffsetY(5);

        $drawing4 = new Drawing();
        $drawing4->setName('Logo');
        $drawing4->setDescription('This is my logo');
        $drawing4->setPath(storage_path('right_bottom_corner.jpg'));
        $drawing4->setCoordinates('E'.$this->subjectSize+8);
        $drawing4->setWidth(190);
        $drawing4->setOffsetX(40);
        $drawing4->setOffsetY(5);


        return [$drawing,$drawing2,$drawing3,$drawing4];
    }
    public function title(): string
    {
        return $this->name;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 20,
            'C' => 10,
            'E' => 18,
            'F' => 7,
        ];
    }


    public function registerEvents(): array{
        return [
            AfterSheet::class    => function(AfterSheet $event) {

                $event->sheet->styleCells(
                    'B13:C14',
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
                            'size'      =>  15,
                            'bold'      =>  true,
                            'color'     => ['argb' => '0492c2'],
                            'text-align' => 'center',
                        ],

                        //Set background style
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => [
                                'rgb' => 'dff0d8',
                             ]
                        ],

                    ]
                );

                $event->sheet->styleCells(
                    'B15:C'.$this->subjectSize,
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
                            'size'      =>  10,
                            'bold'      =>  false,
                            'color'     => ['argb' => '0492c2'],
                            'text-align' => 'center',
                        ],
                        // 'fill' => [
                        //     'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        //     'color' => ['argb' => '0492c2']
                        // ],

                        //Set background style
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => ['rgb' => 'dff0d8'],
                            'color' => ['rgb' => 'dff0d8']
                        ],

                    ]
                );
                $event->sheet->styleCells(
                    'C13:C'.$this->subjectSize,
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
                            'size'      =>  10,
                            'bold'      =>  false,
                            'color'     => ['argb' => '0492c2'],
                            'text-align' => 'center',
                        ],

                        //Set background style
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => [
                                'rgb' => 'dff0d8',
                             ]
                        ],

                    ]
                );
                $event->sheet->styleCells(
                    'E'.($this->subjectSize+5).':F'.($this->subjectSize+6),
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
                            'size'      =>  10,
                            'bold'      =>  true,
                            'color'     => ['argb' => '0492c2'],
                            'text-align' => 'center',
                        ],

                        //Set background style
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => [
                                'rgb' => 'dff0d8',
                             ]
                        ],

                    ]
                );

                $event->sheet->styleCells(
                    'E15:F'.$this->getTraitSize,
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
                            'size'      =>  10,
                            'bold'      =>  true,
                            'color'     => ['argb' => '0492c2'],
                            'text-align' => 'center',
                        ],

                        //Set background style
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => [
                                'rgb' => 'dff0d8',
                             ]
                        ],

                    ]
                );
                $event->sheet->styleCells(
                    'E14:F14',
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
                            'size'      =>  10,
                            'bold'      =>  true,
                            'color'     => ['argb' => '0492c2'],
                            'text-align' => 'center',
                        ],

                        //Set background style
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => [
                                'rgb' => 'dff0d8',
                             ]
                        ],

                    ]
                );
                $event->sheet->styleCells(
                    'E15:F'.$this->getTraitSize,
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
                            'size'      =>  10,
                            'bold'      =>  true,
                            'color'     => ['argb' => '0492c2'],
                            'text-align' => 'center',
                        ],

                        //Set background style
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => [
                                'rgb' => 'dff0d8',
                             ]
                        ],

                    ]
                );
                $event->sheet->styleCells(
                    'B'.($this->subjectSize+1).':C'.($this->subjectSize+6),
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
                            'size'      =>  10,
                            'bold'      =>  true,
                            'color'     => ['argb' => '0492c2'],
                            'text-align' => 'center',
                        ],

                        //Set background style
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => [
                                'rgb' => 'dff0d8',
                             ]
                        ],

                    ]
                );
                $event->sheet->styleCells(
                    'B'.($this->subjectSize+1).':B'.($this->subjectSize+6),
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
                            'size'      =>  10,
                            'bold'      =>  true,
                            'color'     => ['argb' => '0492c2'],
                            'text-align' => 'center',
                        ],

                        //Set background style
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => [
                                'rgb' => 'dff0d8',
                             ]
                        ],

                    ]
                );
                $event->sheet->styleCells(
                    'E15:E'.$this->getTraitSize,
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
                            'size'      =>  10,
                            'bold'      =>  false,
                            'color'     => ['argb' => '0492c2'],
                            'text-align' => 'center',
                        ],

                        //Set background style
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => [
                                'rgb' => 'dff0d8',
                             ]
                        ],
                    ]
                );
                $event->sheet->getDelegate()->getStyle('A1:B1')->getAlignment('center');
            },
        ];
    }
}
