<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

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

    public function updateprofil(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:tb_user,email,' . auth()->user()->id
        ], [
            'name.required' => 'Nama harus diisi!',
            'email.required' => 'Email harus diisi!',
            'email.unique' => 'Email sudah terdaftar!',
        ]);

        if ($request->password != null) {
            $request->validate([
                'password' => 'required|min:8'
            ], [
                'password.required' => 'Password harus diisi!',
                'password.min' => 'Password minimal 8 karakter!'
            ]);
            User::where('id', auth()->user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        } else {
            User::where('id', auth()->user()->id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        }

        return redirect()->back()->with('updateprofil', 'Profil berhasil diupdate!');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login')->with('logout', 'Logout berhasil!');
    }

  
}
