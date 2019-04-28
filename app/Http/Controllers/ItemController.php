<?php

namespace App\Http\Controllers;

use Auth;
use App\Item;
use App\Room;
use App\Type;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.item.index',[
            'data'=>Item::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.item.create',[
            'rooms'=>Room::all(),
            'types'=>Type::all(),
        ]);
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
            'name'=>'required',
            'total'=>'required|numeric|min:1',
            'room_id'=>'required',
            'type_id'=>'required',
            'description'=>'required',
        ]);

        $item = new Item($request->all());
        $item->registration_date = Carbon::now();
        $item->user_id = Auth::user()->id;
        $item->save();
        return back()->with('message','Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('pages.item.edit',[
            'data'=>$item,
            'rooms'=>Room::all(),
            'types'=>Type::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $this->validate($request,[
            'name'=>'required',
            'room_id'=>'required',
            'type_id'=>'required',
            'description'=>'required',
        ]);

        $item->update($request->all());
        return redirect()->route('item.index')->with('message','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return back()->with('message','Deleted');
    }
}
