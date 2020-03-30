<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        \View::share('menu', 'settings');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $settings = (object) Settings::all()->pluck('value','key')->all();
        return view('settings.general', compact('settings'));
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $this->validate($request, [
            'company_email' => 'email|nullable',
        ]);

        foreach($request->except('_token') as $key => $value)
        {
            $setting = Settings::firstOrNew(['key' => $key]);
            $setting->value = $value;
            $setting->save();
        }
        
        \Session::flash('flash_message', 'Settings have been saved!');
        return redirect('/settings/general');
    }
    
}
