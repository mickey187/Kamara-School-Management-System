<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_payment_load extends Model
{
    use HasFactory;
    protected $table = 'student_payment_load';
    protected $fillable = ['id','student_id','payment_load_id','discount_percent'];
    
}
