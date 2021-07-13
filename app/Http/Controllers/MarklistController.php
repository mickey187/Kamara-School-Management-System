<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\MarklistImport;
use App\Imports\StudentImport;
use App\Models\assasment_type;
use App\Models\classes;
use App\Models\subject;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class MarklistController extends Controller
{
    public function addMarkListForm(){
        $ass = assasment_type::all();
        $classes = classes::all();
        $sub = subject::all();
        return view('admin.curriculum.add_marklist')->with('assasment',$ass)->with('classes',$classes)->with('subject',$sub);
    }

    public function import(Request $request){
        //Excel::store(new MarklistImport,$request->Excel);
        //$request->file('Excel')->storeAs('public',$request->Excel);
        // Excel::import(new MarklistImport,$request->Excel);
        Excel::import(new MarklistImport, $request->Excel);
       // Storage::move($request->Excel, storage_path());

         return "data inserted";
    }

    public function sample_student(Request $request){

        Excel::import(new StudentImport, $request->excel);
       // Storage::move($request->Excel, storage_path());

         return "Student inserted";
    }

    public function addAssasment(){
        $assasment = new assasment_type();
        $assasment->assasment_type = request('assasment_label');
        $assasment->save();
        $ass = assasment_type::all();
        return view('admin.curriculum.add_assasment_label')->with('assasment',$ass);
    }

    public function assasmentForm(){
        $ass = assasment_type::all();
        return view('admin.curriculum.add_assasment_label')->with('assasment',$ass);
    }
}
