<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login_page()
    {
        return view('auth.login_page');
    }

    public function login_page_post(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(Auth::user()->role == 'meja'){
                return redirect()->route('order.index');
            }else{
                return redirect()->route('dashboard.index');
            }
        }

        return back()->withErrors([
            'email' => 'Email tidak ditemukan',
            'password' => 'Password salah',
        ])->onlyInput('email', 'password');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
