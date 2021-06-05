<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stream;

class StreamController extends Controller
{
    //
    function index(){
        
        return view('admin/curriculum/add_stream');
    }

    function addStream(Request $req){
        $stream = new stream;
        $streams = stream::all();
        $stream->stream_type = $req->streamname;

        if( $stream->save()){
            
            return redirect()->route('/viewStream')->with('streams',$streams);
        }
       
        
      
        
    }

    function viewStream(){
        $streams = stream::select('id','stream_type')->get();        
        return view('admin/curriculum/view_stream')->with('streams',$streams);
    }
}
