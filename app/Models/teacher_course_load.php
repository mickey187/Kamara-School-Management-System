<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher_course_load extends Model
{
    
   protected $filled = [
        'id',
        'class',
        'section',
        'subject_id'
    ];
}
