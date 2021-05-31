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
        $stream->stream_type = $req->streamname;
        $stream->save();
        return view('add_stream');
        
    }
}
