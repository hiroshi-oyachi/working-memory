<?php

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

Route::get('/', function () {
    return redirect('/home');
});


use App\Http\Controllers\HomeController;
Route::controller(HomeController::class)->middleware('auth')->group(function() {
        Route::get('/home', 'index')->name('home.index');
});

use App\Http\Controllers\ScheduleController;
Route::controller(ScheduleController::class)->middleware('auth')->group(function() {
    Route::get('schedule/create', 'add')->name('schedule.add');
    Route::post('schedule/create', 'create')->name('schedule.create');
    Route::get('schedule', 'index')->name('schedule.index');
    Route::get('schedule/edit', 'edit')->name('schedule.edit');
    Route::post('schedule/edit', 'update')->name('schedule.update');
    Route::get('schedule/delete', 'delete')->name('schedule.delete');
});

use App\Http\Controllers\BalanceController;
Route::controller(BalanceController::class)->middleware('auth')->group(function() {
    Route::get('balance/create', 'add')->name('balance.add');
    Route::post('balance/create', 'create')->name('balance.create');
    Route::get('balance', 'index')->name('balance.index');
    Route::get('balance/edit', 'edit')->name('balance.edit');
    Route::post('balance/edit', 'update')->name('balance.update');
    Route::get('balance/delete', 'delete')->name('balance.delete');
    Route::get('balance/graph', 'graph')->name('balance.graph');
    Route::get('balance/year/{year}', 'year')->name('balance.year');
});

use App\Http\Controllers\MypageController;
Route::controller(MypageController::class)->middleware('auth')->group(function() {
        Route::get('/mypage', 'index')->name('mypage.index');
});

Auth::routes();

/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/

use App\Http\Controllers\ScheduleController as PublicScheduleController1;
//Route::get('/', [PublicScheduleController1::class, 'index'])->name('schedule.index');

use App\Http\Controllers\BalanceController as PublicBalanceController1;
//Route::get('/', [PublicBalanceController1::class, 'index'])->name('balance.index');
