<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatUserController extends Controller
{
    public function index(Request $request)
    {
        $riwayat = Riwayat::with('penyakit')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(3);

        if ($request->ajax()) {
            $view = view('landing.data.riwayat', [
                'riwayat' => $riwayat,
            ])->render();
            return response()->json(['html' => $view]);
        }

        return view('landing.pages.riwayat', [
            'riwayat' => $riwayat,
        ]);
    }

    public function detail($id, Request $request)
    {
        $cek = Riwayat::where('id', $id)->where('user_id', auth()->user()->id)->first();

        if (!$cek) {
            return redirect('/riwayat-user');
        }

        $riwayat = Riwayat::with('penyakit')->find($id);
        return view('landing.pages.detail-diagnosa', [
            'riwayat' => $riwayat,
        ]);
    }

    public function printuser($id)
    {
        $cek = Riwayat::where('id', $id)->where('user_id', auth()->user()->id)->first();

        if (!$cek) {
            return redirect('/riwayat-user');
        }

        $riwayat = Riwayat::with('penyakit')->find($id);
        return view('landing.pages.print', [
            'riwayat' => $riwayat,
        ]);
    }
}
