<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\PaybillsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/phonebook/querytrans', [PaybillsController::class, 'transQuery']);
Route::post('/v3/handleCallback', [ContactsController::class, 'handleCallback']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
