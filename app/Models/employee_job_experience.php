<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_job_experience extends Model
{
    
    protected $fillable = [
        'id',
        'past_job_position',
        'past_employment_place',
        'address'
    ];
}
