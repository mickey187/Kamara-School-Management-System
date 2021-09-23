<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportController extends Controller
{

    public function checkIfIdGeneratedForClass($class_id,$stream_id,$section_name){
        return response()->json(false);
    }
}
