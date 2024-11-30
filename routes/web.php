<?php

use Illuminate\Support\Facades\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontEnd\HomeFormController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\BusSeatController;
use App\Http\Controllers\BusSeatDailyController;
use App\Http\Controllers\FrontEnd\PayWayController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FrontEnd\ProfileController;
use App\Http\Controllers\FrontEnd\BusTicketingController;
use App\Http\Controllers\FrontEnd\ReviewController;
use App\Http\Controllers\FrontEnd\TicketController as FrontEndTicketController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StorageController;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

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

Route::middleware(['throttle:60,1'])->group(function() {

});

// ------------ Home ------------ //
Route::get('/', [HomeFormController::class, 'index']);

// ------------- Auth -------------- //
Auth::routes();
// Route::get('register', [UserController::class, 'showRegisterForm'])->name('register');
// Route::post('register', [UserController::class, 'registerUser'])->name('register.user');
// Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
// Route::post('login', [UserController::class, 'loginUser'])->name('login.user');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

// --------- Bus schedule and seat ------------- //

Route::get('/available', [BusTicketingController::class, 'departureSchedule'])->name('schedule.departure');
Route::get('/available/{schedule_id}', [BusTicketingController::class, 'departureSeat'])->name('departure.seat');
Route::get('/check-dep-seat', [BusTicketingController::class, 'handleSeatAssignment'])->name('asses.departure.seat');
Route::get('/return-date', [BusTicketingController::class, 'returnSchedule'])->name('schedule.return');
Route::get('/return/{schedule_id}', [BusTicketingController::class, 'returnSeat'])->name('return.seat');

// ----------- Return ------------- //

// Back or Return to Departure & Return searches
Route::post('/back', [BusTicketingController::class, 'backToSchedule'])->name('backtoschedule');
Route::post('/back-to-return', [BusTicketingController::class, 'backToReturn'])->name('backtoreturn');

// ---------- Fallback 404 Not Found ------------- //
Route::fallback(function () {
    return response()
    ->view('web.utils.error.404', [], 404);
});

// ----------- Locale -------------- //
Route::get('/language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});

// ----------- Auth ----------- //

Route::middleware('auth')->group(function() {
    // Ticket Confirmation
    Route::get('/confirmation', [BusTicketingController::class, 'ticketConfirmation'])->name('ticket.confirmation');
    // Frontend After-Payment
    Route::get('/success', [PayWayController::class, 'paymentSuccess'])->name('checkout.success');
    // Your Ticket
    Route::get('/your-ticket', [FrontEndTicketController::class, 'index']);
    // Profile
    Route::get('profile/{user_id}', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/{user_id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/{user_id}', [ProfileController::class, 'update'])->name('profile.update');
    // Review
    Route::get('review', [ReviewController::class, 'index'])->name('review');
    Route::post('review', [ReviewController::class, 'store'])->name('review.store');
});

// ------- Ticket office representative ----------- //

Route::middleware(['auth', 'permission:TOR'])->group(function () {
    Route::prefix('tor')->group(function() { 
        /*
            Ticket
        */
        Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.list');
        Route::get('/ticket/{id}/edit', [TicketController::class, 'edit'])->name('ticket.edit');
        Route::put('/ticket/{id}', [TicketController::class, 'update'])->name('ticket.update');
        Route::delete('/ticket/{id}', [TicketController::class, 'destroy'])->name('ticket.delete');
        Route::get('/ticket/{id}', [TicketController::class, 'show'])->name('ticket.view');
        Route::get('/get-seats/{scheduleId}', [TicketController::class, 'getSeats']);
        /*
            Bus schedule
        */
        Route::get('/schedule', [BusSeatDailyController::class, 'index'])->name('schedule.view');
        Route::get('schedule/create', [BusSeatDailyController::class, 'create'])->name('schedule.create');
        Route::post('/schedule', [BusSeatDailyController::class, 'store'])->name('schedule.store');
        Route::get('schedule/edit/{id}', [BusSeatDailyController::class, 'edit'])->name('schedule.edit');
        Route::put('/schedule/{id}', [BusSeatDailyController::class, 'update'])->name('schedule.update');
        Route::delete('/schedule/{id}', [BusSeatDailyController::class, 'destroy'])->name('schedule.delete');
        Route::get('/schedule/{id}', [BusSeatDailyController::class, 'show'])->name('schedule.show');
        /* 
            Seat 
        */
        Route::get('/seat', [SeatController::class, 'index'])->name('seat.view');
        Route::get('seat/create', [SeatController::class, 'create'])->name('seat.creare');
        Route::post('/seat', [BusSeatController::class, 'store'])->name('seat.store');
        Route::get('seat/edit/{id}', [BusSeatController::class, 'edit'])->name('seat.edit');
        Route::put('/seat/{id}', [BusSeatController::class, 'update'])->name('seat.update');
        Route::delete('/seat/{id}', [BusSeatController::class, 'destroy'])->name('seat.delete');
        Route::get('/seat/{id}', [BusSeatController::class, 'show'])->name('seat.show');
        /* 
            Storage 
        */
        Route::get('/storage', [SeatController::class, 'index'])->name('storage.view');
        Route::get('storage/create', [SeatController::class, 'create'])->name('storage.creare');
        Route::post('/storage', [SeatController::class, 'store'])->name('storage.store');
        Route::get('storage/edit/{id}', [SeatController::class, 'edit'])->name('storage.edit');
        Route::put('/storage/{id}', [SeatController::class, 'update'])->name('storage.update');
        Route::delete('/storage/{id}', [SeatController::class, 'destroy'])->name('storage.delete');
        Route::get('/storage/{id}', [SeatController::class, 'show'])->name('storage.show');
    });
});

// ------------- Admin ------------ //

Route::middleware(['auth', 'permission:Admin'])->group(function() {
    Route::group([
        'prefix' => 'admin',
    ], function() {
        /*
            Ticket
        */
        Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.list');
        Route::get('/ticket/{id}/edit', [TicketController::class, 'edit'])->name('ticket.edit');
        Route::put('/ticket/{id}', [TicketController::class, 'update'])->name('ticket.update');
        Route::delete('/ticket/{id}', [TicketController::class, 'destroy'])->name('ticket.delete');
        Route::get('/ticket/{id}', [TicketController::class, 'show'])->name('ticket.view');
        Route::get('/get-seats/{scheduleId}', [TicketController::class, 'getSeats']);
        /*
            Payment
        */
        Route::get('payment', [PaymentController::class, 'index'])->name('payment.list');
        Route::get('payment/{id}/edit', [PaymentController::class, 'edit'])->name('payment.edit');
        Route::put('payment/{id}', [PaymentController::class, 'update'])->name('payment.update');
        Route::get('payment/{id}', [PaymentController::class, 'show'])->name('payment.view');
        /* 
            Bus
        */
        Route::get('/bus', [BusController::class, 'index'])->name('bus.view');
        Route::get('/bus/create', [BusController::class, 'create'])->name('bus.create');
        Route::post('/bus', [BusController::class, 'store'])->name('bus.store');
        Route::get('/bus/edit/{id}', [BusController::class, 'edit'])->name('bus.edit');
        Route::put('/bus/{id}', [BusController::class, 'update'])->name('bus.update');
        Route::delete('/bus/{id}', [BusController::class, 'destroy'])->name('bus.delete');
        Route::get('/bus/{id}', [BusController::class, 'show'])->name('bus.show');
        /* 
            Seat 
        */
        Route::get('/seat', [SeatController::class, 'index'])->name('seat.view');
        Route::get('seat/create', [SeatController::class, 'create'])->name('seat.creare');
        Route::post('/seat', [SeatController::class, 'store'])->name('seat.store');
        Route::get('seat/edit/{id}', [SeatController::class, 'edit'])->name('seat.edit');
        Route::put('/seat/{id}', [SeatController::class, 'update'])->name('seat.update');
        Route::delete('/seat/{id}', [SeatController::class, 'destroy'])->name('seat.delete');
        Route::get('/seat/{id}', [SeatController::class, 'show'])->name('seat.show');
        /*
            Bus schedule
        */
        Route::get('/schedule', [BusSeatDailyController::class, 'index'])->name('schedule.view');
        Route::get('schedule/create', [BusSeatDailyController::class, 'create'])->name('schedule.create');
        Route::post('/schedule', [BusSeatDailyController::class, 'store'])->name('schedule.store');
        Route::get('schedule/edit/{id}', [BusSeatDailyController::class, 'edit'])->name('schedule.edit');
        Route::put('/schedule/{id}', [BusSeatDailyController::class, 'update'])->name('schedule.update');
        Route::delete('/schedule/{id}', [BusSeatDailyController::class, 'destroy'])->name('schedule.delete');
        Route::get('/schedule/{id}', [BusSeatDailyController::class, 'show'])->name('schedule.show');
        /*
            Review
        */
        Route::get('/feedback', [StaffController::class, 'index'])->name('feedback.view');
        Route::get('feedback/create', [StaffController::class, 'create'])->name('feedback.create');
        Route::post('/feedback', [StaffController::class, 'store'])->name('feedback.store');
        Route::get('feedback/edit/{id}', [StaffController::class, 'edit'])->name('feedback.edit');
        Route::put('/feedback/{id}', [StaffController::class, 'update'])->name('feedback.update');
        Route::delete('/feedback/{id}', [StaffController::class, 'destroy'])->name('feedback.delete');
        Route::get('/feedback/{id}', [StaffController::class, 'show'])->name('feedback.show');
        /*
            User
        */
        Route::get('/user', [StaffController::class, 'index'])->name('user.view');
        Route::get('user/create', [StaffController::class, 'create'])->name('user.create');
        Route::post('/user', [StaffController::class, 'store'])->name('user.store');
        Route::get('user/edit/{id}', [StaffController::class, 'edit'])->name('user.edit');
        Route::put('/user/{id}', [StaffController::class, 'update'])->name('user.update');
        Route::delete('/user/{id}', [StaffController::class, 'destroy'])->name('user.delete');
        Route::get('/user/{id}', [StaffController::class, 'show'])->name('user.show');
        /*
            Staff
        */
        Route::get('/staff', [StaffController::class, 'index'])->name('staff.view');
        Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
        Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
        Route::get('/staff/edit/{id}', [StaffController::class, 'edit'])->name('staff.edit');
        Route::put('/staff/{id}', [StaffController::class, 'update'])->name('staff.update');
        Route::delete('/staff/{id}', [StaffController::class, 'destroy'])->name('staff.delete');
        Route::get('/staff/{id}', [StaffController::class, 'show'])->name('staff.show');
        /*
            Permission
        */
        Route::get('/permission', [StaffController::class, 'index'])->name('permission.view');
        Route::get('/permission/create', [StaffController::class, 'create'])->name('permission.create');
        Route::post('/permission', [StaffController::class, 'store'])->name('permission.store');
        Route::get('/permission/edit/{id}', [StaffController::class, 'edit'])->name('permission.edit');
        Route::put('/permission/{id}', [StaffController::class, 'update'])->name('permission.update');
        Route::delete('/permission/{id}', [StaffController::class, 'destroy'])->name('permission.delete');
        Route::get('/permission/{id}', [StaffController::class, 'show'])->name('permission.show');
        /*
            UserPermission
        */
        Route::get('/userpermission', [StaffController::class, 'index'])->name('userpermission.view');
        Route::get('/userpermission/create', [StaffController::class, 'create'])->name('userpermission.create');
        Route::post('/userpermission', [StaffController::class, 'store'])->name('userpermission.store');
        Route::get('/userpermission/edit/{id}', [StaffController::class, 'edit'])->name('userpermission.edit');
        Route::put('/userpermission/{id}', [StaffController::class, 'update'])->name('userpermission.update');
        Route::delete('/userpermission/{id}', [StaffController::class, 'destroy'])->name('userpermission.delete');
        Route::get('/userpermission/{id}', [StaffController::class, 'show'])->name('userpermission.show');
        /* 
            Price
        */
        Route::get('/price', [PriceController::class, 'index'])->name('price.view');
        Route::get('/price/create', [PriceController::class, 'create'])->name('price.create');
        Route::post('/price', [PriceController::class, 'store'])->name('price.store');
        Route::get('/price/edit/{id}', [PriceController::class, 'edit'])->name('price.edit');
        Route::put('/price/{id}', [PriceController::class, 'update'])->name('price.update');
        Route::delete('/price/{id}', [PriceController::class, 'destroy'])->name('price.delete');
        Route::get('/price/{id}', [PriceController::class, 'show'])->name('price.show');
        /* 
            Storage 
        */
        Route::get('/storage', [StorageController::class, 'index'])->name('storage.view');
        Route::get('storage/create', [StorageController::class, 'create'])->name('storage.create');
        Route::post('/storage', [StorageController::class, 'store'])->name('storage.store');
        Route::get('storage/edit/{id}', [StorageController::class, 'edit'])->name('storage.edit');
        Route::put('/storage/{id}', [StorageController::class, 'update'])->name('storage.update');
        Route::delete('/storage/{id}', [StorageController::class, 'destroy'])->name('storage.delete');
        Route::get('/storage/{id}', [StorageController::class, 'show'])->name('storage.show');
    });
});

// --------------------------------- //

