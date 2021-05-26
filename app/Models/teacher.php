<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    protected $fillable = [
                            'id',
                            'debut_as_a_teacher',
                            'subject',
                            'course_load',
                            'academic_background',
                            'teacher_trainning'
                        ];
}
