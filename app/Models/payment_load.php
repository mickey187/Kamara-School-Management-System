<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_load extends Model
{
    protected $fillable = [
        'id',
        'payment_laod_id',
        'class_id',
        'amount'
    ];

    public function students()
    {
        return $this->belongsToMany(student::class);
    }
}
