<?php

use Illuminate\Support\Facades\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontEnd\HomeFormController;
use App\Http\Controllers\SeatTypeController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\BusSeatController;
use App\Http\Controllers\BusSeatDailyController;
use App\Http\Controllers\FrontEnd\PaymentController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\FrontEnd\ProfileController;
use App\Http\Controllers\FrontEnd\BusTicketingController;
use App\Http\Controllers\UserController;

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

// Home
Route::get('/', [HomeFormController::class, 'index']);
Route::get('register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('register', [UserController::class, 'registerUser'])->name('register.user');
Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'loginUser'])->name('login.user');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

// Bus schedule and seat
Route::get('/available', [BusTicketingController::class, 'index'])->name('schedule');
Route::get('/available/{schedule_id}', [BusTicketingController::class, 'seat'])->name('schedule.seat');
Route::get('/return-date', [BusTicketingController::class, 'scheduleReturn'])->name('schedule.return');
Route::get('/return/{schedule_id}', [BusTicketingController::class, 'scheduleSeatReturn'])->name('schedule.seat.return');

// Ticket Confirmation
Route::post('/confirmation', [BusTicketingController::class, 'ticketConfirmation'])->name('ticket')->middleware('auth');
Route::get('/back', [BusTicketingController::class, 'backToSchedule'])->name('backtoschedule')->middleware('auth');

// Payment

// Your Ticket
Route::get('/your-ticket')->middleware('auth');

// Profile
Route::get('/profile/{user_id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{user_id}', [ProfileController::class, 'update'])->name('profile.update');

/*
            Using Google Translate
        */

// Route::get('/fr', function() {
//     return GoogleTranslate::trans('Bye', 'es');
// });

// ------------------------

/*
            Simplified request for Locale
        */
// Route::get('/language/{locale?}', function ($locale = null) {
//     if (isset($locale) && in_array($locale, config('app.available_locales'))) {
//         app()->setLocale($locale);
//     }

//     return view('welcome');
// });

// ---------------------------------

Route::get('/language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});

Route::get('backend-home', function () {
    return view('web.backend.layout.admin');
});

/* 
    Bus View
    Bus Create
    Bus Update
    Bus Delete
    Bus Details
*/
Route::get('/bus', [BusController::class, 'index'])->name('bus.view');
Route::get('/bus/create', [BusController::class, 'create'])->name('bus.create');
Route::post('/bus', [BusController::class, 'store'])->name('bus.store');
Route::get('/bus/{id}/edit', [BusController::class, 'edit'])->name('bus.edit');
Route::put('/bus/{id}', [BusController::class, 'update'])->name('bus.update');
Route::delete('/bus/{id}', [BusController::class, 'destroy'])->name('bus.delete');
Route::get('/bus/{id}', [BusController::class, 'show'])->name('bus.show');

/* 
    Seat type view
    Seat type Create
    Seat type Update
    Seat type Delete
    Seat type Details
*/
Route::get('/seat-type', [SeatTypeController::class, 'index']);
Route::get('/seat-type/create', [SeatTypeController::class, 'create']);
Route::post('/seat-type', [SeatTypeController::class, 'store']);
Route::get('/seat-type/{id}/edit', [SeatTypeController::class, 'edit'])->name('seat_type.edit');
Route::put('/seat-type/{id}', [SeatTypeController::class, 'update'])->name('seat_type.update');
Route::delete('/seat-type/{id}', [SeatTypeController::class, 'destroy'])->name('seat_type.delete');
Route::get('/seat-type/{id}', [SeatTypeController::class, 'show'])->name('seat_type.show');

/* 
    Seat view
    Seat Create
    Seat Update
    Seat Delete
    Seat Details
*/
Route::get('/seat', [SeatController::class, 'index']);
Route::get('/seat/create', [SeatController::class, 'create']);
Route::post('/seat', [SeatController::class, 'store']);
Route::get('/seat/{id}/edit', [SeatController::class, 'edit'])->name('seat.edit');
Route::put('/seat/{id}', [SeatController::class, 'update'])->name('seat.update');
Route::delete('/seat/{id}', [SeatController::class, 'destroy'])->name('seat.delete');
Route::get('/seat/{id}', [SeatController::class, 'show'])->name('seat.detail');

/*
    Station view
    Station Create
    Station Update
    Station Delete
    Station Details
*/
Route::get('/station', [StationController::class, 'index'])->name('station.list');
Route::get('/station/create', [StationController::class, 'create'])->name('station.create');
Route::post('/station', [StationController::class, 'store'])->name('station.store');
Route::get('/station/{id}/edit', [StationController::class, 'edit'])->name('station.edit');
Route::put('/station/{id}', [StationController::class, 'update'])->name('station.update');
Route::delete('/station/{id}', [StationController::class, 'destroy'])->name('station.delete');
Route::get('/station/{id}', [StationController::class, 'show'])->name('station.view');

/*
    Bus Seat 
*/
Route::get('/bus-seat', [BusSeatController::class, 'index'])->name('bus_seat.list');
Route::get('/bus-seat/create', [BusSeatController::class, 'create'])->name('bus_seat.create');
Route::post('/bus-seat', [BusSeatController::class, 'store'])->name('bus_seat.store');
Route::get('/bus-seat/{id}/edit', [BusSeatController::class, 'edit'])->name('bus_seat.edit');
Route::put('/bus-seat/{id}', [BusSeatController::class, 'update'])->name('bus_seat.update');
Route::delete('/bus-seat/{id}', [BusSeatController::class, 'destroy'])->name('bus_seat.delete');
Route::get('/bus-seat/{id}', [BusSeatController::class, 'show'])->name('bus_seat.view');

/*
    Bus Seat Daily 
*/
Route::get('/schedule', [BusSeatDailyController::class, 'index'])->name('schedule.list');
Route::get('/schedule/create', [BusSeatDailyController::class, 'create'])->name('schedule.create');
Route::post('/schedule', [BusSeatDailyController::class, 'store'])->name('schedule.store');
Route::get('/schedule/{id}/edit', [BusSeatDailyController::class, 'edit'])->name('schedule.edit');
Route::put('/schedule/{id}', [BusSeatDailyController::class, 'update'])->name('schedule.update');
Route::delete('/schedule/{id}', [BusSeatDailyController::class, 'destroy'])->name('schedule.delete');
Route::get('/schedule/{id}', [BusSeatDailyController::class, 'show'])->name('schedule.view');

/*
    Ticket
*/
Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.list');
Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
Route::post('/ticket', [TicketController::class, 'store'])->name('ticket.store');
Route::get('/ticket/{id}/edit', [TicketController::class, 'edit'])->name('ticket.edit');
Route::put('/ticket/{id}', [TicketController::class, 'update'])->name('ticket.update');
Route::delete('/ticket/{id}', [TicketController::class, 'destroy'])->name('ticket.delete');
Route::get('/ticket/{id}', [TicketController::class, 'show'])->name('ticket.view');