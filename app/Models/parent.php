<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parent extends Model
{
   protected $fillabl = [
                        'id',
                        'first_name',
                        'middle_name',
                        'last_name',
                        'gender',
                        'relation',
                        'school_closur_priority',
                        'emergency_contact_priority',
                        'address'
                    ];
}
