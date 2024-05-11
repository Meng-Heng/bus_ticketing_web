<?php

namespace App\Http\Controllers;

use App\Models\Seat_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class SeatTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seat_type = Seat_type::all();
        return view('seat_type.view')->with('tbl_seat_type', $seat_type);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seat_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'description' => 'max:255'
        ]); 
        // Create The seat type
        $seat_type = new Seat_type();
        $seat_type->name = $request->name;
	    $seat_type->description = $request->description;
        $seat_type->save();
        Session::flash('seat_type_created','New data is created.');
        return redirect('seat-type/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seat_type = Seat_type::findOrFail($id);
        return view('seat_type.detail')->with('tbl_seat_type', $seat_type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seat_type = Seat_type::find($id);
        return view('seat_type.edit')->with('tbl_seat_type', $seat_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
			'name' => 'required|max:30',
			'description' => 'max:255',
		]);

		if ($validator->fails()) {
			return redirect('seat-type/'.$id.'/edit')
				->withInput()
				->withErrors($validator);
		}
        $seat_type = Seat_type::find($id);
		$seat_type->name = $request->Input('name');
		$seat_type->description = $request->Input('description');
		$seat_type->save();

		Session::flash('seat_type_updated','Data is updated');
		return redirect('seat-type/'.$seat_type->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
       
        $seat_type = Seat_type::find($id);
    	$seat_type->delete();
    	Session::flash('seat_type_deleted','Data is deleted.');
    	return redirect('seat-type');
    }
}
