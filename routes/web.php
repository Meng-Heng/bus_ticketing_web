<?php

use Illuminate\Support\Facades\Route;
use App\Models\Seat_type;
use App\Http\Controllers\SeatTypeController;

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