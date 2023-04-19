<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Models\Room;
use App\Models\Guest;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('index',['rooms'=>Room::all()->take(3)]);
})->name("index");



Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login.authenticate');
    Route::get('/logout', 'logout')->name('logout');
});


Route::resource('guests', GuestController::class)->middleware('auth');
Route::resource('rooms', RoomController::class);
Route::resource('reservations', ReservationController::class)->middleware('auth');

Route::get('/rooms/create')->name('rooms.create')->middleware('auth');
Route::put('/rooms/{room}')->name('rooms.update')->middleware('auth');
Route::delete('/rooms/{room}')->name('rooms.destroy')->middleware('auth');

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('rooms', RoomController::class, ['only' => ['store','create','update','destroy','edit']]);
});



