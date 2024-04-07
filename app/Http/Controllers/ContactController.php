<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == '1') {
                return redirect('/dashboard');
            }
        }

        $jumlah_artikel = Dokter::count();

        $artikel = Dokter::paginate(3);

        if ($request->ajax()) {
            $view = view('landing.data.dokter', [
                'dokter' => $artikel,
            ])->render();
            return response()->json(['html' => $view]);
        }

        return view('landing.pages.contact', [
            'dokter' => $artikel,
            'jumlah_artikel' => $jumlah_artikel,
        ]);
    }
}
