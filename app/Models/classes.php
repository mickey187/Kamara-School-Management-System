<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
   protected $fillable = [
                            'id',
                            'stream_id',                                                        
                            'class_label'                            
                        ];
}
