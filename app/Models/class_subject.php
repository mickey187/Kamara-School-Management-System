<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class class_subject extends Model
{
    protected $fillable = [
        'id',
        'class_id',
        'subject_id'                                            
    ];
}
