<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
 // Step 2: Handle sending the reset link email
 public function sendResetLink(Request $request)
 {
     $request->validate(['email' => 'required|email|exists:users,email']);

     $token=Str::random($length=64);

     // Store the token in the password_resets table
     DB::table('password_resets')->insert([
         'email' => $request->email,
         'token' => $token,
         'created_at' => Carbon::now()
     ]);

     // Send the password reset link via email
     Mail::send('email.forget.password', ['token' => $token], function ($message) use ($request) {
         $message->to($request->email);
         $message->subject('Reset Password');
     });

     return back()->with('message', 'We have emailed your password reset link!');
 }

 public function resetPassword($token){
    return view('newPassword', ['token' => $token]);
 }

 public function resetPasswordPost(Request $request){
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|string|min:8|confirmed',
        'password_confirmation'=>'required', 
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
    DB::table('password_resets')->where(['email' => $request->email])->delete();

    return redirect()->route('login')->with('message', 'Your password has been reset!');
}

 }

   
