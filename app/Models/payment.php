<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
       protected $fillabl = [
                                'id',
                                'amount',
                                'payment_date',
                                'payment_type',
                                'student'
                    ];
}
