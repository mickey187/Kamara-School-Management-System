<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_mark_list extends Model
{
    protected $fillable = [
                            'id',
                            'academic_year',
                            'assasment_type',
                            'subject',
                            'class',
                            'teacher',
                            'semister',
                            'student'
                        ];
}
