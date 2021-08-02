<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Imports\HeaderFileImport;
use App\Imports\MarklistImport;
use App\Models\classes;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function export($class,$stream,$section,$assasmnet,$courseLoad,$subject)
    {
        $grade = classes::where('id',$class)->get()->first();
        return Excel::download(new StudentsExport($grade->id,$stream,$section,$assasmnet,$courseLoad,$subject), 'Grade_'.$grade->class_label.'_Stream_'.$stream.'_Section_'.$section.'.xlsx');
    }

    public function importExcel(Request $req){
        $data = explode(",",$req->data);
        $class = $data[0];
        $stream = $data[1];
        $section = $data[2];
        $hedaerData = new HeaderFileImport(); //creating Object

        $findClass = classes::where('id',$class)->get()->first();

         if("Grade_".$findClass->class_label."_Stream_".$stream."_Section_".$section.".xlsx"==$req->exel->getClientOriginalName()){
            Excel::import($hedaerData, $req->exel);
            $incomingHeaderLoad = explode(" ",$hedaerData::$assasment_and_percentage);
            $incomingHeaderAssasment = rtrim($incomingHeaderLoad[2],"%");
            $incomingHeaderPercentage = rtrim($incomingHeaderLoad[4],"%");
            $incomingHeaderSubject = explode(" ",$hedaerData::$subject);
            error_log("Percentage: ".$incomingHeaderPercentage);
            error_log("Assasment: ".$incomingHeaderAssasment);
            error_log("Subject: ".$incomingHeaderSubject[1]);
            error_log("Abet Abet ". $hedaerData::$assasment_and_percentage." Subject ".$hedaerData::$subject);
            Excel::import(new MarklistImport($class,$stream,$section,$incomingHeaderAssasment,$incomingHeaderPercentage,$incomingHeaderSubject[1]), $req->exel);
         }else{
             error_log("no");
         }

        // error_log($req->exel->getClientOriginalName());
        //  error_log($req->cla);
        // return response()->json("data inserted");
     }

}
