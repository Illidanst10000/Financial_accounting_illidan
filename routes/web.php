<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\User as User;


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


 Route::group(['middleware' => 'auth'], function () {

    Route::get('/', App\Http\Controllers\Main\IndexController::class)->name('main.index');

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', User\Tags\IndexController::class)->name('user.tags.index');
        Route::get('/create', \App\Http\Controllers\User\Tags\CreateController::class)->name('user.tags.create');
        Route::post('/', \App\Http\Controllers\User\Tags\StoreController::class)->name('user.tags.store');
        Route::get('/{tag}', \App\Http\Controllers\User\Tags\ShowController::class)->name('user.tags.show');
        Route::get('/{tag}/edit', \App\Http\Controllers\User\Tags\EditController::class)->name('user.tags.edit');
        Route::patch('/{tag}', \App\Http\Controllers\User\Tags\UpdateController::class)->name('user.tags.update');
        Route::delete('/{tag}', \App\Http\Controllers\User\Tags\DeleteController::class)->name('user.tags.delete');
    });

    Route::group(['prefix' => 'earnings'], function () {
        Route::get('/', \App\Http\Controllers\User\Earnings\IndexController::class)->name('user.earnings.index');
        Route::get('/create', \App\Http\Controllers\User\Earnings\CreateController::class)->name('user.earnings.create');
        Route::post('/', \App\Http\Controllers\User\Earnings\StoreController::class)->name('user.earnings.store');
        Route::get('/{earning}', \App\Http\Controllers\User\Earnings\ShowController::class)->name('user.earnings.show');
        Route::get('/{earning}/edit', \App\Http\Controllers\User\Earnings\EditController::class)->name('user.earnings.edit');
        Route::patch('/{earning}', \App\Http\Controllers\User\Earnings\UpdateController::class)->name('user.earnings.update');
        Route::delete('/{earning}', \App\Http\Controllers\User\Earnings\DeleteController::class)->name('user.earnings.delete');
    });

    Route::group(['prefix' => 'spendings'], function () {
        Route::get('/', \App\Http\Controllers\User\Spendings\IndexController::class)->name('user.spendings.index');
        Route::get('/create', \App\Http\Controllers\User\Spendings\CreateController::class)->name('user.spendings.create');
        Route::post('/', \App\Http\Controllers\User\Spendings\StoreController::class)->name('user.spendings.store');
        Route::get('/{spending}', \App\Http\Controllers\User\Spendings\ShowController::class)->name('user.spendings.show');
        Route::get('/{spending}/edit', \App\Http\Controllers\User\Spendings\EditController::class)->name('user.spendings.edit');
        Route::patch('/{spending}', \App\Http\Controllers\User\Spendings\UpdateController::class)->name('user.spendings.update');
        Route::delete('/{spending}', \App\Http\Controllers\User\Spendings\DeleteController::class)->name('user.spendings.delete');
    });

    Route::group(['prefix' => 'transfers'], function () {
        Route::get('/', \App\Http\Controllers\User\Transfers\IndexController::class)->name('user.transfers.index');
        Route::get('/create', \App\Http\Controllers\User\Transfers\CreateController::class)->name('user.transfers.create');
        Route::post('/', \App\Http\Controllers\User\Transfers\StoreController::class)->name('user.transfers.store');
    });
  });


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', \App\Http\Controllers\Admin\Main\IndexController::class)->name('admin.main.index');

    Route::group(['prefix' => 'sources'], function () {
        Route::get('/', \App\Http\Controllers\Admin\Sources\IndexController::class)->name('admin.sources.index');
        Route::get('/create', \App\Http\Controllers\Admin\Sources\CreateController::class)->name('admin.sources.create');
        Route::post('/', \App\Http\Controllers\Admin\Sources\StoreController::class)->name('admin.sources.store');
        Route::get('/{source}', \App\Http\Controllers\Admin\Sources\ShowController::class)->name('admin.sources.show');
        Route::get('/{source}/edit', \App\Http\Controllers\Admin\Sources\EditController::class)->name('admin.sources.edit');
        Route::patch('/{source}', \App\Http\Controllers\Admin\Sources\UpdateController::class)->name('admin.sources.update');
        Route::delete('/{source}', \App\Http\Controllers\Admin\Sources\DeleteController::class)->name('admin.sources.delete');
    });

    Route::group(['prefix' => 'earnings'], function () {
        Route::get('/', \App\Http\Controllers\Admin\Earnings\IndexController::class)->name('admin.earnings.index');
        Route::get('/create', \App\Http\Controllers\Admin\Earnings\CreateController::class)->name('admin.earnings.create');
        Route::post('/', \App\Http\Controllers\Admin\Earnings\StoreController::class)->name('admin.earnings.store');
        Route::get('/{earning}', \App\Http\Controllers\Admin\Earnings\ShowController::class)->name('admin.earnings.show');
        Route::get('/{earning}/edit', \App\Http\Controllers\Admin\Earnings\EditController::class)->name('admin.earnings.edit');
        Route::patch('/{earning}', \App\Http\Controllers\Admin\Earnings\UpdateController::class)->name('admin.earnings.update');
        Route::delete('/{earning}', \App\Http\Controllers\Admin\Earnings\DeleteController::class)->name('admin.earnings.delete');
    });

    Route::group(['prefix' => 'spendings'], function () {
        Route::get('/', \App\Http\Controllers\Admin\Spendings\IndexController::class)->name('admin.spendings.index');
        Route::get('/create', \App\Http\Controllers\Admin\Spendings\CreateController::class)->name('admin.spendings.create');
        Route::post('/', \App\Http\Controllers\Admin\Spendings\StoreController::class)->name('admin.spendings.store');
        Route::get('/{spending}', \App\Http\Controllers\Admin\Spendings\ShowController::class)->name('admin.spendings.show');
        Route::get('/{spending}/edit', \App\Http\Controllers\Admin\Spendings\EditController::class)->name('admin.spendings.edit');
        Route::patch('/{spending}', \App\Http\Controllers\Admin\Spendings\UpdateController::class)->name('admin.spendings.update');
        Route::delete('/{spending}', \App\Http\Controllers\Admin\Spendings\DeleteController::class)->name('admin.spendings.delete');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', \App\Http\Controllers\Admin\Users\IndexController::class)->name('admin.users.index');
        Route::get('/create', \App\Http\Controllers\Admin\Users\CreateController::class)->name('admin.users.create');
        Route::post('/', \App\Http\Controllers\Admin\Users\StoreController::class)->name('admin.users.store');
        Route::get('/{user}', \App\Http\Controllers\Admin\Users\ShowController::class)->name('admin.users.show');
        Route::get('/{user}/edit', \App\Http\Controllers\Admin\Users\EditController::class)->name('admin.users.edit');
        Route::patch('/{user}', \App\Http\Controllers\Admin\Users\UpdateController::class)->name('admin.users.update');
        Route::delete('/{user}', \App\Http\Controllers\Admin\Users\DeleteController::class)->name('admin.users.delete');
    });

});

Auth::routes();
