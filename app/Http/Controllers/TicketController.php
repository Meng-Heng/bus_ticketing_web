<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Payment;
use App\Models\Bus_seat;
use App\Models\Bus_seat_daily;

class TicketController extends Controller
{
    public function index() {
        $ticket = Ticket::all();
        return view('ticket.view')->with('tbl_ticket', $ticket);
    }

    public function create() {
        $users = array();
        $payments = array();
        $bus_seats = array();
        $schedules = array();
        foreach (Payment::all() as $payment) {
            $payments[$payment->id] = $payment->method;
        }
        foreach (User::all() as $user) {
            $users[$user->id] = $user->name;
        }
        foreach (Bus_seat::all() as $bus_seat) {
            $bus_seats[$bus_seat->id] = [$bus_seat->id];
        }
        foreach (Bus_seat_daily::all() as $schedule) {
            $schedules[$schedule->id] = [$schedule->destination, $schedule->departure_date, $schedule->departure_date, $schedule->arrival_date, $schedule->arrival_time];
        }

        return view('ticket.create', compact('payments', 'users','bus_seats', 'schedules'));
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'ticket_id' => 'required',
            'is_issued' => 'required|date_format:Y-m-d H:i:s',
            'bus_seat_id'=> 'required|exists:tbl_bus_seat,id',
            'schedule'=> 'required|exists:tbl_bus_seat_daily,id',
            'carry_on' => 'max:10',
            'luggage' => 'max:10',
            'user_id' => 'required|exists:users,id',
            'is_paid' => 'required|max:1',
            'paid_by' => 'required|exists:tbl_payment,id'
        ]);
        $ticket = new Ticket();
        $ticket->ticket_id = $request->ticket_id;
        $ticket->is_issued = $request->is_issued;
        $ticket->bus_seat_id = $request->bus_seat_id;
        $ticket->schedule = $request->schedule;
        $ticket->carry_on = $request->carry_on;
        $ticket->luggage = $request->luggage;
        $ticket->user_id = $request->user_id;
        $ticket->is_paid = $request->is_paid;
        $ticket->paid_by = $request->paid_by;
        $ticket->save();
        Session::flash('ticket_created', 'Created successfully');
        return redirect('ticket');
    }

    public function edit($id) {
        $users = array();
        $payments = array();
        $bus_seats = array();
        $schedules = array();
        foreach (Payment::all() as $payment) {
            $payments[$payment->id] = $payment->method;
        }
        foreach (User::all() as $user) {
            $users[$user->id] = $user->name;
        }
        foreach (Bus_seat::all() as $bus_seat) {
            $bus_seats[$bus_seat->id] = $bus_seat->id;
        }
        foreach (Bus_seat_daily::all() as $schedule) {
            $schedules[$schedule->id] = [$schedule->destination, $schedule->departure_date, $schedule->departure_date, $schedule->arrival_date, $schedule->arrival_time];
        }
        $ticket = Ticket::findOrFail($id);
        return view('ticket.edit', compact('payments', 'users','bus_seats', 'schedules'))->with('tbl_ticket', $ticket);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'ticket_id' => 'required',
            'is_issued' => 'required|date_format:Y-m-d H:i:s',
            'bus_seat_id'=> 'required|exists:tbl_bus_seat,id',
            'schedule'=> 'required|exists:tbl_bus_seat_daily,id',
            'carry_on' => 'max:10',
            'luggage' => 'max:10',
            'user_id' => 'required|exists:users,id',
            'is_paid' => 'required|max:1',
            'paid_by' => 'required|exists:tbl_payment,id'
        ]);
        $ticket = Ticket::findOrFail($id);
        $ticket->ticket_id = $request->ticket_id;
        $ticket->is_issued = $request->is_issued;
        $ticket->bus_seat_id = $request->bus_seat_id;
        $ticket->schedule = $request->schedule;
        $ticket->carry_on = $request->carry_on;
        $ticket->luggage = $request->luggage;
        $ticket->user_id = $request->user_id;
        $ticket->is_paid = $request->is_paid;
        $ticket->paid_by = $request->paid_by;
        $ticket->save();
        Session::flash('ticket_updated', 'Update successfully');
        return redirect('ticket');
    }

    public function show($id) {
        $ticket = Ticket::findOrFail($id);
        return view('ticket.detail')->with('tbl_ticket', $ticket);
    }

    public function destroy($id) {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        Session::flash('ticket_deleted', 'Deleted Successfully!');
        return redirect('ticket');
    }
}
