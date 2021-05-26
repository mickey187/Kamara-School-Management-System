<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_emergency_contact extends Model
{
    
    protected $fillable =[
        'id',
        'contact_name',
        'relation'
    ]; 
}
