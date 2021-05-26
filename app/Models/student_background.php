<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_background extends Model
{
    protected $fillable=[
                            'id',
                            'previous_school',
                            'transfer_reason',
                            'suspension_status',
                            'expulsion_status',
                            'previous_special_education',
                            'citizenship',
                            'previous_school',
                            'native_tongue'
                        ];
}
