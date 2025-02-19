<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    //show registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    //handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password'=> 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('books.index');
        }

        return back()->with('error','Invalid login credentials');

    }

    //handle registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $role = 'user';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
        ]);

        Auth::login($user);

        return redirect()->route('auth.login');
    }

    //handle logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
