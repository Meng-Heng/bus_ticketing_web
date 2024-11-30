<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus_seat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Bus;
use App\Models\Price;
use App\Models\Storage;

class BusSeatController extends Controller
{
    public function index() {
        $bus_seat = Bus_seat::paginate(15);
        return view('web.backend.component.bus_seat.view')->with('tbl_bus_seat', $bus_seat);
    }

    public function create() {
        $buses = array();
        $seats = array();
        $prices = array();
        foreach (Bus::all() as $bus) {
            $buses[$bus->id] = $bus->bus_plate;
        }
        foreach (Storage::all() as $seat) {
            $seats[$seat->id] = $seat->seat_number;
        }
        foreach (Price::all() as $price) {
            $prices[$price->id] = $price->price;
        }

        return view('web.backend.component.bus_seat.create', compact('buses', 'seats', 'prices'));
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'bus_id'=> 'required|exists:tbl_bus,id',
            'seat_id' => 'required|exists:tbl_seat,id',
            'price_id' => 'required|exists:tbl_price,id'
        ]);
        $bus_seat = new Bus_seat();
        $bus_seat->bus_id = $request->bus_id;
        $bus_seat->seat_id = $request->seat_id;
        $bus_seat->price_id = $request->price_id;
        $bus_seat->save();
        Session::flash('bus_seat_created', 'Created successfully');
        return redirect('bus-seat');
    }

    public function edit($id) {
        $buses = array();
        $seats = array();
        $prices = array();
        foreach (Bus::all() as $bus) {
            $buses[$bus->id] = $bus->bus_plate;
        }
        foreach (Bus_seat::all() as $seat) {
            $seats[$seat->id] = $seat->seat_number;
        }
        foreach (Price::all() as $price) {
            $prices[$price->id] = $price->price;
        }
        $bus_seat = Bus_seat::findorFail($id);
        return view('bus_seat.edit', compact('buses','seats','prices'))->with('tbl_bus_seat', $bus_seat);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'bus_id'=> 'required|exists:tbl_bus,id',
            'seat_id' => 'required|exists:tbl_seat,id',
            'price_id' => 'required|exists:tbl_price,id'
        ]);
        $bus_seat = Bus_seat::findOrFail($id);
        $bus_seat->bus_id = $request->bus_id;
        $bus_seat->seat_id = $request->seat_id;
        $bus_seat->price_id = $request->price_id;
        $bus_seat->save();
        Session::flash('bus_seat_updated', 'Update successfully');
        return redirect('bus-seat');
    }

    public function show($id) {
        $bus_seat = Bus_seat::findOrFail($id);
        return view('bus_seat.detail')->with('tbl_bus_seat', $bus_seat);
    }

    public function destroy($id) {
        $bus_seat = Bus_seat::findOrFail($id);
        $bus_seat->delete();
        Session::flash('bus_seat_deleted', 'Deleted Successfully!');
        return redirect('bus-seat');
    }
}
