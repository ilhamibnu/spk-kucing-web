<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class RiwayatUserController extends Controller
{
    public function index()
    {
        $riwayat = Riwayat::with('penyakit')->where('user_id', auth()->user()->id)->get();
        return view('landing.pages.riwayat', [
            'riwayat' => $riwayat,
        ]);
    }

    public function detail($id)
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
