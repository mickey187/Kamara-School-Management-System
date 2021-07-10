<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tuition_fee extends Model
{
    protected $fillable = [
        'id',
        'student_id',
        'payment_load_id',
        'amount_payed',
        'payment_month'
    ];
}
