<?php

namespace App\Http\Controllers;

use App\Models\classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use LaravelQRCode\Facades\QRCode;
use Intervention\Image\Facades\Image;

use Picqer;
use ZipArchive;

class ExportController extends Controller
{

    public function checkIfIdGeneratedForClass($class_id,$stream_id,$section_name){
        return response()->json(false);
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


    public function generateOneClassIdCard($class_id,$stream_id,$section_name){
        $getStudent = DB::table('sections')
        ->join('students','sections.student_id','=','students.id')
        ->join('classes','sections.class_id','=','classes.id')
        ->join('streams','sections.stream_id','=','streams.id')
        ->where('classes.id',$class_id)
        ->where('streams.id',$stream_id)
        ->where('section_name',$section_name)
        ->get(['students.student_id','stream_type','gender','students.created_at','section_name','class_label','first_name','middle_name','last_name',DB::raw('CONCAT(first_name," ",middle_name," ",last_name) AS full_name')]);
        // return $getStudent;
        File::makeDirectory(storage_path('app/public/student_id_image/grade/'.classes::where('id',$class_id)->get()->first()->class_label.$section_name));
        foreach($getStudent as $row){
            $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
            file_put_contents(storage_path('app/public/student_id_image/barcode/barcode.jpg'), $generator->getBarcode("Name: ".$row->full_name." ID: ".$row->student_id, $generator::TYPE_CODE_128));

            QRCode::text("Name: ".$row->full_name." ID: ".$row->student_id)->setOutfile(storage_path('app/public/student_id_image/qrcode/qrcode.png'))->png();        // QrCode::size(500)
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
                 $img->text($row->full_name,650,270, function($font){
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
                 $img->text($row->gender,480,330, function($font){
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
                 $img->text('KA/'.$row->student_id,580,390, function($font){
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
                 $img->text($row->class_label." ".$row->section_name,480,450, function($font){
                     $font->file(storage_path('app/public/font/CARDC___.TTF'));
                     $font->size(30);
                     $font->color('#000000');
                     $font->align('center');
                     $font->valign('center');
                 });

                 if (file_exists(storage_path('app/public/student_image/'.$row->first_name."_".$row->middle_name."_".$row->last_name.$row->student_id.'.png'))) {
                    $img->insert(Image::make(storage_path('app/public/student_image/'.$row->first_name."_".$row->middle_name."_".$row->last_name.$row->student_id.'.png'))->resize(200,220)->resizeCanvas(50, 500, 'center', true));
                }elseif(file_exists(storage_path('app/public/student_image/'.$row->first_name."_".$row->middle_name."_".$row->last_name.$row->student_id.'.jpg'))){
                    $img->insert(Image::make(storage_path('app/public/student_image/'.$row->first_name."_".$row->middle_name."_".$row->last_name.$row->student_id.'.jpg'))->resize(200,220)->resizeCanvas(50, 500, 'center', true));
                }else{
                    $img->insert(Image::make(storage_path('app/public/student_id_image/student_image/idholder.png'))->resize(200,220)->resizeCanvas(50, 500, 'center', true));
                }
                 $img->insert(Image::make(storage_path('app/public/student_id_image/barcode/barcode.jpg'))->resize(950,70)->resizeCanvas(45, 500, 'bottom', true));
                 $img->insert(Image::make(storage_path('app/public/student_id_image/qrcode/qrcode.png'))->resize(150,150)->resizeCanvas(1610, 300, 'bottom', true));

                 $img->save(storage_path('app/public/student_id_image/temp/temp.png'));
                 $img2 = Image::make(storage_path('app/public/student_id_image/temp/temp.png'));
                 $img2->save(storage_path('app/public/student_id_image/grade/'.$row->first_name."_".$row->middle_name."_".$row->last_name."_".$row->student_id.'.png'));

        }
        return "Id Card Generated!";
    }





    public function downloadZip()
    {
        $zip = new ZipArchive;

        $fileName = 'myNewFile.zip';

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path('myFiles'));

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }

        return response()->download(public_path($fileName));
    }
}


