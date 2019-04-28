<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Item;
use App\Type;

class ReportRoomController extends Controller
{
    public function index(){
    	return view('pages.reportroom.index',[
    		'rooms'=>Room::all(),
    	]);
    }

    public function itemRoom(Request $request){
        return view('pages.reportroom.room',[
            'items'=>Item::where('room_id', $request->room_id)->get(),
        ]);
    }
}
