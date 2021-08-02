<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeRoomController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    function openView(){
        return view('admin.teacher.home_room');
    }
}
