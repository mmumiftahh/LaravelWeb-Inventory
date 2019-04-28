<?php

namespace App\Http\Controllers;

use App\Supply;
use Illuminate\Http\Request;
use App\Item;
use Auth;
use Carbon\Carbon;
class SupplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function item(Item $item)
    {
        return view('pages.item.supply',[
            'data'=>$item,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'item_id'=>'required',
            'total'=>'required|numeric|min:1',
        ]);

        $supply = new Supply($request->all());
        $supply->user_id = Auth::user()->id;
        $supply->supply_date = Carbon::now();
        $supply->save();

        $item = Item::find($supply->item_id);
        $item->update([
            'registration_date'=> Carbon::now(),
            'total'            => $item->total + $request->total,
        ]);

        return redirect()->route('item.index')->with('message','Supplied');
    }
}
