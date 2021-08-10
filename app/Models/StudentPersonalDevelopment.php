<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPersonalDevelopment extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'traits_name',
        'trait_value'
    ];
}
