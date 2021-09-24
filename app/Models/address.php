<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $fillable = [
                            'id',
                            'city',
                            'subcity',
                            'email',
                            'kebele',
                            'p_o_box',
                            'phone_number',
                            'home_phone_number',
                            'unit',
                            'house_number'
                        ];
}
