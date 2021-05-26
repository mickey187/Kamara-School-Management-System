<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_enrolment extends Model
{
    protected $fillable=[
                            'id',
                            'acadamic_year',
                            'class',
                            'student',
                            'student_class_transfer'
                        ];
}
