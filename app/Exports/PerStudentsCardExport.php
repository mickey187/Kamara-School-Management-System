<?php

namespace App\Exports;

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

class PerStudentsCardExport implements FromCollection,WithTitle,WithHeadings,WithEvents,WithColumnWidths,WithCustomStartCell
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function __construct($student,$class,$stream,$section,$name)
    {
        $this->student = $student;
        $this->class = $class;
        $this->stream = $stream;
        $this->section = $section;
        $this->name = $name;
        $this->subjectSize = count( DB::table('subject_groups')
                ->join('classes','subject_groups.class_id','=','classes.id')
                ->join('subjects','subject_groups.subject_id','=','subjects.id')
                ->where('subject_groups.class_id',$this->class)
                ->get('subject_name'))+7;
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
            ["Name Of Student: ".$this->name,"","","","","","","","","","Basic Skill And Personal Development","","","",""],
            [],
            [],
            ["","First","Second","First","Third","Fourth","Second","","","","","First","Second","Third","Fourth"],
            ['Subject','Quarter','Quarter','Semister','Quarter ','Quarter','Semister','Average','','',
                'Traits','Quarter','Quarter','Quarter','Quarter'
            ]
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
            'H' => 10,
            'I' => 10,
            'L' => 20,
        ];
    }

    public function registerEvents(): array{
    return [
        AfterSheet::class    => function(AfterSheet $event) {
            // $event->sheet->setHeight(2, 30);

            $event->sheet->styleCells(
                'B5:I'.$this->subjectSize,
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
                'F5:F'.$this->subjectSize+6,
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
                'G5:G'.$this->subjectSize+6,
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
                'H5:H'.$this->subjectSize+6,
                [
                    //Set border Style
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '0492c2'],
                        ],

                    ],

                    //Set font style
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
                'I5:I'.$this->subjectSize+6,
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
                'L6:P'.$this->getTraitSize,
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
                'B5:I7',
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
                'L6:P7',
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
                'L6:L'.$this->getTraitSize,
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
                'M6:M'.$this->getTraitSize,
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
                'N6:N'.$this->getTraitSize,
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
                'O6:O'.$this->getTraitSize,
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
                    'B'.$x.':I'.$x,
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
                'C'.($this->subjectSize+1).':I'.($this->subjectSize+6),
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
                'I5:I'.($this->subjectSize+6),
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
                'H5:H'.($this->subjectSize+6),
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
            for($i=8; $i<$this->subjectSize+7; $i++){
                $event->sheet->getDelegate()->getRowDimension($i)->setRowHeight(27);
            }
            // $event->sheet->getDelegate()->getStyle('B9:D11')->getAlignment()->setWrapText(true);
            // $event->sheet->setSize(array(
            //     'B9' => array(
            //         'width'     => 50,
            //         'height'    => 500
            //     )
            // ));
// FFCCCC avarage
// E0E0E0 semister

        },
    ];
}

}
