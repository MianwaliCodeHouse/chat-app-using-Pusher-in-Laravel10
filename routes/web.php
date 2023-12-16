<?php

use App\Http\Controllers\ChatAppUsingPusherController;
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
Route::post('/fire', [ChatAppUsingPusherController::class,'fire_event'])->name('fire.event');
Route::post('/chat', [ChatAppUsingPusherController::class,'chatroom'])->name('chat');
Route::get('/chat', [ChatAppUsingPusherController::class,'notFound'])->name('chat');
