<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_medical_info extends Model
{
    protected $fillable=[
                            'id',
                            'disablity',
                            'medical_condtion',
                            'blood_type'
                        ];
}
