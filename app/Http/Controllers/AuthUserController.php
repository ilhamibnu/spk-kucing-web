<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function GoogleCallback()
    {
        try {

            $data = Socialite::driver('google')->user();

            $cekuser = User::where('email', $data->email)->first();

            if ($cekuser) {
                Auth::login($cekuser);
                if (Auth::user()->id_role == '1') {
                    return redirect('/kost')->with('login', 'Anda berhasil login');
                } else {
                    return redirect('/')->with('login', 'Anda berhasil login');
                }
            } else {
                $newuser = new User;
                $newuser->name = $data->name;
                $newuser->email = $data->email;
                $newuser->role_id = 2;
                $newuser->password = bcrypt('fgyqwcbrq3bgbw7rq3bbubhjwfvb3q8yvbcbruq3b7587gucrxiuqr4cb');
                $newuser->save();

                Auth::login($newuser);
                if (Auth::user()->id_role == '1') {
                    return redirect('/dashboard')->with('login', 'Anda berhasil login');
                } else {
                    return redirect('/')->with('login', 'Anda berhasil login');
                }
            }
        } catch (Exception $e) {
            return redirect('/loginuser')->with('error', 'Login Gagal');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('logout', 'Anda berhasil logout');
    }

    public function profil()
    {
        return view('landing.pages.profil');
    }

    public function updateprofiluser(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->save();

        return redirect('/profil')->with('success', 'Profil berhasil diubah');
    }
}
