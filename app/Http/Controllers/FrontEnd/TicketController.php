<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index() {
        if(!Auth::user()) {
            return redirect('login');
        }
        $user_id = Auth::user()->id;
        // Fetch current timestaps for active & expired tickets
        $currentDateTime = Carbon::now();

        // Find ticket_id using user_id from payment
        // Then, fetch active tickets where the arrival time has not yet passed
        $ticket_schedule = Ticket::with(['schedule', 'bus_seat.bus', 'price', 'storage', 'payment.user']) // Eager load the Schedule model
        ->whereHas('payment', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })
        ->whereHas('schedule', function ($query) use ($currentDateTime) {
            $query->where(function ($q) use ($currentDateTime) {
                $q->where('arrival_date', '>', $currentDateTime->toDateString())
                    ->orWhere(function ($q2) use ($currentDateTime) {
                        $q2->where('arrival_date', '=', $currentDateTime->toDateString())
                            ->where('arrival_time', '>', $currentDateTime->toTimeString());
                    });
            });
        })
        ->get();
        if(empty($ticket_schedule)) {
            return Session::flash('not_found', 'Ticket Not Found! Please contact us on our Social Media');
        }

        return response()->json($ticket_schedule);
    }
}
