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
        )->where('penyakit_id', $id)->get();
        $penyakit = Penyakit::find($id);

        // id gejala yang belum ada di detail penyakit $id
        $gejala = Gejala::whereNotIn('id', function ($query) use ($id) {
            $query->select('gejala_id')->from('gejala_penyakit')->where('penyakit_id', $id);
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
            'penyakit_id' => 'required',
            'gejala_id' => 'required',
            'value_cf' => 'required',
        ], [
            'penyakit_id.required' => 'Penyakit tidak boleh kosong',
            'gejala_id.required' => 'Gejala tidak boleh kosong',
            'value_cf.required' => 'Nilai tidak boleh kosong',
        ]);

        $cek = DetailPenyakit::where('penyakit_id', $request->penyakit_id)->where('gejala_id', $request->gejala_id)->first();
        if ($cek) {
            return redirect()->back()->with('error', 'Data sudah ada');
        }

        $detailPenyakit = new DetailPenyakit();
        $detailPenyakit->penyakit_id = $request->penyakit_id;
        $detailPenyakit->gejala_id = $request->gejala_id;
        $detailPenyakit->value_cf = $request->value_cf;
        $detailPenyakit->save();

        return redirect()->back()->with('store', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penyakit_id' => 'required',
            'gejala_id' => 'required',
            'value_cf' => 'required',
        ], [
            'penyakit_id.required' => 'Penyakit tidak boleh kosong',
            'gejala_id.required' => 'Gejala tidak boleh kosong',
            'value_cf.required' => 'Nilai tidak boleh kosong',
        ]);

        $detailPenyakit = DetailPenyakit::find($id);
        $detailPenyakit->penyakit_id = $request->penyakit_id;
        $detailPenyakit->gejala_id = $request->gejala_id;
        $detailPenyakit->value_cf = $request->value_cf;
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
