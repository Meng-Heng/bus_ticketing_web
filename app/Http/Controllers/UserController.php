<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showRegisterForm() {
        return view('web.frontend.page.auth.register');
    }

    public function registerUser(Request $request) {
        $request->validate([
            'username' => 'required|string|unique:tbl_user|max:30',
            'email' => 'required|string|email|unique:tbl_user',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'pwd' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect()->intended()->with(['register', 'Register successfully!', $user]);
    }

    public function showLoginForm() {
        return view('web.frontend.page.auth.login');
    }

    public function loginUser(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
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
        return redirect('/')->intended();
    }
}
