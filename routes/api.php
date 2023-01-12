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

Route::post('/login', \App\Http\Controllers\API\User\AuthController::class);

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::group(['prefix' => 'earnings'], function () {
        Route::get('/', \App\Http\Controllers\API\Earnings\IndexController::class)->name('api.earnings.index');
        Route::get('/create', \App\Http\Controllers\API\Earnings\CreateController::class)->name('api.earnings.create');
        Route::post('/', \App\Http\Controllers\API\Earnings\StoreController::class)->name('api.earnings.store');
        Route::get('/{earning}', \App\Http\Controllers\API\Earnings\ShowController::class)->name('api.earnings.show');
        Route::get('/{earning}/edit', \App\Http\Controllers\API\Earnings\EditController::class)->name('api.earnings.edit');
        Route::patch('/{earning}', \App\Http\Controllers\API\Earnings\UpdateController::class)->name('api.earnings.update');
        Route::delete('/{earning}', \App\Http\Controllers\API\Earnings\DeleteController::class)->name('api.earnings.delete');
    });
});



Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

