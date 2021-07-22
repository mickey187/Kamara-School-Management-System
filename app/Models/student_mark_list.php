<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_mark_list extends Model
{
    use HasFactory;

    protected $table = "student_mark_lists";

    protected $fillable = [
                            'id',
                            'assasment_type_id',
                            'subject_id',
                            'class_id',
                            'teacher_id',
                            'student_id',
                            'mark',
                            'test_load',
                            'semister_id',
                            'academic_year'
                        ];
}
