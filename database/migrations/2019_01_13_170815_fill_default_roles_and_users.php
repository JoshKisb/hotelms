<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Role;
use App\User;

class FillDefaultRolesAndUsers extends Migration
{

    protected $roles;
    protected $users; 

    public function __construct()
    {
        $permissions = [];
        foreach(Role::$permissions as $permission)
            $permissions[$permission] = true;

        $this->roles = [
            [
                'name' => 'Administrator',
                'slug' => 'admin',
                'description' => 'Admin has full access and rights on the system',
                'permissions' => $permissions
            ]
        ];

        $this->users = [
            [
                'firstname' => 'Joshua',
                'lastname' => 'Kisb',
                'email' => 'joshuakisb@gmail.com',
                'password' => 'pass@hotelms',
                'role' => 'Administrator'
            ]
        ];
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
           
           foreach ($this->roles as $role) {
                Role::create($role);
            }

            foreach ($this->users as $user) {
                $role = Role::where('name', $user['role'])->first();
                
                $newUser = new User();
                $newUser->fill($user);
                $newUser->role()->associate($role);
                $newUser->save();
            }

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::transaction(function () {
            foreach ($this->users as $user) {
                User::where('email', $user['email'])->forceDelete();
            }

            foreach ($this->roles as $role) {
                Role::where('name', $role['name'])->delete();
            }

        });
    }
}
