<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = Riwayat::with('penyakit')->get();
        return view('admin.pages.riwayat', [
            'riwayat' => $riwayat,
        ]);
    }

    public function detail($id)
    {
        $riwayat = Riwayat::with('penyakit')->find($id);
        return view('admin.pages.riwayat-detail', [
            'riwayat' => $riwayat,
        ]);
    }
}
