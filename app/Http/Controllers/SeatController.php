<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;
use App\Models\Bus_seat;
use App\Models\Price;
use App\Models\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SeatController extends Controller
{
    public function index() {
        $seat = Bus_seat::paginate(37);
        return view('web.backend.component.seat.view')->with('tbl_seat', $seat);
    }

    public function create() {
        $bus = array();
        $storage = Storage::get('luggage')->last();
        $price = Price::get('price')->last();

        $storage = $storage->luggage;
        $price = $price->price;
        
        // Fetch all bus IDs that already exist in tbl_bus_seat
        $usedBusIds = DB::table('tbl_bus_seat')->pluck('bus_id')->toArray();

        // Fetch only the buses that are not in the usedBusIds
        $availableBuses = Bus::whereNotIn('id', $usedBusIds)->get();

        $totalSeats = [];
        // Populate the $bus array for the form
        foreach ($availableBuses as $buses) {
            $bus[$buses->id] = $buses->id . ': ' . $buses->bus_plate . ' (' . $buses->is_active . ')';
            $totalSeats[$buses->id] = $buses->total_seat;
        }

        return view('web.backend.component.seat.create', compact('bus', 'storage', 'price'));
    }

    public function store(Request $request) {
        $request->validate([
            'bus_id' => 'required',
            'seat_number'=> 'required',
            'seat_type' => 'required|string',
        ]);
        $storage = Storage::get('id')->last();
        $price = Price::get('id')->last();

        $seat = new Bus_seat();
        $seat->bus_id = $request->input('bus_id');
        $seat->seat_number = $request->input('seat_number');
        $seat->seat_type = $request->input('seat_type');
        $seat->storage_id = $storage->id;
        $seat->price_id = $price->id;
        $seat->status = 'Available';
        $seat->save();
        Session::flash('seat_created', 'Created successfully');
        return redirect()->route('seat.view');
    }

    public function edit($id) {
        $seat = Bus_seat::findorFail($id);
        $bus = array();
        $storage = Storage::all()->last();
        $price = Price::all()->last();

        // dd($price);
        foreach (Bus::all() as $buses) {
            $bus[$buses->id] = $buses->id . ': ' . $buses->bus_plate . ' (' . $buses->is_active . ')';
        }

        return view('web.backend.component.seat.edit', compact('bus','storage','price'))->with('tbl_seat', $seat);
    }

    public function update(Request $request, $id) {
        $seat = Bus_seat::findOrFail($id);
        $request->validate([
            'bus_id' => 'required',
            'seat_number'=> 'required',
            'seat_type' => 'required|string',
        ]);
        $storage = Storage::get('id')->last();
        $price = Price::get('id')->last();

        $seat->bus_id = $request->input('bus_id');
        $seat->seat_number = $request->input('seat_number');
        $seat->seat_type = $request->input('seat_type');
        $seat->storage_id = $request->input('storage_id');
        $seat->price_id = $request->input('price_id');
        $seat->status = $request->input('status');
        $seat->save();
        Session::flash('seat_updated', 'Updated successfully');
        return redirect()->route('seat.view');
    }

    public function show($id) {
        $seat = Bus_seat::findOrFail($id);
        return view('web.backend.component.seat.detail')->with('tbl_seat', $seat);
    }
}
