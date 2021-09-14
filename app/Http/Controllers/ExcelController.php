<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Exports\StudentsMultipleAssasmentExport;
use App\Imports\HeaderFileImport;
use App\Imports\MarklistImport;
use App\Imports\MultipleMarkListImporter;
use App\Imports\StudentImport;
use App\Models\classes;
use App\Models\student;
use App\Models\subject;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;
use Picqer;
use QRCode;
class ExcelController extends Controller
{
    public function export($class,$stream,$section,$assasmnet,$courseLoad,$subject)
    {
        $grade = classes::where('id',$class)->get()->first();
        return Excel::download(new StudentsExport($grade->id,$stream,$section,$assasmnet,$courseLoad,$subject), 'Grade_'.$grade->class_label.'_Stream_'.$stream.'_Section_'.$section."_Subject_".$subject.'.xlsx');
    }
    public function multipleExport($class,$stream,$section,$assasmnet,$subject)
    {
        $grade = classes::where('id',$class)->get()->first();
        // return $assasmnet;
        return Excel::download(new StudentsMultipleAssasmentExport($grade->id,$stream,$section,$assasmnet,$subject), 'Grade_'.$grade->class_label.'_Stream_'.$stream.'_Section_'.$section."_Subject_".$subject.'.xlsx');
    }

    public function importExcel(Request $req){
        $data = explode(",",$req->data);
        $class = $data[0];
        $stream = $data[1];
        $section = $data[2];
        $subject = $data[4];
        error_log($class." ".$stream." ".$section);
        $student = DB::table('sections')
                    ->join("students","sections.student_id","=",'students.id')
                    ->join("classes","sections.class_id","=","classes.id")
                    ->join("streams","sections.stream_id","=","streams.id")
                    ->where("sections.section_name",$section)
                    ->where("classes.id",(int)$class)
                    ->where("streams.stream_type",$stream)
                    ->get('first_name');
        // Excel::import($import, 'users.xlsx');
        // $getSubjectLabel = subject::find($subject);
        $hedaerData = new HeaderFileImport(); //creating Object
        // Excel::import($import, 'users.xlsx');

        $findClass = classes::where('id',$class)->get()->first();


            error_log("Grade_".$findClass->class_label."_Stream_".$stream."_Section_".$section."_Subject_".$subject.".xlsx");
            error_log($req->exel->getClientOriginalName());


         if("Grade_".$findClass->class_label."_Stream_".$stream."_Section_".$section."_Subject_".$subject.".xlsx"==$req->exel->getClientOriginalName()){
            Excel::import($hedaerData, $req->exel);
            error_log("Row Size :::: ".$hedaerData::$excelRow);
            error_log("New Row Size :::: ".count($student)+7);

            if (count($student)+7 == $hedaerData::$excelRow) {
                error_log("New Row Size :::: ".count($student)+7);
                $incomingHeaderLoad = explode(" ",$hedaerData::$assasment_and_percentage);
                $incomingHeaderAssasment = rtrim($incomingHeaderLoad[2],"%");
                $incomingHeaderPercentage = rtrim($incomingHeaderLoad[4],"%");
                $incomingHeaderSubject = explode(" ",$hedaerData::$subject);
                error_log("Percentage: ".$incomingHeaderPercentage);
                error_log("Assasment: ".$incomingHeaderAssasment);
                error_log("Subject: ".$incomingHeaderSubject[1]);
                error_log("Abet Abet ". $hedaerData::$assasment_and_percentage." Subject ".$hedaerData::$subject);
                if(Excel::import(new MarklistImport($class,$stream,$section,$incomingHeaderAssasment,$incomingHeaderPercentage,$incomingHeaderSubject[1]), $req->exel)){
                    return "data inserted!";
                }else{
                    return "data not inserted!";
                };

            }elseif(count($student)+6 == $hedaerData::$excelRow){
                $assasmnet =  $hedaerData::$assasmentList;
                $incomingHeaderSubject = explode(" ",$hedaerData::$subject);
                if(Excel::import(new MultipleMarkListImporter($class,$stream,$section,$incomingHeaderSubject[1],$assasmnet), $req->exel)){
                    return "all Assasment Inserted Successfuly";
                }else{
                    return "Error Happend";
                }
            }

         }else{
            return "data does not belong to this class!";
        }
     }



     public function importStudent(Request $req){
         if(Excel::import(new StudentImport(), $req->exel))
         {
            echo 'impoted successfuly';
         }else{
            echo 'Error';

         }

     }


     public function generateIdPage(){
         return view('admin.student.student_id_generator');
     }

     public function getStudentDetail($id){
         $student = //student::where('student_id',$id)->get()->first();
         DB::table('sections')
         ->join('students','sections.student_id','=','students.id')
         ->join('classes','sections.class_id','=','classes.id')
         ->join('streams','sections.stream_id','=','streams.id')
         ->where('students.student_id',(int)$id)
         ->get(['students.student_id','stream_type','gender','section_name','class_label','first_name','middle_name','last_name',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')])->first();
         return response()->json($student);
     }

     public function generateOneIdForSingleID($id){
         $getStudent = DB::table('sections')
                        ->join('students','sections.student_id','=','students.id')
                        ->join('classes','sections.class_id','=','classes.id')
                        ->join('streams','sections.stream_id','=','streams.id')
                        ->where('students.student_id',(int)$id)
                        ->get(['students.student_id','stream_type','gender','students.created_at','section_name','class_label','first_name','middle_name','last_name',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')])->first();
        error_log("Path2 ----- ".Storage::url('public/student_id_image/idcard.jpg'));
        $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
        file_put_contents(storage_path('app/public/student_id_image/barcode/barcode.jpg'), $generator->getBarcode("Name: ".$getStudent->full_name." ID: ".$getStudent->student_id, $generator::TYPE_CODE_128));

        QRCode::text("Name: ".$getStudent->full_name." ID: ".$getStudent->student_id)->setOutfile(storage_path('app/public/student_id_image/qrcode/qrcode.png'))->png();        // QrCode::size(500)
        //             ->format('png')
        //             ->generate('ItSolutionStuff.com', storage_path('app/public/student_id_image/qrcode/qrcode.png'),100,100);

        $img = Image::make(storage_path('app/public/student_id_image/idcard.jpg'))->resize(1016,638);
             $img->text('Name : ',320,270, function($font){
                 $font->file(storage_path('app/public/font/CARDC___.TTF'));
                 $font->size(30);
                 $font->color('#000000');
                 $font->align('center');
                 $font->valign('center');
             });
             $img->text($getStudent->full_name,650,270, function($font){
                 $font->file(storage_path('app/public/font/CARDC___.TTF'));
                 $font->size(30);
                 $font->color('#000000');
                 $font->align('center');
                 $font->valign('center');
             });


             $img->text('Gender :',320,330, function($font){
                 $font->file(storage_path('app/public/font/CARDC___.TTF'));
                 $font->size(30);
                 $font->color('#000000');
                 $font->align('center');
                 $font->valign('center');
             });
             $img->text($getStudent->gender,480,330, function($font){
                 $font->file(storage_path('app/public/font/CARDC___.TTF'));
                 $font->size(30);
                 $font->color('#000000');
                 $font->align('center');
                 $font->valign('center');
             });

             $img->text('ID Number :',350,390, function($font){
                 $font->file(storage_path('app/public/font/CARDC___.TTF'));
                 $font->size(30);
                 $font->color('#000000');
                 $font->align('center');
                 $font->valign('center');
             });
             $img->text('KA/'.$getStudent->student_id,580,390, function($font){
                 $font->file(storage_path('app/public/font/CARDC___.TTF'));
                 $font->size(30);
                 $font->color('#000000');
                 $font->align('center');
                 $font->valign('center');
             });
             $img->text('Grade :',310,450, function($font){
                 $font->file(storage_path('app/public/font/CARDC___.TTF'));
                 $font->size(30);
                 $font->color('#000000');
                 $font->align('center');
                 $font->valign('center');
             });
             $img->text($getStudent->class_label." ".$getStudent->section_name,480,450, function($font){
                 $font->file(storage_path('app/public/font/CARDC___.TTF'));
                 $font->size(30);
                 $font->color('#000000');
                 $font->align('center');
                 $font->valign('center');
             });
             if (file_exists(storage_path('app/public/student_image/'.$getStudent->first_name."_".$getStudent->middle_name."_".$getStudent->last_name.$getStudent->student_id.'.png'))) {
                $img->insert(Image::make(storage_path('app/public/student_image/'.$getStudent->first_name."_".$getStudent->middle_name."_".$getStudent->last_name.$getStudent->student_id.'.png'))->resize(200,220)->resizeCanvas(50, 500, 'center', true));
            }elseif(file_exists(storage_path('app/public/student_image/'.$getStudent->first_name."_".$getStudent->middle_name."_".$getStudent->last_name.$getStudent->student_id.'.jpg'))){
                $img->insert(Image::make(storage_path('app/public/student_image/'.$getStudent->first_name."_".$getStudent->middle_name."_".$getStudent->last_name.$getStudent->student_id.'.jpg'))->resize(200,220)->resizeCanvas(50, 500, 'center', true));
            }else{
                $img->insert(Image::make(storage_path('app/public/student_id_image/student_image/idholder.png'))->resize(200,220)->resizeCanvas(50, 500, 'center', true));
            }
             $img->insert(Image::make(storage_path('app/public/student_id_image/barcode/barcode.jpg'))->resize(950,70)->resizeCanvas(45, 500, 'bottom', true));
             $img->insert(Image::make(storage_path('app/public/student_id_image/qrcode/qrcode.png'))->resize(150,150)->resizeCanvas(1610, 300, 'bottom', true));

             $img->save(storage_path('app/public/student_id_image/temp/temp.png'));
             $img2 = Image::make(storage_path('app/public/student_id_image/temp/temp.png'));
             $img2->save(storage_path('app/public/student_id_image/image/'.$getStudent->first_name."_".$getStudent->middle_name."_".$getStudent->last_name."_".$getStudent->student_id.'.png'));

            return response()->json($getStudent->first_name."_".$getStudent->middle_name."_".$getStudent->last_name."_".$getStudent->student_id.'.png');
     }

     public function downloadSingleId($id)
     {
        $path = Storage::path('public/student_id_image/image/'.$id);
        return response()->download($path, $id);
     }
}
