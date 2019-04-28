<?php

namespace App\Http\Controllers;

use App\Borrow;
use Illuminate\Http\Request;
use Auth;
use App\Employee;
use Carbon\Carbon;
use App\Item;
use App\User;
use Log;

class BorrowController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('employee')->check()) {
            $data = Borrow::where('employee_id',Auth::guard('employee')->user()->id)->latest()->get();
        }else{
            $data = Borrow::latest()->get();
        }
        return view('pages.borrow.index',[
            'data'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.borrow.create',['employees'=>Employee::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carbon = Carbon::now();
        if(Auth::guard('web')->check())
        {
            $borrow = new Borrow($request->all());
            $borrow->user_id     = Auth::user()->id;
            $borrow->approve     = 1;
            $borrow->status      = "uncomplete";
            $borrow->return_date =  $carbon->addDays($request->count_day);
            $borrow->save(); 
        }else{
            $borrow = new Borrow($request->all());
            $borrow->approve     = 0;
            $borrow->status      = "uncomplete";
            $borrow->return_date =  $carbon->addDays($request->count_day);
            $borrow->save();
        }

        return redirect()->route('borrow.show',$borrow);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        return view('pages.borrow.next',[
            'borrow'=>$borrow,
            'items'=>Item::where('total','>',0)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrow $borrow)
    {
        if(Auth::guard('web')->check())
        {
            $borrow->update(['status'=>'borrowed']);
            return redirect()->route('borrow.index')->with('message','Success');
        }else{
            $borrow->update(['status'=>'book']);
            return redirect()->route('borrow.index')->with('message','Success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Borrow $borrow)
    {
        if($request->approve == 1)
        {
            $borrow->update([
                'status'=>'borrowed',
                'approve'=>1,
                'user_id'=>Auth::user()->id
            ]);

        }else{
            foreach($borrow->detail_borrow as $field)
            {
                $item = Item::find($field->item_id);
                $item->update([
                    'total'=>$item->total + $field->total,
                ]);
            }

            $borrow->detail_borrow()->delete();
            $borrow->delete();
        }

        return back()->with('message','Success');
    }

    public function detail(Borrow $borrow)
    {
        return view('pages.borrow.detail',[
            'data'=>$borrow,
        ]);
    }
}
