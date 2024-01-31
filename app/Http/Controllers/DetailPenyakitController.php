<?php

namespace App\Http\Controllers;

use App\Models\DetailPenyakit;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;


class DetailPenyakitController extends Controller
{
    public function index($id)
    {
        $detailPenyakit = DetailPenyakit::with(
            'gejala'
        )->where('id_penyakit', $id)->get();
        $penyakit = Penyakit::find($id);

        // id gejala yang belum ada di detail penyakit $id
        $gejala = Gejala::whereNotIn('id', function ($query) use ($id) {
            $query->select('id_gejala')->from('tb_detail_penyakit')->where('id_penyakit', $id);
        })->get();
        return view('admin.pages.detail-penyakit', [
            'detailPenyakit' => $detailPenyakit,
            'gejala' => $gejala,
            'penyakit' => $penyakit,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_penyakit' => 'required',
            'id_gejala' => 'required',
        ], [
            'id_penyakit.required' => 'Penyakit tidak boleh kosong',
            'id_gejala.required' => 'Gejala tidak boleh kosong',
        ]);

        $cek = DetailPenyakit::where('id_penyakit', $request->id_penyakit)->where('id_gejala', $request->id_gejala)->first();
        if ($cek) {
            return redirect()->back()->with('error', 'Data sudah ada');
        }

        $detailPenyakit = new DetailPenyakit();
        $detailPenyakit->id_penyakit = $request->id_penyakit;
        $detailPenyakit->id_gejala = $request->id_gejala;
        $detailPenyakit->save();

        return redirect()->back()->with('store', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_penyakit' => 'required',
            'id_gejala' => 'required',
        ], [
            'id_penyakit.required' => 'Penyakit tidak boleh kosong',
            'id_gejala.required' => 'Gejala tidak boleh kosong',
        ]);

        $cek = DetailPenyakit::where('id_penyakit', $request->id_penyakit)->where('id_gejala', $request->id_gejala)->first();
        if ($cek) {
            return redirect()->back()->with('error', 'Data sudah ada');
        }

        $detailPenyakit = DetailPenyakit::find($id);
        $detailPenyakit->id_penyakit = $request->id_penyakit;
        $detailPenyakit->id_gejala = $request->id_gejala;
        $detailPenyakit->save();

        return redirect()->back()->with('update', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $detailPenyakit = DetailPenyakit::find($id);
        $detailPenyakit->delete();

        return redirect()->back()->with('destroy', 'Data berhasil dihapus');
    }
}
