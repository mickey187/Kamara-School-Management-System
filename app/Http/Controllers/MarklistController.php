<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\MarklistImport;
use Maatwebsite\Excel\Facades\Excel;

class MarklistController extends Controller
{
    //
    public function addMarkListForm(){
        return view('admin.curriculum.add_marklist');
    }
    public function import(Request $request){
        Excel::import(new MarklistImport,$request->Excel);
        return "Imported successfuly";
    }
}
