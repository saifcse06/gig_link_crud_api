<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
    Route::apiResource('blog','BlogsSingleActionController');
    Route::apiResource('blogs','BlogsBatchActionController');
});

Route::post('login', function (Request $request) {

    if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
        // Authentication passed...
        $user = auth()->user();
        $user->api_token = Str::random(80);
        $user->save();
        return $user;
    }

    return response()->json([
        'error' => 'Unauthenticated user',
        'code' => 401,
    ], 401);
});

Route::middleware('auth:api')->post('logout', function (Request $request) {

    if (auth()->user()) {
        $user = auth()->user();
        $user->api_token = null; // clear api token
        $user->save();

        return response()->json([
            'message' => 'Thank you for using our application',
        ]);
    }

    return response()->json([
        'error' => 'Unable to logout user',
        'code' => 401,
    ], 401);
});
