<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Storage;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        \View::share('menu', 'users');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create', User::class);
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);


        $this->validate($request, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:255',
            'role' => 'required|exists:roles,id',
        ]);
        $user = new User;
        $user->fill($request->all());
        
        $role = Role::find($request->role);
        $user->role()->associate($role);

        $user->save();



        if ($request->hasFile('avatar')) {
            $path = Storage::disk('assets')->putFileAs(
                'images', $request->file('avatar'), $user->id.$request->file('avatar')->extension()
            );

            $user->avatar = $path;
            $user->save();
        }
         

        return redirect('/users');
    }

    public function changePic(Request $request, User $user)
    {
        if ($request->hasFile('avatar')) {

            if (isset($user->avatar)) {
                Storage::disk('assets')->delete($user->avatar);
            }

            $path = $request->file('avatar')->store(
                'images', 'assets'
            );

            $user->avatar = $path;
            $user->save();
        }

        if ($request->ajax()) {
            $user->avatarLink = $user->avatarUrl();
            return json_encode($user);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $roles = Role::all();
        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $this->validate($request, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'sometimes|required|max:255',
            'role' => 'required|exists:roles,id',
        ]);

        $user->fill($request->all());
        
        if (isset($request->role))
        {
            $role = Role::find($request->role);
            $user->role()->associate($role);
        }
        
        $user->save();

        \Session::flash('flash_message', 'Successfully updated user!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        \Session::flash('flash_message', 'Successfully deleted user!');
        return redirect('/users');
    }
}
