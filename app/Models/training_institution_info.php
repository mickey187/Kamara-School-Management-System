<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class training_institution_info extends Model
{
   
   protected $filled = [
        'id',
        'teacher_training_program',
        'teacher_training_year',
        'teacher_training_institute'
    ];
}
