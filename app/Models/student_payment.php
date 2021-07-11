<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_payment extends Model
{
   protected $fillable = [
       'id',
       'student_id',
       'payment_load_id',
       'amount'
   ];
}
