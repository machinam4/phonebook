<?php

use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaybillsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::prefix('/users')->controller(UsersController::class)->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'create')->name('add');
        Route::Post('/', 'store')->name('store');
        Route::get('/edit/{user}', 'edit')->name('edit');
        Route::Post('/{user}', 'update')->name('update');
    });
    Route::prefix('/channels')->controller(ChannelsController::class)->name('channels.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'create')->name('add');
        Route::Post('/', 'store')->name('store');
        Route::get('/edit/{channel}', 'edit')->name('edit');
        Route::Post('/{channel}', 'update')->name('update');
    });
    Route::prefix('/contacts')->controller(ContactsController::class)->name('contacts.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::Post('/', 'filter')->name('filter');
    });
    Route::prefix('/paybills')->controller(PaybillsController::class)->name('paybills.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::Post('/', 'store')->name('add');
        Route::put('/{paybill}', 'update')->name('update');
        Route::Delete('/{paybill}', 'destroy')->name('delete');
    });
});
