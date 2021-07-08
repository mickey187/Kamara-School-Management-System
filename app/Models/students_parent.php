<?php

namespace App\Models;

use App\Models\address as ModelsAddress;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students_parent extends Model
{
   protected $fillable = [
                        'id',
                        'first_name',
                        'middle_name',
                        'last_name',
                        'gender',
                        'relation',
                        'school_closur_priority',
                        'emergency_contact_priority',
                        'address',
                        'student'
                    ];
}
