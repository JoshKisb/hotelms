<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Settings;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    	$app_name_setting = Settings::where('key', 'app_name')->first();
    	$app_name = isset($app_name_setting) ? $app_name_setting->value : null;

    	if (is_null($app_name)) $app_name = "Hotel MS";
    	view()->share('app_name', $app_name);
    	view()->share('menu', '');
    }
}
