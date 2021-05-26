<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class acadamic_calander extends Model
{

    protected $filled = [
                            'id',
                            'year',
                            'event',
                            'start_date',
                            'end_date'
                        ];
}
