<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Riwayat;
use App\Models\Penyakit;
use Illuminate\Http\Request;


use App\Models\DetailPenyakit;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $jumlah_riwayat = Riwayat::count();
        $jumlah_detail_penyakit = DetailPenyakit::count();
        $jumlah_penyakit = Penyakit::count();
        $jumlah_artikel = Artikel::count();


        // Hitung total jumlah riwayat penyakit untuk semua penyakit
        $total_riwayat = DB::table('tb_riwayat')->count();

        // Ambil data jumlah riwayat penyakit untuk setiap penyakit
        $riwayat_penyakit = DB::table('tb_penyakit')
            ->leftJoin('tb_riwayat', 'tb_penyakit.id', '=', 'tb_riwayat.penyakit_id')
            ->select('tb_penyakit.nama', DB::raw('IFNULL(COUNT(tb_riwayat.penyakit_id), 0) as jumlah'))
            ->groupBy('tb_penyakit.nama')
            ->get();

        if ($total_riwayat == 0) {
            $total_riwayat = 1;
        }

        // Hitung persentase untuk setiap penyakit
        foreach ($riwayat_penyakit as $penyakit) {
            $persentase = ($penyakit->jumlah / $total_riwayat) * 100;
            $penyakit->persentase = $persentase;
        }

        $ambil_nama_penyakit = $riwayat_penyakit->pluck('nama');
        $ambil_persentase = $riwayat_penyakit->pluck('persentase');


        return view('admin.pages.dashboard', [
            'jumlah_riwayat' => $jumlah_riwayat,
            'jumlah_detail_penyakit' => $jumlah_detail_penyakit,
            'jumlah_penyakit' => $jumlah_penyakit,
            'jumlah_artikel' => $jumlah_artikel,
            'nama_penyakit' =>  $ambil_nama_penyakit,
            'persentase' => $ambil_persentase,
        ]);
    }
}
