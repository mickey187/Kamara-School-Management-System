<?php

namespace App\Exports;

use App\Models\student;
use App\Models\subject;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\WithDrawings;

use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\HeaderFooterDrawing;

use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing\Shadow;

class PerStudentsCardExport implements FromCollection,WithTitle,WithHeadings,WithEvents,WithColumnWidths
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
        $this->subjectSize = count(subject::all())+2;
        // error_log("Size ISSS: ".$this->subjectSize);
    }


    public function collection()
    {
        return $this->student;
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
            [$this->name],
            ['Subject','Term One','Term Two','Term Three','Term Four','Average']
         ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 10,
            'C' => 10,
            'D' => 10,
            'E' => 10,
            'F' => 10
        ];
    }

    public function registerEvents(): array{
    return [
        AfterSheet::class    => function(AfterSheet $event) {
            $event->sheet->styleCells(
                'A3:F'.$this->subjectSize,
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
                'A2:F2',
                [
                    //Set border Style
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
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
                'A3:A'.$this->subjectSize,
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
                'A'.($this->subjectSize+1).':F'.($this->subjectSize+2),
                [
                    //Set border Style
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
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
                'B3:B'.$this->subjectSize,
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
                'C3:C'.$this->subjectSize,
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
                'D3:D'.$this->subjectSize,
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
                'E3:E'.$this->subjectSize,
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
                'F3:F'.$this->subjectSize,
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
            ]);
        },
    ];
}

}
