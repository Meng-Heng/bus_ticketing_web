<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class StationController extends Controller
{
    public function index() {
        $station = Station::all();
        return view('station.view')->with('tbl_station', $station);
    }

    public function create() {
        return view('station.create');
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'name'=> 'required',
            'p_address' => 'required',
            's_address' => 'nullable',
            'commune' => 'nullable',
            'district' => 'required',
            'city' => 'required'
        ]);
        $station = new Station();
        $station->name = $request->name;
        $station->p_address = $request->p_address;
        $station->s_address = $request->s_address;
        $station->commune = $request->commune;
        $station->district = $request->district;
        $station->city = $request->city;
        $station->save();
        Session::flash('station_created', 'Created successfully');
        return redirect('station/create');
    }

    public function edit($id) {
        $station = Station::findorFail($id);
        return view('station.edit')->with('tbl_station', $station);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name'=> 'required',
            'p_address' => 'required',
            's_address' => 'nullable',
            'commune' => 'nullable',
            'district' => 'required',
            'city' => 'required'
        ]);

        $station = Station::findOrFail($id);
        $station->name = $request->name;
        $station->p_address = $request->p_address;
        $station->s_address = $request->s_address;
        $station->commune = $request->commune;
        $station->district = $request->district;
        $station->city = $request->city;
        $station->save();
        Session::flash('station_updated', 'Updated successfully');
        return redirect('station');
    }

    public function show($id) {
        $station = Station::findOrFail($id);
        return view('station.detail')->with('tbl_station', $station);
    }

    public function destroy($id) {
        $station = Station::findOrFail($id);
        $station->delete();
        Session::flash('station_deleted', 'Deleted Successfully!');
        return redirect('station');
    }
}
