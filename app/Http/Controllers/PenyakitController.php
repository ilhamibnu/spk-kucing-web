<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;
use App\Models\DetailPenyakit;


class PenyakitController extends Controller
{
    public function index()
    {
        $penyakit = Penyakit::all();
        return view('admin.pages.penyakit', [
            'penyakit' => $penyakit,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:tb_penyakit',
            'nama' => 'required',
            'deskripsi' => 'required',
            'solusi' => 'required',
        ], [
            'kode.required' => 'Kode tidak boleh kosong',
            'kode.unique' => 'Kode sudah ada',
            'nama.required' => 'Nama tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            'solusi.required' => 'Solusi tidak boleh kosong',
        ]);

        $penyakit = new Penyakit();
        $penyakit->kode = $request->kode;
        $penyakit->nama = $request->nama;
        $penyakit->deskripsi = $request->deskripsi;
        $penyakit->solusi = $request->solusi;
        $penyakit->save();

        return redirect()->back()->with('store', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|unique:tb_penyakit,kode,' . $id . ',id',
            'nama' => 'required',
            'deskripsi' => 'required',
            'solusi' => 'required',
        ], [
            'kode.required' => 'Kode tidak boleh kosong',
            'kode.unique' => 'Kode sudah ada',
            'nama.required' => 'Nama tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            'solusi.required' => 'Solusi tidak boleh kosong',
        ]);

        $penyakit = Penyakit::find($id);
        $penyakit->kode = $request->kode;
        $penyakit->nama = $request->nama;
        $penyakit->deskripsi = $request->deskripsi;
        $penyakit->solusi = $request->solusi;
        $penyakit->save();

        return redirect()->back()->with('update', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $penyakit = Penyakit::find($id);
        $cek = DetailPenyakit::where('penyakit_id', $id)->count();
        if ($cek > 0) {
            return redirect()->back()->with('gagal', 'Data tidak bisa dihapus');
        }
        $penyakit->delete();

        return redirect()->back()->with('destroy', 'Data berhasil dihapus');
    }
}
