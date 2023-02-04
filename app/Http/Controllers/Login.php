<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function login()
    {
        return view('dashboard.login');
    }
    public function sign_in(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns|max:100',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->hasRole('admin')) {
                return redirect('dashboard');
            }
            if (Auth::user()->hasRole('user')) {
                return redirect('/');
            }
        }
        return redirect()->route('login')->with('failed', 'Invalid login credentials (informasi login tidak valid)');
    }
}
