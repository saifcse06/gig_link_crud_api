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

Route::get('/', function () {
    return view('welcome');
});
Route::get('user-registration', 'UserAuthController@index')->name('user-registration');

Route::post('user-store', 'UserAuthController@userPostRegistration');

Route::get('user-login', 'UserAuthController@userLoginIndex')->name('user-login');

Route::post('login', 'UserAuthController@userPostLogin');

Route::get('dashboard', 'UserAuthController@dashboard')->name('dashboard');

Route::get('logout', 'UserAuthController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});
