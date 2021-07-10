<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarklistController extends Controller
{
    //
    public function addMarkListForm(){
        return view('admin.curriculum.add_marklist');
    }
}
