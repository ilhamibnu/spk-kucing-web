<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function index()
    {
        return view('admin.pages.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email harus diisi!',
            'password.required' => 'Password harus diisi!'
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard')->with('login', 'Login berhasil!');
        }

        return redirect('/login')->with('gagalogin', 'Username atau Password salah!');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login')->with('logout', 'Logout berhasil!');
    }
}
