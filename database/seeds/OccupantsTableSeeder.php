<?php

use Illuminate\Database\Seeder;
use App\Room;
use App\Customer;
use App\Occupant;

class OccupantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = intval(Room::count() / 3);
        $rooms = Room::take($count)->get();
        $customers = Customer::take($count)->get();

        $rcount = min($rooms->count(), $customers->count());

        $guests = factory('App\Occupant', $rcount)->make();
        foreach ($guests as $key => $guest) {
	    	$guest->room()->associate($rooms->get($key));
	    	$guest->customer()->associate($customers->get($key));
	    	$guest->save();

            $guest->room->status = 'occupied';
            $guest->room->save();
        }

        
    }
}
