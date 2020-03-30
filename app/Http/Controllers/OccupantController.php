<?php

namespace App\Http\Controllers;

use App\Occupant;
use App\Customer;
use App\Room;
use App\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OccupantController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        \View::share('menu', 'occupants');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('view-occupants');
        $occupants = Occupant::all();
        return view('occupants.index', compact('occupants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create', Occupant::class);
        $customers = Customer::all();
        $rooms = Room::where('status', 'free')->get();
        return view('occupants.create', compact('customers', 'rooms'));
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
        $this->authorize('create', Occupant::class);

        $this->validate($request, [
            'room' => 'required|exists:rooms,id',
            'customer' => 'required|exists:customers,id',
            'date' => 'required',
            'duration' => 'required|integer',
        ]);

        // dd($request->all());
        $occupant = new Occupant;
        $occupant->arrival_date = $request->date;
        $occupant->notes = $request->notes;
        $occupant->duration = $request->duration;
        $occupant->checkout_date = Carbon::parse($occupant->arrival_date)->addDays($request->duration)->format('Y-m-d');

        $occupant->amount_paid = $request->amount;
        $occupant->status = "checked_in";


        $room = Room::find($request->room);
        $occupant->room()->associate($room);
        $room->status = "occupied";
        $room->save();

        $customer = Customer::find($request->customer);
        $occupant->customer()->associate($customer);

        $payment = new Payment;
        $expected_amount = $occupant->room->room_type->amount;

        if ($occupant->amount_paid >= $expected_amount)
            $occupant->payment_status = "paid";
        else if ($occupant->amount_paid > 0) {
            $occupant->payment_status = "half_paid";
            $payment->balance = $expected_amount - $occupant->amount_paid;
        }
        
        $occupant->save();

        $payment->occupant()->associate($occupant);
        $payment->amount = $request->amount;
        $payment->save();

        return redirect('/occupants');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Occupant  $occupant
     * @return \Illuminate\Http\Response
     */
    public function show(Occupant $occupant)
    {
        //
        $this->authorize('view', $occupant);
        
        return view('occupants.view', compact('occupant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Occupant  $occupant
     * @return \Illuminate\Http\Response
     */
    public function edit(Occupant $occupant)
    {
        //
        $this->authorize('update', $occupant);
        $customers = Customer::all();
        $rooms = Room::where('id', $occupant->room->id)->orWhere('status', 'free')->get();
        return view('occupants.edit', compact('occupant', 'customers', 'rooms'));
    }

    public function checkout(Occupant $occupant)
    {
        $this->authorize('checkout', $occupant);
        $occupant->status = 'left';
        $occupant->save();
        $occupant->room->status = "free";
        $occupant->room->save();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Occupant  $occupant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Occupant $occupant)
    {
        //
        $this->authorize('update', $occupant);

        $this->validate($request, [
            'room' => 'required|exists:rooms,id',
            'customer' => 'required|exists:customers,id',
            'date' => 'required',
            'duration' => 'required|integer',
        ]);



        $occupant->arrival_date = $request->date;
        $occupant->notes = $request->notes;
        $occupant->duration = $request->duration;
        $occupant->checkout_date = Carbon::parse($occupant->arrival_date)->addDays($request->duration)->format('Y-m-d');
        $occupant->status = "checked_in";

        if ($request->amount) {
            $occupant->amount_paid += $request->amount;
            $expected_amount = $occupant->room->room_type->amount;
            
            $payment = new Payment;

            if ($occupant->amount_paid >= $expected_amount)
                $occupant->payment_status = "paid";
            else if ($occupant->amount_paid > 0) {
                $occupant->payment_status = "half_paid";
                $payment->balance = $expected_amount - $occupant->amount_paid;
            }
            $payment->occupant()->associate($occupant);
            $payment->amount = $request->amount;
            $payment->save();
        }

        $room = Room::find($request->room);
        if ($room->id != $occupant->room->id) {
            $occupant->room->status = 'free';
            $occupant->room->save();
            $occupant->room()->associate($room);
            $room->status = "occupied";
            $room->save();
        }

        $customer = Customer::find($request->customer);
        $occupant->customer()->associate($customer);
        $occupant->save();

        \Session::flash('flash_message', 'Successfully updated occupant!');
        return redirect("/occupants/".$occupant->id."/edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Occupant  $occupant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Occupant $occupant)
    {
        //
        $this->authorize('delete', $occupant);
        $occupant->delete();
        \Session::flash('flash_message', 'Successfully deleted occupant!');
        return redirect('/occupants');
    }
}
