<?php

use Illuminate\Support\Facades\Route;
use App\Models\Seat_type;
use App\Http\Controllers\SeatTypeController;
use App\Models\Bus;
use App\Http\Controllers\BusController;
use App\Models\Seat;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Controllers\UserTypeController;
use App\Models\User_type;
use App\Http\Controllers\StaffController;
use App\Models\Staff;
use App\App\Controllers\ReviewsController;
use App\Models\Review;
use App\Controllers\PaymentController;
use App\Models\Payment;
use App\Controllers\PricesController;
use App\Models\Price;

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
Route::get('/home', function () {
    return print('welcome');
});
Route::get('/seat_type', function () {
    $myvar = Seat_type::findOrFail(1);
    return print($myvar->description);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/seat_type',[SeatTypeController::class,'index'])->name('seattype.index');

Route::get('backend-home', function() {
    return view('layout.backend');
});

/* 
    Bus View
    Bus Create
    Bus Update
    Bus Delete
    Bus Details
*/
Route::get('/bus-list', [BusController::class, 'index'])->name('bus.view');
Route::get('/bus/create', [BusController::class, 'create'])->name('bus.create');
Route::post('/bus-list', [BusController::class, 'store'])->name('bus.store');
Route::get('/bus/{id}/edit', [BusController::class, 'edit'])->name('bus.edit');
Route::put('/bus-list/{id}', [BusController::class, 'update'])->name('bus.update');
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




Route::resource('/users', UserController::class);
Route::resource('/user-type', UserTypeController::class);
// Route::resource('/staff', StaffController::class);
Route::resource('/reviews', ReviewController::class);
Route::resource('/prices', PriceController::class);
Route::get('/staff', [StaffController::class, 'index']);



Route::get('/payments', [PaymentController::class, 'index']);
Route::get('/payments/create', [PaymentController::class, 'create']);
Route::post('/payments', [PaymentController::class, 'store']);
Route::get('/payments/{payment}', [PaymentController::class, 'show']);
Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit']);
Route::put('/payments/{payment}', [PaymentController::class, 'update']);
Route::delete('/payments/{payment}', [PaymentController::class, 'destroy']);