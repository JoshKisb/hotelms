<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        \View::share('menu', 'rooms');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view-rooms');
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Room::class);
        $roomTypes = RoomType::all();
        return view('rooms.create', compact('roomTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Room::class);

        $this->validate($request, [
            'name' => 'required|max:255|unique:rooms',
            'room_type' => 'required|exists:room_types,id',
        ]);

        $room = new Room;
        $room->name = $request->name;
        $room->notes = $request->notes;
        $room->status = $request->status;

        $roomType = RoomType::find($request->room_type);
        $room->room_type()->associate($roomType);

        $room->save();
        return redirect('/rooms');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $this->authorize('view', $room);
        
        return view('rooms.view', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $this->authorize('update', $room);
        $roomTypes = RoomType::all();
        return view('rooms.edit', compact('room', 'roomTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
         $this->authorize('update', $room);

        $this->validate($request, [
            'name' => 'required|max:255|unique:rooms,name,'.$room->id,
            'room_type' => 'required|exists:room_types,id',
        ]);
        
        $room->name = $request->name;
        $room->notes = $request->notes;
        $room->status = $request->status;

        $roomType = RoomType::find($request->room_type);
        $room->room_type()->associate($roomType);

        $room->save();
        \Session::flash('flash_message', 'Successfully updated room!');
        return redirect("/rooms/".$room->id."/edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $this->authorize('delete', $room);
        $room->delete();
        \Session::flash('flash_message', 'Successfully deleted room!');
        return redirect('/rooms');
    }
}
