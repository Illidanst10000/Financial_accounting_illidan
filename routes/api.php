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

Route::group(['middleware' => 'api'], function () {

    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
        Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
        Route::post('/refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
        Route::post('/me', [\App\Http\Controllers\AuthController::class, 'me']);
    });

    Route::group(['prefix' => 'earnings'], function () {
        Route::get('/', \App\Http\Controllers\API\Earnings\IndexController::class)->name('api.earnings.index');
        Route::get('/create', \App\Http\Controllers\API\Earnings\CreateController::class)->name('api.earnings.create');
        Route::post('/', \App\Http\Controllers\API\Earnings\StoreController::class)->name('api.earnings.store');
        Route::get('/{earning}', \App\Http\Controllers\API\Earnings\ShowController::class)->name('api.earnings.show');
        Route::delete('/{earning}', \App\Http\Controllers\API\Earnings\DeleteController::class)->name('api.earnings.delete');
    });

    Route::group(['prefix' => 'spendings'], function () {
        Route::get('/', \App\Http\Controllers\API\Spendings\IndexController::class)->name('api.spendings.index');
        Route::post('/', \App\Http\Controllers\API\Spendings\StoreController::class)->name('api.spendings.store');
        Route::get('/{spending}', \App\Http\Controllers\API\Spendings\ShowController::class)->name('api.spendings.show');
        Route::patch('/{spending}', \App\Http\Controllers\API\Spendings\UpdateController::class)->name('api.spendings.update');
        Route::delete('/{spending}', \App\Http\Controllers\API\Spendings\DeleteController::class)->name('api.spendings.delete');
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', \App\Http\Controllers\API\Tags\IndexController::class)->name('api.tags.index');
        Route::post('/', \App\Http\Controllers\API\Tags\StoreController::class)->name('api.tags.store');
        Route::get('/{tag}', \App\Http\Controllers\API\Tags\ShowController::class)->name('api.tags.show');
        Route::patch('/{tag}', \App\Http\Controllers\API\Tags\UpdateController::class)->name('api.tags.update');
        Route::delete('/{tag}', \App\Http\Controllers\API\Tags\DeleteController::class)->name('api.tags.delete');
    });

    Route::group(['prefix' => 'transfers'], function () {
        Route::post('/', \App\Http\Controllers\API\Transfers\StoreController::class)->name('api.transfers.store');
    });

    Route::group(['prefix' => 'balances'], function () {
        Route::get('/', \App\Http\Controllers\API\Balances\IndexController::class)->name('api.balances.store');
    });

    Route::group(['prefix' => 'reports'], function () {
        Route::get('/earnings/{fromDate}/{toDate}', [\App\Http\Controllers\API\Reports\ReportController::class, 'getEarningsByDate']);
        Route::get('/earnings/{sourceId}', [\App\Http\Controllers\API\Reports\ReportController::class, 'getEarningsBySource']);
        Route::get('/earnings/{typeId}', [\App\Http\Controllers\API\Reports\ReportController::class, 'getEarningsByType']);
        Route::get('/earnings/{typeId}/{sourceId}', [\App\Http\Controllers\API\Reports\ReportController::class, 'getEarningsByTypeAndSource']);
        Route::get('/spendings/{fromDate}/{toDate}', [\App\Http\Controllers\API\Reports\ReportController::class, 'getSpendingsByDate']);
        Route::get('/spendings/{categoryId}', [\App\Http\Controllers\API\Reports\ReportController::class, 'getSpendingsByCategory']);
        Route::get('/spendings/{typeId}', [\App\Http\Controllers\API\Reports\ReportController::class, 'getSpendingsByType']);
        Route::get('/spendings/{typeId}/{categoryId}', [\App\Http\Controllers\API\Reports\ReportController::class, 'getSpendingsByTypeAndCategory']);
        Route::get('/spendings/{tagId}', [\App\Http\Controllers\API\Reports\ReportController::class, 'getSpendingsByTag']);
        Route::get('/spendings/{tagId}/{categoryId}', [\App\Http\Controllers\API\Reports\ReportController::class, 'getSpendingsByTagAndCategory']);
        Route::get('/spendings/{tagId}/{typeId}', [\App\Http\Controllers\API\Reports\ReportController::class, 'getSpendingsByTagAndType']);
        Route::get('/spendings/{tagId}/{typeId}/{categoryId}', [\App\Http\Controllers\API\Reports\ReportController::class, 'getSpendingsByTagAndTypeAndCategory']);
    });

});

