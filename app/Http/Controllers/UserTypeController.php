<?php

namespace App\Http\Controllers;

use App\Models\User_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_type = UserType::all();
        return view('user-types.index', compact('user_type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'type' => 'required',
            'description' => 'nullable',
        ]);
        $user_type::create($request->all());
        return redirect()->route('user-types.index')->with('success', 'User type created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User_type $user_type)
    {
        return view('user-types.show', compact('user_type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User_type $user_type)
    {
        return view('user-types.edit', compact('user_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User_type $user_type)
    {
        $request->validate([
            'type'=>'required',
            'description'=>'nullable|max:25',
        ]);
        $user_type->update($request->all());
        return redirect()->route('user-types.index')->with('success', 'User Types updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User_type $user_type)
    {
        $user_type->delete();
        return redirect()->route('user-types.index')->with('success', 'User Types deleted Successfully');
    }
}
