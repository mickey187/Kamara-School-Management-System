<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_semister_average extends Model
{
    protected $fillable=[
                            'id',
                            'semister',
                            'student'
                        ];
}
