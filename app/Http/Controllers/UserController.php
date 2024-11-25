<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

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
}
