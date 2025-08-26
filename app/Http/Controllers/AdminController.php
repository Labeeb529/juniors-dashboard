<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLoginPage()
    {
        return view('admin-login');
    }

    public function login(Request $request)
    {
        $incomingCredientials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (
            auth()->attempt([
                'username' => $incomingCredientials['username'],
                'password' => $incomingCredientials['password']
            ])
        ) {
            return redirect('/admin');
        } else {
            return 'login failure';
        }
    }

    public function loadAdmin()
    {
        return view('admin-dashboard');
    }

    public function signout()
    {
        auth()->logout();
        return redirect('/');
    }
}
