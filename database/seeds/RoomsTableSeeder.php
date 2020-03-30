<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\RoomType::class, 2)
	        ->create()
	        ->each(function ($rt) {
	            $rt->rooms()->saveMany(factory(App\Room::class, mt_rand(2, 10))->make());
	        });
    }
}
