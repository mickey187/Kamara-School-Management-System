<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semister extends Model
{
    protected $fillable = ['id','semister','term','current_semister'];
}
