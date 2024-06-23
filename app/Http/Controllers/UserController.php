<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login_form()
    {
        if (Auth::check()) {
            return redirect()->intended('event/show');
        }
        return view('user/login_form');
    }

    public function register_form(Request $request)
    {
        return view('user/register_form');
    }

    public function login(Request $request): RedirectResponse
    {
        // dd(1);
        $userData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($userData)) {
            $request->session()->regenerate();
            return redirect()->intended('event/show');
        }
        return back()->withErrors([
            'email' => 'Please enter the valid data.',
        ])->onlyInput('email');

    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => 'required|string|max:255',
            'contact' => 'required|integer|digits:10|regex:/^[0-9]{10}$/',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'contact' => $request->contact,
        ]);
        return redirect('/register')->with('success', 'Registration Successful. Please login.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('success', 'Logged Out');
    }
}

