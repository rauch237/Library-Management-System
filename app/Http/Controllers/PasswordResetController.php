<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PasswordResetController extends Controller
{
    // Handle the password reset
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8|confirmed',
            'token' => 'required'
        ]);
    
     // Check if the token exists in the password_resets table    
        $reset = DB::table('password_resets')->where([
        'email' => $request->email,
        'token' => $request->token
        ])->first();

        if (!$reset) {
        return back()->withErrors(['token' => 'Invalid token.']);
        }

    // Update the user's password
        $user = User::where('email', $request->email)->first();
        $user->update(['password' => Hash::make($request->password)]);

    // Delete the token from the password_resets table
       DB::table('reset')->where(['email' => $request->email])->delete();

       return redirect()->route('login')->with('message', 'Your password has been reset!');
    }

}    
