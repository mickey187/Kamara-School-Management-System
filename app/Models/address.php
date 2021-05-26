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
                            'p.o.box',
                            'phone_number',
                            'alternative_phone_number',
                            'house_number'
                        ];
}
