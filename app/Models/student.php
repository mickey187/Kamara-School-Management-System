<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable=[
                            'id',
                            'student_id',
                            'image',
                            'first_name',
                            'middle_name',
                            'last_name',
                            'birth_year',
                            'gender',
                            'parent',
                            'student_background',
                            'student_medical_info',
                            'student_enrolment',
                            'class'
                        ];
}
