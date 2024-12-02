<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Payment;
use App\Models\Bus_seat;
use App\Models\Schedule;
use App\Models\UserPermission;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index() {
        $ticket = Ticket::paginate(15);

        $user_id = Auth::user()->id;

        $permission = UserPermission::where('user_id', $user_id);
        return view('web.backend.component.ticket.view')->with('tbl_ticket', $ticket, 'permission', $permission);
    }

    public function edit($id) {
        $ticket = Ticket::with('schedule')->findOrFail($id);

        // Step 1: Get all departure times for the specific `departure_date, origin, destination` to populate a select field
        $departureTimes = Schedule::where('departure_date', $ticket->schedule->departure_date)
                                ->where('origin', $ticket->schedule->origin)
                                ->where('destination', $ticket->schedule->destination)
                                ->pluck('departure_time', 'id');

        // Step 2: Fetch all bus seats related to the bus in the current schedule
        $busSeats = Bus_seat::where('bus_id', $ticket->schedule->bus_id)
        ->where('status','Available')
        ->get();

        return view('web.backend.component.ticket.edit', compact('ticket', 'busSeats', 'departureTimes'))->with('tbl_ticket', $ticket);
    }

    public function update(Request $request, $id) {
        $ticket = Ticket::findOrFail($id);
        $bus_seat = Bus_seat::findOrFail($request->bus_seat_id);
        $request->validate([
            'bus_seat_id'=> 'required|exists:tbl_bus_seat,id',
            'departure_time_id'=> 'required|exists:tbl_schedule,id',
        ]);

        $ticket->bus_seat_id = $request->bus_seat_id;
        $ticket->schedule_id = $request->departure_time_id;

        $prevSeatNumber = $request->prev_selected_seat;

        $prevBusSeat = Bus_seat::where('seat_number', $prevSeatNumber)
                            ->where('bus_id', $ticket->schedule->bus_id) // Ensure it's the correct bus
                            ->first();
        
        $bus_seat->status = 'Sold';
        $bus_seat->save();
        $ticket->save();
        if ($prevBusSeat) {
            $prevBusSeat->status = 'Available';
            $prevBusSeat->save();
        }
        Session::flash('ticket_updated', 'Update successfully');
        return redirect('dashboard/ticket');
    }

    public function show($id) {
        $ticket = Ticket::findOrFail($id);
        return view('web.backend.component.ticket.detail')->with('tbl_ticket', $ticket);
    }

    public function getSeats($scheduleId)
    {
        $schedule = Schedule::findOrFail($scheduleId);

        // Fetch seats based on the bus_id of the selected schedule
        $busSeats = Bus_seat::where('bus_id', $schedule->bus_id)->get(['id', 'seat_number']);

        return response()->json(['seats' => $busSeats]);
    }

    public function updatePrevSeat($prevSeatId) {
        $seat_id = Bus_seat::findOrFail($prevSeatId);

        $seat_id->status = 'Available';
        $seat_id->save();
    }
}
