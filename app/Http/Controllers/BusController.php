<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class BusController extends Controller
{
    public function index() {
        $bus = Bus::all();
        return view('web.backend.component.bus.view')->with('tbl_bus', $bus);
    }

    public function create() {
    	return view('web.backend.component.bus.create');
    }

    public function store(Request $request) {
        $request->validate([
            'bus_plate' => 'required|max:50|min:6',
            'description' => 'max:255',
            'total_seat' => 'max:5',
            'is_active' => 'required|max:50'
        ]);
    
        // Create The Bus information
    
        $bus = new Bus();
        $bus->bus_plate = $request->bus_plate;
        $bus->description = $request->description;
        $bus->total_seat = $request->total_seat;
        $bus->is_active = $request->is_active;
        Session::flash('bus_created','New data is created.');
        $bus->save();
        return redirect('/bus');
    }

    public function edit($id)
    {
        $bus = Bus::find($id);
        return redirect('bus/edit')->with('tbl_bus', $bus);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
			'bus_plate' => 'required|max:50|min:6',
            'description' => 'max:255',
            'total_seat' => 'max:5',
            'is_active' => 'required|max:50'
		]);
		if ($validator->fails()) {
			return redirect('bus/' . $id . '/edit')
            ->withInput()
            ->withErrors($validator);
		}
		$bus = Bus::find($id);
		$bus->bus_plate = $request->Input('bus_plate');
        $bus->description = $request->Input('description');
        $bus->total_seat = $request->Input('total_seat');
        $bus->is_active = $request->Input('is_active');
		$bus->save();
		Session::flash('bus_updated','Bus has been updated.');
		return redirect('bus/' . $id . '/edit');
    }

    public function destroy($id)
    {
        $bus = Bus::find($id);
        $bus->delete();
        Session::flash('bus_deleted','Bus information '. $bus->id . ' was deleted.');
        return redirect('bus');
    }

    public function show($id) {
        $bus = Bus::findOrFail($id);
        return view('web.backend.component.bus.detail')->with('tbl_bus', $bus);
    }
}
