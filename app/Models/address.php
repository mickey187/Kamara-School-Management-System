<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $fillable = [
                            'id',
                            'city',
                            'unit',
                            'email',
                            'kebele',
                            'p_o_box',
                            'phone_number',
                            'work_phone_number',
                            'house_number',
                            'home_phone_number',
                        ];
}
