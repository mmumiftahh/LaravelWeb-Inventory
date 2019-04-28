<?php

namespace App\Http\Controllers;

use App\BorrowDetail;
use Illuminate\Http\Request;
use App\Item;
use App\Borrow;
use App\Maintenance;
use App\User;
class BorrowDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'item_id'=>'required',
            'borrow_id'=>'required',
            'total',
        ]);
        
        $check = BorrowDetail::where(['item_id'=>$request->item_id,'borrow_id'=>$request->borrow_id]);
        if($check->count() > 0)
        {
            $item = Item::find($request->item_id);
            if($item->total < $request->total)
            {
                return back()->with('message','Offer');
            }else{
                $check->update(['total'=>$check->first()->total + $request->total]);    
            }
        }else{
            $item = Item::find($request->item_id);
            if($item->total < $request->total)
            {
                return back()->with('message','Offer');
            }else{
                BorrowDetail::create($request->all());
            } 
        }

        $item = Item::find($request->item_id);
        if($item->total < $request->total)
        {
            return back()->with('message','Offer');
        }else{
            $item->update([
            'total'=>$item->total - $request->total,
            ]);
            return back()->with('message','Added');    
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function show($borrow)
    {
        return view('pages.borrow.return',[
            'data'=>Borrow::find($borrow),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(BorrowDetail $borrowDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $borrow)
    {
        $old_borrow = Borrow::find($borrow);

        for($i = 0;$i< count($request->item_id);$i++)
        {
            $item = Item::find($request->item_id[$i]);
            if($request->total[$i] < $request->total_broken[$i])
            {
                return back()->with('message','Offer');
            }
            
            $after_total = $request->total[$i] - $request->total_broken[$i];
            $item->update([
                'total'=>$item->total + $after_total,
            ]);

            if($request->total_broken[$i] > 0)
            {
                Maintenance::create([
                    'item_id'=>$request->item_id[$i],
                    'total'=>$request->total_broken[$i],
                    'borrow_id'=>$old_borrow->id,
                    'broken_date'=>date("Y-m-d"),
                ]);

            }
        }

        $old_borrow->update(['status'=>'returned']);

        return redirect()->route('borrow.index')->with('message','Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BorrowDetail  $BorrowDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($borrowDetail)
    {

        $data = BorrowDetail::find($borrowDetail);
        $data->item;

        $item = $data->item;
        $total = $data->total;
        $item->update([
            'total'=>$item->total + $total,
        ]);

        $data->delete();

        return back()->with('message','Deleted');
    }
}
