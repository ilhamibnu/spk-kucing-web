<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
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
                $newuser->google = '1';
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
            return redirect('/loginuser')->with('loginerror', 'Login Gagal');
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

        $cek_google = User::where('id', Auth::user()->id)->first();

        if ($cek_google->google == '1') {
            $request->validate([
                'name' => 'required',
            ], [
                'name.required' => 'Nama tidak boleh kosong',
            ]);

            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->save();

            return redirect('/profil')->with('profilupdate', 'Profil berhasil diubah');
        } else {
            if ($request->password == null) {
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|unique:tb_user,email,' . Auth::user()->id,
                ], [
                    'name.required' => 'Nama tidak boleh kosong',
                    'email.required' => 'Email tidak boleh kosong',
                    'email.email' => 'Email tidak valid',
                    'email.unique' => 'Email sudah terdaftar',
                ]);

                $user = User::find(Auth::user()->id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->save();

                return redirect('/profil')->with('profilupdate', 'Profil berhasil diubah');
            } else {
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|unique:tb_user,email,' . Auth::user()->id,
                    'password' => 'required',
                    'repassword' => 'required|same:password',
                ], [
                    'name.required' => 'Nama tidak boleh kosong',
                    'email.required' => 'Email tidak boleh kosong',
                    'email.email' => 'Email tidak valid',
                    'email.unique' => 'Email sudah terdaftar',
                    'password.required' => 'Password tidak boleh kosong',
                    'repassword.required' => 'Re-Password tidak boleh kosong',
                    'repassword.same' => 'Re-Password tidak sama dengan Password',
                ]);

                $user = User::find(Auth::user()->id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->save();

                return redirect('/profil')->with('profilupdate', 'Profil berhasil diubah');
            }
        }
    }

    public function userlogin()
    {
        return view('landing.pages.login');
    }

    public function userregister()
    {
        return view('landing.pages.register');
    }

    public function resetpassword()
    {
        return view('landing.pages.linkresetpassword');
    }

    public function changepassword($code)
    {
        $user = User::where('code', $code)->where('status_code', 'aktif')->where('role_id', 2)->first();
        if ($user) {
            return view('landing.pages.gantipassword', [
                'user' => $user
            ]);
        } else {
            return redirect('/')->with('linkkadaluarsa', 'Reset Password Gagal');
        }
    }

    public function changepasswordpost(Request $request)
    {
        $user = User::where('code', $request->code)->first();
        $request->validate([
            'password' => 'required',
            'repassword' => 'required|same:password',
        ], [
            'password.required' => 'Password tidak boleh kosong',
            'repassword.required' => 'Re-Password tidak boleh kosong',
            'repassword.same' => 'Re-Password tidak sama dengan Password',
        ]);

        $user->password = bcrypt($request->password);
        $user->code = null;
        $user->status_code = "tidak_aktif";
        $user->save();

        return redirect('/')->with('resetpasswordberhasil', 'Reset Password Berhasil');
    }

    public function sendlinkresetpassword(Request $request)
    {
        $request->validate([
            'email' => ['required'],
        ], [
            'email.required' => 'Email tidak boleh kosong',
        ]);

        $user = User::where('email', $request->email)->where('role_id', 2)->first();



        if ($user) {
            if ($user->google == '1') {
                return redirect('/reset-password')->with('google', 'Reset Password Gagal');
            } else {
                try {

                    $mail = new PHPMailer(true);

                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'mail.semnasjkgsby.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'admin@semnasjkgsby.com';                     //SMTP username
                    $mail->Password   = '%CQw$!a@@#%U';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('admin@semnasjkgsby.com', 'Admin Kucing');
                    $mail->addAddress($request->email);     //Add a recipient

                    $Code = substr((str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ")), 0, 10);

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Password Reset';
                    $mail->Body    = 'To reset your password, please click the link below:<br><br><a href="http://127.0.0.1:8000/changepassword/' . $Code . '">Reset Password</a>';
                    $updatecode = User::where('email', '=', $request->email)->first();
                    $updatecode->code = $Code;
                    $updatecode->status_code = 'aktif';
                    $updatecode->save();

                    $mail->send();
                } catch (Exception $e) {
                }
            }
            return redirect('/reset-password')->with('resetpassword', 'Reset Password Berhasil');
        } else {
            return redirect('/reset-password')->with('emailtidakada', 'Reset Password Gagal');
        }
    }

    public function userregisterpost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:tb_user,email',
            'password' => 'required',
            'repassword' => 'required|same:password',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'repassword.required' => 'Re-Password tidak boleh kosong',
            'repassword.same' => 'Re-Password tidak sama dengan Password',

        ]);

        $newuser = new User;
        $newuser->name = $request->name;
        $newuser->email = $request->email;
        $newuser->password = bcrypt($request->password);
        $newuser->google = '0';
        $newuser->role_id = 2;
        $newuser->save();

        return redirect()->back()->with('register', 'Anda berhasil Register');
    }

    public function userloginpost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $cekuser = User::where('email', $request->email)->first();

        if ($cekuser) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::user()->id_role == '1') {
                    return redirect('/kost')->with('login', 'Anda berhasil login');
                } else {
                    return redirect('/')->with('login', 'Anda berhasil login');
                }
            } else {
                return redirect()->back()->with('loginerror', 'Password salah');
            }
        } else {
            return redirect()->back()->with('loginerror', 'Email tidak terdaftar');
        }
    }
}
