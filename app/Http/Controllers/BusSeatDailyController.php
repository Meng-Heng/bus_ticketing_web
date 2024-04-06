<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus_seat_daily;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Bus_seat;
use App\Models\Station;
use App\Models\Bus;
use App\Models\Seat;

class BusSeatDailyController extends Controller
{
    public function index() {
        $daily = Bus_seat_daily::all();
        return view('bus_seat_daily.view')->with('tbl_bus_seat_daily', $daily);
    }

    public function create() {
        $bus_seats = array();
        $stations = array();
        $bus = Bus::all();
        foreach (Bus_seat::all() as $bus_seat) {
            $bus_seats[$bus_seat->id] = $bus_seat->id;
        }
        foreach (Station::all() as $station) {
            $stations[$station->id] = $station->name;
        }

        return view('bus_seat_daily.create', compact('bus_seats', 'stations'));
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'bus_seat_id'=> 'required',
            'destination' => 'required|max:255',
            'departure_date' => 'required|date_format:Y-m-d',
            'departure_time' => 'required|date_format:H:i:s',
            'arrival_date' => 'required|date_format:Y-m-d',
            'arrival_time' => 'required|date_format:H:i:s',
            'is_sold' => 'required|max:1',
            'station_id'=> 'required|exists:tbl_station,id',
        ]);
        $schedule = new Bus_seat_daily();
        $schedule->bus_seat_id = $request->bus_seat_id;
        $schedule->destination = $request->destination;
        $schedule->departure_date = $request->departure_date;
        $schedule->departure_time = $request->departure_time;
        $schedule->arrival_date = $request->arrival_date;
        $schedule->arrival_time = $request->arrival_time;
        $schedule->is_sold = $request->is_sold;
        $schedule->station_id = $request->station_id;
        $schedule->save();
        Session::flash('schedule_created', 'Created successfully');
        return redirect('schedule');
    }

    public function edit($id) {
        $bus_seats = array();
        $stations = array();
        foreach (Bus_seat::all() as $bus_seat) {
            $bus_seats[$bus_seat->id] = $bus_seat->id;
        }
        foreach (Station::all() as $station) {
            $stations[$station->id] = $station->name;
        }
        $schedule = Bus_seat_daily::findorFail($id);
        return view('bus_seat_daily.edit', compact('bus_seats','stations'))->with('tbl_bus_seat_daily', $schedule);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'bus_seat_id'=> 'required',
            'destination' => 'required|max:255',
            'departure_date' => 'required|date_format:Y-m-d',
            'departure_time' => 'required',
            'arrival_date' => 'required|date_format:Y-m-d',
            'arrival_time' => 'required',
            'is_sold' => 'required|max:1',
            'station_id'=> 'required|exists:tbl_station,id',
        ]);
        $schedule = Bus_seat_daily::findOrFail($id);
        $schedule->bus_seat_id = $request->bus_seat_id;
        $schedule->destination = $request->destination;
        $schedule->departure_date = $request->departure_date;
        $schedule->departure_time = $request->departure_time;
        $schedule->arrival_date = $request->arrival_date;
        $schedule->arrival_time = $request->arrival_time;
        $schedule->is_sold = $request->is_sold;
        $schedule->station_id = $request->station_id;
        $schedule->save();
        Session::flash('schedule_updated', 'Update successfully');
        return redirect('schedule');
    }

    public function show($id) {
        $schedule = Bus_seat_daily::findOrFail($id);
        return view('bus_seat_daily.detail')->with('tbl_bus_seat_daily', $schedule);
    }

    public function destroy($id) {
        $schedule = Bus_seat_daily::findOrFail($id);
        $schedule->delete();
        Session::flash('schedule_deleted', 'Deleted Successfully!');
        return redirect('schedule');
    }
}
