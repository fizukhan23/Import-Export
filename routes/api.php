<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::match(['get','post'],'/{uri?}',function($uri){
        return app()->call('App\Http\Controllers\ApiController@'.$uri);
});

Route::match(['post', 'delete'], '/{uri}/{id?}', function ($uri, $id = null) {
    return app()->call('App\Http\Controllers\ApiController@' . $uri, ['id' => $id]);
});

