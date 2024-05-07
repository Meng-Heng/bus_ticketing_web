<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('admin/staff', 'App\\Http\\Controllers\\Admin\StaffController');
Route::resource('admin/posts', 'App\\Http\\Controllers\\Admin\PostController');
Route::resource('admin/ticket', 'App\Http\Controllers\Admin\TicketController');
Route::resource('admin/review', 'App\Http\Controllers\Admin\ReviewController');
Route::resource('admin/payment', 'App\Http\Controllers\Admin\PaymentController');
Route::resource('admin/storage', 'App\Http\Controllers\Admin\StorageController');
Route::resource('admin/busseat', 'App\Http\Controllers\Admin\BusSeatController');
Route::resource('admin/schedule', 'App\Http\Controllers\Admin\ScheduleController');
Route::resource('admin/bus', 'App\Http\Controllers\Admin\BuController');
Route::resource('admin/price', 'App\Http\Controllers\Admin\PriceController');