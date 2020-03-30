<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Customer;
use App\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        \View::share('menu', 'reservations');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('view-reservations');
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create', Reservation::class);
        $customers = Customer::all();
        $rooms = Room::all();
        return view('reservations.create', compact('customers', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->authorize('create', Reservation::class);

        $this->validate($request, [
            'room' => 'required|exists:rooms,id',
            'customer' => 'required|exists:customers,id',
            'date' => 'required',
            'duration' => 'required|integer',
        ]);


        $reservation = new Reservation;
        $reservation->arrival_date = $request->date;
        $reservation->notes = $request->notes;
        $reservation->duration = $request->duration;

        $room = Room::find($request->room);
        $reservation->room()->associate($room);

        $customer = Customer::find($request->customer);
        $reservation->customer()->associate($customer);

        $reservation->save();
        return redirect('/reservations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
        $this->authorize('view', $reservation);
        return "<h2>Under Maintainance</h2>";
        
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
        $this->authorize('update', $reservation);
        $customers = Customer::all();
        $rooms = Room::all();
        return view('reservations.edit', compact('reservation', 'customers', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
         $this->authorize('update', $reservation);

         $this->validate($request, [
            'room' => 'required|exists:rooms,id',
            'customer' => 'required|exists:customers,id',
            'date' => 'required',
            'duration' => 'required|integer',
        ]);


        $reservation->arrival_date = $request->date;
        $reservation->notes = $request->notes;
        $reservation->duration = $request->duration;

        $room = Room::find($request->room);
        $reservation->room()->associate($room);

        $customer = Customer::find($request->customer);
        $reservation->customer()->associate($customer);

        $reservation->save();
        \Session::flash('flash_message', 'Successfully updated reservation!');
        return redirect("/reservations/".$reservation->id."/edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
        $this->authorize('delete', $reservation);
        $reservation->delete();
        \Session::flash('flash_message', 'Successfully deleted reservation!');
        return redirect('/reservations');
    }
}
