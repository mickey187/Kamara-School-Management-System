<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home_room extends Model
{

    protected $filled = [
      'id',
      'class_id',
      'section',
      'employee_id',
      'attendance_id'
    ];
}
