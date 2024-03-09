<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
        /*return view('user.index', ['users' => $users]);*/
        /*return view('user.index')->withUsers($users);*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'user_type_id' => ['required'],
            'gender' => ['required'],
            'date_of_birth' => ['required'],
            'phone' => ['required'],
            'hometown' => ['required'],
            'id_card' => ['required'],
        ]);
        $user = User::create($validateData);
        return redirect()->route('user.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            'name' => ['required'],
            'email' => ['required|email|unique:users,email'.$user->id],
            'password' => ['required'],
            'user_type_id' => ['required'],
            'gender' => ['required'],
            'date_of_birth' => ['required'],
            'phone' => ['required'],
            'hometown' => ['required'],
            'id_card' => ['required'],
        ]);
        $user->update($validateData);
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
