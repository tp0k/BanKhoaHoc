<?php

use App\Http\Controllers\Api\EventShowController as eventshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController as event;
use App\Http\Controllers\Api\HomeController as home;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/events',[event::class,'index'])->name('events');   
Route::get('/events',[event::class,'searchEvent'])->name('events');
Route::get('/event/{id}',[event::class,'eventDetails'])->name('eventDetail');

Route::get('/home', [home::class, 'index']);