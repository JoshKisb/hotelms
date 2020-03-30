<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [];
        foreach(Role::$permissions as $permission)
            $permissions[$permission] = true;

        $administrator = Role::create([
        	'name' => 'Administrator',
            'slug' => 'admin',
        	'description' => 'Admin has full access and rights on the system',
            'permissions' => $permissions
        ]);
    }
}
