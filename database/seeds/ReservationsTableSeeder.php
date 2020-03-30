<?php

use Illuminate\Database\Seeder;
use App\Room;
use App\Customer;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $count = intval((Room::count() * 1) / 3);
        $rooms = Room::take($count)->where('status', 'free')->get();
        $customers = Customer::take($count)->get();

        $rcount = min($rooms->count(), $customers->count());

        $guests = factory('App\Reservation', $rcount)->make();
        foreach ($guests as $key => $guest) {
	    	$guest->room()->associate($rooms->get($key));
	    	$guest->customer()->associate($customers->get($key));
	    	$guest->save();
        }
    }
}
