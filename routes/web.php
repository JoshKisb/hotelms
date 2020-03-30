<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


Route::group(['middleware' => ['auth']], function(){

    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/users', 'UserController');
    Route::resource('/roles', 'RoleController');
    Route::resource('/rooms', 'RoomController');
    Route::resource('/room_types', 'RoomTypeController');
    Route::resource('/customers', 'CustomerController');
    Route::resource('/reservations', 'ReservationController');
    Route::resource('/occupants', 'OccupantController');
    Route::get('/invoices', 'PaymentController@index')->name('invoices.index');

    Route::post('/checkout/{occupant}', 'OccupantController@checkout')->name('occupants.checkout');

    Route::get('/settings/general', 'SettingsController@index')->name('settings.general');
    Route::post('/settings/general', 'SettingsController@update')->name('settings.update');

    Route::post('/users/avatar/{user}', 'UserController@changePic')->name('users.avatar');


});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    // Dashboard
    // Route::get('/', 'DashboardController@index')->name('dashboard');

    //Users
    // Route::get('users', 'UserController@index')->name('users');
    // Route::get('users/{user}', 'UserController@show')->name('users.show');
    // Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    // Route::put('users/{user}', 'UserController@update')->name('users.update');
    // Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
    // Route::get('permissions', 'PermissionController@index')->name('permissions');
    // Route::get('permissions/{user}/repeat', 'PermissionController@repeat')->name('permissions.repeat');
    // Route::get('dashboard/log-chart', 'DashboardController@getLogChartData')->name('dashboard.log.chart');
    // Route::get('dashboard/registration-chart', 'DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');
});
