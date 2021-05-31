<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stream;

class StreamController extends Controller
{
    //
    function openView(){
        
        return view('add_stream');
    }

    function addStream(Request $req){
        $stream = new stream;
        $streams = stream::all();
        $stream->stream_type = $req->streamname;
        $stream->save();
        return view('view_stream')->with('streams',$streams);
        
    }

    function viewStream(){
        $streams = stream::all();
        return view('view_stream')->with('streams',$streams);
    }
}
