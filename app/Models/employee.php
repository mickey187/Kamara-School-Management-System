<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'id',
    'first_name',
    'middle_name',
    'last_name',
    'gender',
    'birth_date',
    'hired_date',
    'education_status',
    'marriage_status',
    'previous_employment',
    'special_skill',
    'net_salary',
    'job_traning',
    'nationality',
    'hire_type',
    'job_experience',
    'employee_religion',
    'employee_job_position',
    'employee_emergency_contact',
    'address'
];
    

}
