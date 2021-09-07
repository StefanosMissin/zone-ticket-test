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
    return view('home');
});
Route::get('/home', [App\Http\Controllers\TicketsController::class, 'userTickets'])->name('userTickets');
Route::get('/new_ticket', [App\Http\Controllers\TicketsController::class, 'create'])->name('create');
Route::get('/my_tickets', [App\Http\Controllers\TicketsController::class, 'userTickets'])->name('userTickets');
Route::post('/new_ticket', [App\Http\Controllers\TicketsController::class, 'store'])->name('store');

Auth::routes();

