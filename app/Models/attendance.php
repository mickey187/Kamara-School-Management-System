<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    protected $fillable = [
                            'id',
                            'status',
                            'date',
                            'student',
                            'class'
                        ];
}
