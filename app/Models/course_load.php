<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_load extends Model
{
    protected $fillable = [
        'id',
        'class_id',
        'subject_id'
    ];
}
