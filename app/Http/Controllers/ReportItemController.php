<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Type;
use App\Room;

class ReportItemController extends Controller
{
    public function index(){
        return view('pages.reportitem.index',[
            'types'=>Type::all(),
        ]);
    }

    public function itemreport(Request $request){
        return view('pages.reportitem.item',[
            'items'=>Item::where('type_id', $request->type_id)->get(),
            'total'=>Item::where('type_id', $request->type_id)->sum('total'),
        ]);
    }
}
