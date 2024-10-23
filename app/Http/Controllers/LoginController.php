<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;




class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // If login is successful, redirect to the dashboard
            return redirect()->intended('dashboard')->with('success', 'You are logged in!');
        } else {
            // If login fails, redirect back with an error message
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

        //Handles Log Out
        public function logout(Request $request)
        {
            Auth::logout(); // Log out the user
    
            // Optionally invalidate the session and regenerate the CSRF token
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            // Redirect to the login page after logout
            return redirect('/login')->with('success', 'You have been logged out.');
        }
}
