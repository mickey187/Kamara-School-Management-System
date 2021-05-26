<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    protected $fillable=[
                            'subject_group',
                            'subject_name',
                            'stream'
                        ];
}
