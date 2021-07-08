<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeRoomController extends Controller
{
    //
     function openView(){
        return view('admin.teacher.home_room');
    }
}
