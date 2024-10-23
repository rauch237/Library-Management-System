<?php


namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
       // Handle user registration
   public function registeration(RegisterUserRequest $request)
   {
       // Validate incoming request data
       $validated = $request->validated();

       // Create the new user and save to the database
       $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password), // Hash the password
       ]);

       // Log the user in
       Auth::login($user);

       // Redirect to the dashboard
       return redirect()->intended('dashboard');
   }
}
