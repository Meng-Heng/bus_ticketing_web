<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function loginUser(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'recaptcha'
        ]);

        $user = User::where('email', $request->email)->first();

        // Check if the user exists and the password matches
        if ($user && Hash::check($request->password, $user->pwd)) {
            // Log the user in
            Auth::login($user);

            // Redirect to the intended page or the home page
            return redirect()->back()->with('login', 'Login successfully!');
        }
        
        return redirect()->back()->withErrors(['login-fail' => 'Wrong Email or Password']);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function index() {
        $user = User::paginate(15);
        return view('web.backend.component.user.view')->with('tbl_user', $user);
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('web.backend.component.user.edit')->with('tbl_user', $user);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
			'username' => 'required|string|max:255',
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
            'hometown' => 'string|max:255',
            'id_card' => 'string|max:20|unique:tbl_user,id_card,' . $user->id,
		]);
		if ($validator->fails()) {
			return redirect()->route('user.edit',$id)
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
		Session::flash('user_updated','user has been updated.');
		return redirect()->route('user.view');
    }

    public function show($id) {
        $user = user::findOrFail($id);
        return view('web.backend.component.user.detail')->with('tbl_user', $user);
    }
}
