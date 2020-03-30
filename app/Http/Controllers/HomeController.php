<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Occupant;
use App\Reservation;
use App\Room;
use App\Customer;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
        \View::share('menu', 'dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $occupants          = Occupant::where('status', 'checked_in')->get();
        $reservations       = Reservation::where('status', 'pending')->get();
        $count_occupants    = $occupants->count();
        $count_reservations = $reservations->count();
        $count_checking_out = Occupant::whereDate('checkout_date', Carbon::today())->count();
        $count_checking_in  = Reservation::whereDate('arrival_date', Carbon::today())->count();
        $count_free_rooms   = Room::where('status', 'free')->count();
        $count_customers    = Customer::count();

        return view('dashboard', compact(
            'count_occupants', 
            'count_reservations',
            'count_checking_in',
            'count_checking_out',
            'count_free_rooms',
            'count_customers',
            'occupants',
            'reservations'
        ));
    }
}
