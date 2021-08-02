<?php

namespace App\Exports;

use App\Models\student;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport implements FromCollection
{
    public function collection()
    {
        return student::all();
    }
}
