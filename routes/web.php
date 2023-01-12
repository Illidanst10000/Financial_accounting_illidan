<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Route::get('/', App\Http\Controllers\Main\IndexController::class)->name('main.index');

    Route::group(['prefix' => 'admin'], function () {
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

        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', \App\Http\Controllers\Admin\Categories\IndexController::class)->name('admin.categories.index');
            Route::get('/create', \App\Http\Controllers\Admin\Categories\CreateController::class)->name('admin.categories.create');
            Route::post('/', \App\Http\Controllers\Admin\Categories\StoreController::class)->name('admin.categories.store');
            Route::get('/{category}', \App\Http\Controllers\Admin\Categories\ShowController::class)->name('admin.categories.show');
            Route::get('/{category}/edit', \App\Http\Controllers\Admin\Categories\EditController::class)->name('admin.categories.edit');
            Route::patch('/{category}', \App\Http\Controllers\Admin\Categories\UpdateController::class)->name('admin.categories.update');
            Route::delete('/{category}', \App\Http\Controllers\Admin\Categories\DeleteController::class)->name('admin.categories.delete');
    });

        Route::group(['prefix' => 'tags'], function () {
            Route::get('/', \App\Http\Controllers\Admin\Tags\IndexController::class)->name('admin.tags.index');
            Route::get('/create', \App\Http\Controllers\Admin\Tags\CreateController::class)->name('admin.tags.create');
            Route::post('/', \App\Http\Controllers\Admin\Tags\StoreController::class)->name('admin.tags.store');
            Route::get('/{tag}', \App\Http\Controllers\Admin\Tags\ShowController::class)->name('admin.tags.show');
            Route::get('/{tag}/edit', \App\Http\Controllers\Admin\Tags\EditController::class)->name('admin.tags.edit');
            Route::patch('/{tag}', \App\Http\Controllers\Admin\Tags\UpdateController::class)->name('admin.tags.update');
            Route::delete('/{tag}', \App\Http\Controllers\Admin\Tags\DeleteController::class)->name('admin.tags.delete');
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
});

Auth::routes();
