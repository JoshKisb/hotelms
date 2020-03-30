<?php

namespace App\Http\Controllers;

use App\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        \View::share('menu', 'room_types');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view-roomtypes');
        $room_types = RoomType::all();
        return view('room_types.index', compact('room_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', RoomType::class);
        return view('room_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->authorize('create', RoomType::class);

        $this->validate($request, [
            'name' => 'required|max:255|unique:room_types',
            'price' => 'required|integer'
        ]);

        $roomType = new RoomType;
        $roomType->name = $request->name;
        $roomType->slug = str_slug($request->name);
        $roomType->description = $request->description;
        $roomType->price = $request->price;
        $roomType->room_count = $request->room_count;

        $roomType->save();
        return redirect('/room_types');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
    {
        $this->authorize('view', $roomType);
        
        return view('room_types.view', compact('roomType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomType $roomType)
    {
        $this->authorize('update', $roomType);
        return view('room_types.edit', compact('roomType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomType $roomType)
    {
         $this->authorize('update', $roomType);

        $this->validate($request, [
            'name' => 'required|max:255|unique:room_types,name,'.$roomType->id,
            'price' => 'required|integer'
        ]);
        $roomType->name = $request->name;
        $roomType->slug = str_slug($request->name);
        $roomType->description = $request->description;
        $roomType->price = $request->price;
        $roomType->room_count = $request->room_count;
       
        $roomType->save();
        \Session::flash('flash_message', 'Successfully updated room type!');
        return redirect("/room_types/".$roomType->id."/edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomType $roomType)
    {
        $this->authorize('delete', $roomType);
        $roomType->delete();
        \Session::flash('flash_message', 'Successfully deleted room type!');
        return redirect('/room_types');
    }
}
