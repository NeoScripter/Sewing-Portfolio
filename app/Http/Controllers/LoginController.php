<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle login form submission
    public function login(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'name' => 'required|exists:users,name',
            'password' => 'required',
        ]);


        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to the intended page or dashboard
            return redirect()->intended('/admin');
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors([
            'name' => 'Неправильное имя пользователя или пароль.',
        ]);
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
