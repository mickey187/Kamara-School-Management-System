<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hire extends Model
{
  
   protected $filled = [
        'id',
        'date',
        'hirer',
        'hiree'
    ];
}
