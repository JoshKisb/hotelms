<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

  //       $kisb = new App\User();
		// $kisb->fill(['firstname' => 'Joshua','lastname' => 'Kisb','email' => 'joshuakisb@gmail.com','password' => 'pass@hotelms']);

		// $admin = App\Role::where('name','Administrator')->first();
		// $kisb->role()->associate($admin);

		// $kisb->save();

        $roles = App\Role::all();
        foreach ($roles as $role) {
            $users = factory(App\User::class, 5)
                ->make()
                ->each(function ($u) use ($role) {
                    $u->role()->associate($role);
                    $u->save();
                });
        }
		
    }
}
