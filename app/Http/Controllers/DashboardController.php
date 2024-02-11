<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\DetailPenyakit;
use App\Models\Penyakit;
use App\Models\Riwayat;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_riwayat = Riwayat::count();
        $jumlah_detail_penyakit = DetailPenyakit::count();
        $jumlah_penyakit = Penyakit::count();
        $jumlah_artikel = Artikel::count();

        return view('admin.pages.dashboard', [
            'jumlah_riwayat' => $jumlah_riwayat,
            'jumlah_detail_penyakit' => $jumlah_detail_penyakit,
            'jumlah_penyakit' => $jumlah_penyakit,
            'jumlah_artikel' => $jumlah_artikel
        ]);
    }
}
