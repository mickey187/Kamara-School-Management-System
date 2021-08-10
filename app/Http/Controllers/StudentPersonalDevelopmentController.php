<?php

namespace App\Http\Controllers;

use App\Models\StudentTraits;
use Illuminate\Http\Request;

class StudentPersonalDevelopmentController extends Controller
{
    //
    public function addStudentTraits( $value){
        $trait = new StudentTraits();
        $trait->traits_name = $value;
        $trait->save();
        $getTrait = StudentTraits::all();
        return response()->json($getTrait) ;
    }
}
