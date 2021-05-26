<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class academic_background_info extends Model
{
   
   protected $fillable = [
        'id',
        'field_of_study',
        'place_of_study',
        'date_of_study'
 ];
}
