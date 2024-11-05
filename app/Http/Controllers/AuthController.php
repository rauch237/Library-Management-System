<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    //Show Homepage
    public function homePage(){
        return view ('home');
    }

    // Show Register Form
    public function regForm(){
        return view ('register');
    }
    // Show Login Form
    public function loginForm(){
        return view ('login');
    }
    // Show Dashboard
    Public function dBoard() {
        return view('dashboard');
    }
    // Show Login form after logout
    public function signout(){
        return view('login');
    }
    // Show Reset Blade
    public function resetForm(){
        return view('reset');
    }

}
