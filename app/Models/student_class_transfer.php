<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_class_transfer extends Model
{
    protected $fillable=[
                            'id',
                            'yearly_average',
                            'transfered_to',
                            'pass_fail_status',
                            'student_semister_average'
                        ];
}
