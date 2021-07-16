<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_type extends Model
{
       protected $fillable = [
                                'id',
                                'payment_type',
                                'recurring_type'
                            ];

}
