<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_job_position extends Model
{
    
    protected $fillable = [
        'id',
        'position_name'
    ];
}
