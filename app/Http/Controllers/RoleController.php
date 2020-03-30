<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        \View::share('menu', 'roles');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view-roles');
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create', Role::class);
        $permissions = Role::$permissions;
        return view('roles.create', compact('permissions'));
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
        
        $this->authorize('create', Role::class);

        $this->validate($request, [
            'name' => 'required|max:255|unique:roles',
        ]);

        $role = new Role;
        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->description = $request->description;

        if (isset($request->permissions)){
            foreach ($request->permissions as $permission) {
                $role->addPermission($permission);
            }
        }
        $role->save();
        return redirect('/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        $this->authorize('view', $role);
        
        return view('roles.view', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        $this->authorize('update', $role);
        $permissions = Role::$permissions;
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
         $this->authorize('update', $role);

        $this->validate($request, [
            'name' => 'required|max:255|unique:roles,name,'.$role->id,
        ]);
        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->description = $request->description;
        $role->permissions = array();
        foreach ($request->permissions as $permission) {
            $role->addPermission($permission);
        }
        $role->save();
        \Session::flash('flash_message', 'Successfully updated role!');
        return redirect("/roles/".$role->id."/edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $this->authorize('delete', $role);
        $role->delete();
        \Session::flash('flash_message', 'Successfully deleted role!');
        return redirect('/roles');
    }
}
