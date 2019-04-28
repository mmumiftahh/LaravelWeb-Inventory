<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrow;
use App\Maintenance;

class ReportBorrowController extends Controller
{
    public function index()
    {
        return view('pages.reportborrow.index');
    }

    public function borrow($param)
    {
        if($param == "all")
        {
            return view('pages.reportborrow.borrow',[
                'data'=>Borrow::latest()->get(),
                'type'=>$param,
            ]);
        }elseif($param == "today")
        {
            return view('pages.reportborrow.borrow',[
                'data'=>Borrow::whereRaw('DATE(created_at) = CURDATE()')->latest()->get(),
                'type'=>$param,
            ]);
        }elseif($param == "broken")
        {
            return view('pages.reportborrow.borrow',[
                'data'=>Maintenance::latest()->get(),
                'type'=>$param,
            ]);
        }elseif($param == "latest")
        {
            return view('pages.reportborrow.borrow',[
                'data'=>Borrow::orderBy('borrow_date','DESC')->get(),
                'type'=>$param,
            ]);
        }
    }
}
