<?php

namespace App\Http\Controllers;

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
            'name' => 'required',

        ], [
            'kode.required' => 'Kode tidak boleh kosong',
            'kode.unique' => 'Kode sudah ada',
            'name.required' => 'Nama tidak boleh kosong',

        ]);

        $nilai = new Gejala();
        $nilai->name = $request->name;
        $nilai->kode = $request->kode;
        $nilai->save();

        return redirect()->back()->with('store', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'kode' => 'required|unique:tb_gejala,kode,' . $id . ',id',

        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'kode.required' => 'Kode tidak boleh kosong',
            'kode.unique' => 'Kode sudah ada',

        ]);

        $nilai = Gejala::find($id);
        $nilai->name = $request->name;
        $nilai->kode = $request->kode;
        $nilai->save();

        return redirect()->back()->with('update', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $nilai = Gejala::find($id);
        $nilai->delete();

        return redirect()->back()->with('destroy', 'Data berhasil dihapus');
    }
}
