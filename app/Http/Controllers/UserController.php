<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        if (
            auth()->attempt([
                'email' => $validated['email'],
                'password' => $validated['password'],
            ])
        ) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Logged in successfully.');
        } else {
            return redirect('/')->with('failure', 'Invalid login');
        }
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|max:25',
            'session' => 'required|min:4|max:4',
            'program' => 'required|min:3|max:3',
            'roll_no' => 'required|min:3|max:3',
            'email' => 'required',
            'password' => 'required|min:8|max:25',
        ]);

        User::create($validated);
        return view('home')->with('success', 'User created successfuly');
    }
}
