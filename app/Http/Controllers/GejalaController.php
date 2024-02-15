<?php

namespace App\Http\Controllers;

use App\Models\DetailPenyakit;
use App\Models\Gejala;
use App\Models\NilaiKeyakinan;
use Illuminate\Http\Request;


class GejalaController extends Controller
{
    public function index()

    {
        $gejala = Gejala::all();
        return view('admin.pages.gejala', [
            'gejala' => $gejala,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:tb_gejala',
            'nama' => 'required',

        ], [
            'kode.required' => 'Kode tidak boleh kosong',
            'kode.unique' => 'Kode sudah ada',
            'nama.required' => 'Nama tidak boleh kosong',

        ]);

        $nilai = new Gejala();
        $nilai->nama = $request->nama;
        $nilai->kode = $request->kode;
        $nilai->save();

        return redirect()->back()->with('store', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:tb_gejala,kode,' . $id . ',id',

        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'kode.required' => 'Kode tidak boleh kosong',
            'kode.unique' => 'Kode sudah ada',

        ]);

        $nilai = Gejala::find($id);
        $nilai->nama = $request->nama;
        $nilai->kode = $request->kode;
        $nilai->save();

        return redirect()->back()->with('update', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $nilai = Gejala::find($id);
        $cek = DetailPenyakit::where('gejala_id', $id)->count();
        if ($cek > 0) {
            return redirect()->back()->with('gagal', 'Data tidak bisa dihapus');
        }
        $nilai->delete();

        return redirect()->back()->with('destroy', 'Data berhasil dihapus');
    }
}
