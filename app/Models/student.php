<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $table = "students";

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
                            'class_id',
                            'stream_id'
                        ];

    public function payment_loads()
    {
        return $this->belongsToMany(payment_load::class);
    }    
}
