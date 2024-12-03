<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index($id) {
        try {
            $user = User::findOrFail($id);
            return view('web.frontend.page.profile.index')->with('user', $user);
        } catch(\Exception $e) {
            return response()->json(['LOOK AT THIS ERROR: ' => $e->getMessage()], 500);
        }
    }

    public function edit($id)
    { 
        try {
            $user = User::findOrFail($id);
            return view('web.frontend.page.profile.edit')->with('tbl_user', $user);
        } catch(\Exception $e) {
            return response()->json(['LOOK AT THIS ERROR: ' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id)
    {   
		$user = User::find($id);
        $validator = Validator::make($request->all(), [
			'username' => 'required|string|max:20|regex:/^[a-zA-Z0-9\s\_]+$/',
            'email' => 'required|email|unique:tbl_user,email,' . $user->id, // Assuming this is an update, with unique email
            'gender' => 'required', // Adjust options as needed
            'date_of_birth' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $minAge = 18;
                    if (Carbon::parse($value)->diffInYears(Carbon::now()) < $minAge) {
                        $fail('You must be at least ' . $minAge . ' years old.');
                    }
                },
            ],
            'contact' => [
                'required','string','regex:/^0\d{2}-\d{3}-\d{3,4}$/',
                function($attribute, $value, $fail) {
                    if(!$value) {
                        $fail('The contact number must be in the format 012-345-678 or 012-345-6789.');
                    }
                }
            ],
            'hometown' => 'string|max:255|regex:/^[a-zA-Z\s]+$/',
            'id_card' => 'string|max:10|unique:tbl_user,id_card,' . $user->id,
		]);
		if ($validator->fails()) {
			return redirect()->route('profile.edit',$id)
            ->withInput()
            ->withErrors($validator);
		}

		$user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->contact = $request->input('contact');
        $user->hometown = $request->input('hometown');
        $user->id_card = $request->input('id_card');
        $user->is_active = $request->input('is_active');

		$user->save();
		Session::flash('profile_updated','Profile has been updated.');
		return redirect()->route('profile.index', $user);
    }
    
}
