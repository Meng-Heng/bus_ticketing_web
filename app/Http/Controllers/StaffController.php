<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
/*use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;*/


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $staff = new Staff;
        //Assign request data to staff object properties
        $staff->fname = $request->input('fname');
        $staff->lname = $request->input('lname');
        $staff->gender = $request->input('gender');
        $staff->position = $request->input('position');
        $staff->date_of_birth = $request->input('date_of_birth');
        $staff->place_of_birth = $request->input('place_of_birth');
        $staff->id_card = $request->input('id_card');
        $staff->residency = $request->input('residency');
        $staff->contact = $request->input('contact');
        $staff->is_active = $request->input('is_active');
        $staff->user_id = $request->input('user_id');

        $staff->save();
        return redirect()->route('staff.index')->with('success', 'Staff created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        return view('staff.show',compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
     //Update staff object properties with request data
        $staff->fname = $request->input('fname');
        $staff->lname = $request->input('lname');
        $staff->gender = $request->input('gender');
        $staff->position = $request->input('position');
        $staff->date_of_birth = $request->input('date_of_birth');
        $staff->place_of_birth = $request->input('place_of_birth');
        $staff->id_card = $request->input('id_card');
        $staff->residency = $request->input('residency');
        $staff->contact = $request->input('contact');
        $staff->is_active = $request->input('is_active');
        $staff->user_id = $request->input('user_id');

        $staff->save();
        return redirect()->route('staff.index')->with('success', 'Staff updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully');
    }
}
