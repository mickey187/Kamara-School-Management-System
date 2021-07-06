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

    public function editStream($id){

        $stream = stream::find($id);
        //return $stream->stream_type;
        return view('admin.curriculum.add_stream')->with('stream', $stream);
    }

    public function editStreamValue(Request $req, $id){

        $stream_edit = stream::find($id);
        $stream_edit->stream_type = $req->streamname;
        if ($stream_edit->update()) {
            $streams = stream::all();
            return redirect()->route('/viewStream')->with('streams',$streams);
        }

    }

    function viewStream(){
        $streams = stream::select('id','stream_type')->get();        
        return view('admin/curriculum/view_stream')->with('streams',$streams);
    }

    public function deleteStream(Request $req){
        $id = $req->delete_stream_btn;
        $stream = stream::find($id);
        if ($stream->delete()) {
            $streams = stream::all();
            return redirect()->route('/viewStream')->with('streams',$streams);
        }
    }
}
