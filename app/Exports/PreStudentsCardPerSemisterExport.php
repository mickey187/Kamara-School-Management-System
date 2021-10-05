<?php

namespace App\Exports;

use App\Models\classes;
use App\Models\student;
use App\Models\StudentTraits;
use App\Models\subject;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\WithColumnHieht;

use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\HeaderFooterDrawing;

use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing\Shadow;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Events\BeforeExport;

class PreStudentsCardPerSemisterExport implements FromCollection,WithTitle,WithHeadings,WithEvents,WithColumnWidths,WithCustomStartCell
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($student,$class,$stream,$section,$name)
    {
        $this->student = $student;
        $this->class = $class;
        $this->class_label = classes::find((int)$this->class)->get()->first();
        $this->stream = $stream;
        $this->section = $section;
        $this->name = $name;
        $this->subjectSize = count(
           DB::table('student_mark_lists')
            ->join('subject_groups','student_mark_lists.subject_group_id','=','subject_groups.id')
            ->join('subjects','subject_groups.subject_id','subjects.id')
            ->where('student_mark_lists.class_id',$this->class)
            ->distinct('subject_group_id')
            ->get(['subject_name','subject_groups.id']))+7;
        $this->getTraitSize = count(StudentTraits::all())+7;
        // error_log("Size ISSS: ".$this->subjectSize);
    }


    public function collection()
    {
        return $this->student;
    }
    public function startCell(): string
    {
        return 'B3';
    }
    public function title(): string
    {
        return $this->name;
    }
    public function headings(): array
    {
       // $header = array("Class and Section");
        //$header = array('Student ID','Student Full Name');
        return [
            ["Name Of Student: ".$this->name,"","","","","","Grade: ".$this->class_label->class_label,"","","",""],
            ["","","","","","","Basic Skill And Personal Development"],
            [],
            ["","First","Second","First","","","","First","Second"],
            ['Subject','Quarter','Quarter','Semister','','', 'Traits','Quarter','Quarter']
         ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 20,
            'C' => 10,
            'D' => 10,
            'E' => 10,
            'F' => 10,
            'G' => 10,
            'H' => 20,
            'I' => 10,
        ];
    }

    public function registerEvents(): array{
    return [
        BeforeExport::class  => function(BeforeExport $event) {
            $event->writer->getDelegate()->getSecurity()->setLockWindows(true);
            $event->writer->getDelegate()->getSecurity()->setLockStructure(true);
            $event->writer->getDelegate()->getSecurity()->setWorkbookPassword("1234");
        },
        AfterSheet::class    => function(AfterSheet $event) {
            // $event->sheet->setHeight(2, 30);
            $event->sheet->getProtection()->setSheet(true);
            $event->sheet->styleCells(
                'B5:E'.$this->subjectSize,
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
                'B5:B'.$this->subjectSize,
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
            ]);

            $event->sheet->styleCells(
                'B5:B'.$this->subjectSize+6,
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
                    //Set background style
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'rgb' => 'dff0d8',
                         ]
                    ],
            ]);
            $event->sheet->styleCells(
                'C5:C'.$this->subjectSize+6,
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
                        'bold'      =>  false,
                        'color'     => ['argb' => '0492c2'],
                        'text-align' => 'center',
                    ],
            ]);
            $event->sheet->styleCells(
                'D5:D'.$this->subjectSize+6,
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
                        'bold'      =>  false,
                        'color'     => ['argb' => '0492c2'],
                        'text-align' => 'center',
                    ],
            ]);
            $event->sheet->styleCells(
                'E5:E'.$this->subjectSize+6,
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
                        'bold'      =>  false,
                        'color'     => ['argb' => '0492c2'],
                        'text-align' => 'center',
                    ],
            ]);


            $event->sheet->styleCells(
                'H6:J'.$this->getTraitSize,
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
                'B5:E7',
                [
                    //Set border Style
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '0492c2'],
                        ],

                    ],

                    //Set font style
                    // 'alignment' => array(
                    //     'vertical' => 'center',
                    // ),

                    'font' => [
                        'name'      =>  'Calibri',
                        'size'      =>  12,
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
            ]);
            $event->sheet->styleCells(
                'H6:J7',
                [
                    //Set border Style
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '0492c2'],
                        ],

                    ],

                    //Set font style
                    // 'alignment' => array(
                    //     'vertical' => 'center',
                    // ),

                    'font' => [
                        'name'      =>  'Calibri',
                        'size'      =>  12,
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
            ]);
            $event->sheet->styleCells(
                'H6:H'.$this->getTraitSize,
                [
                    //Set border Style
                    'borders' =>
                    [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '0492c2'],
                            ],

                    ]
            ]);
            $event->sheet->styleCells(
                'I6:I'.$this->getTraitSize,
                [
                    //Set border Style
                    'borders' =>
                    [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '0492c2'],
                            ],

                    ]
            ]);
            $event->sheet->styleCells(
                'J6:J'.$this->getTraitSize,
                [
                    //Set border Style
                    'borders' =>
                    [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '0492c2'],
                            ],

                    ]
            ]);

            for($x = 8; $x < $this->subjectSize+6; $x++){
                $event->sheet->styleCells(
                    'B'.$x.':E'.$x,
                    [
                        //Set border Style
                        'borders' =>
                        [
                                'outline' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color' => ['argb' => '0492c2'],
                                ],

                        ]
                ]);
            }
            $event->sheet->styleCells(
                'C'.($this->subjectSize+1).':E'.($this->subjectSize+6),
                [
                    //Set border Style
                    // 'borders' => [
                    //     'outline' => [
                    //         'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    //         'color' => ['argb' => '0492c2'],
                    //     ],

                    // ],

                    //Set font style
                    'font' => [
                        'name'      =>  'Calibri',
                        'size'      =>  11,
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
            ]);
            $event->sheet->styleCells(
                'E5:E'.($this->subjectSize+6),
                [
                     //Set background style
                     'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'rgb' => 'FFCCCC',
                         ]
                    ],
            ]);

            $event->sheet->styleCells(
                'E5:E'.($this->subjectSize+6),
                [
                     //Set background style
                     'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'rgb' => 'E0E0E0',
                         ]
                    ],
            ]);
            $event->sheet->styleCells(
                'H3:K4',
                [

                     'font' => [
                        'name'      =>  'Calibri',
                        'size'      =>  12,
                        'bold'      =>  true,
                        'color'     => ['argb' => '000000'],
                        'text-align' => 'center',
                    ],
            ]);
            $event->sheet->styleCells(
                'B3:D3',
                [
                     'font' => [
                        'name'      =>  'Calibri',
                        'size'      =>  12,
                        'bold'      =>  true,
                        'color'     => ['argb' => '000000'],
                        'text-align' => 'center',
                    ],
            ]);
            for($i=8; $i<$this->subjectSize+7; $i++){
                $event->sheet->getDelegate()->getRowDimension($i)->setRowHeight(27);
            }
            for($i = 8;$i<$this->getTraitSize;$i++){
                $event->sheet->styleCells(
                    'H'.$i.':J'.$i,
                    [
                        //Set border Style
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '0492c2'],
                            ],
                        ],
                    ]
                );
            }

        },
    ];
}
}
