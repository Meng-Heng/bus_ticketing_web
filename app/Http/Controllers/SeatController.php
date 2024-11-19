<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus_seat;
use Illuminate\Support\Facades\Session;

class SeatController extends Controller
{
    public function index() {
        $seat = Bus_seat::all();
        return redirect('/seat')->with('tbl_seat', $seat);
    }

    public function create() {
        $seatTypes = array();
        foreach (Bus_seat::all() as $seatType) {
            $seatTypes[$seatType->id] = $seatType->name;
        }
        return view('seat.create', compact('seatTypes'));
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'seat_number'=> 'required',
            'seat_type_id' => 'required|exists:tbl_seat_type,id',
        ]);
        $seat = new Bus_seat();
        $seat->seat_number = $request->seat_number;
        $seat->seat_type_id = $request->seat_type_id;
        $seat->save();
        Session::flash('seat_created', 'Created successfully');
        return redirect('seat/create');
    }

    public function edit($id) {
        $seatTypes = array();
        foreach (Bus_seat::all() as $seatType) {
            $seatTypes[$seatType->id] = $seatType->name;
        }
        $seat = Bus_seat::findorFail($id);
        return view('seat.edit', compact('seatTypes'))->with('tbl_seat', $seat);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'seat_number'=> 'required',
            'seat_type_id' => 'required|exists:tbl_seat_type,id'
        ]);

        $seat = Bus_seat::findOrFail($id);
        $seat->seat_number = $request->seat_number;
        $seat->seat_type_id = $request->seat_type_id;
        $seat->save();
        Session::flash('seat_updated', 'Updated successfully');
        return redirect('seat');
    }

    public function show($id) {
        $seat = Bus_seat::findOrFail($id);
        return view('seat.detail')->with('tbl_seat', $seat);
    }

    public function destroy($id) {
        $seat = Bus_seat::findOrFail($id);
        $seat->delete();
        Session::flash('seat_deleted', 'Deleted Successfully!');
        return redirect('seat');
    }
}
