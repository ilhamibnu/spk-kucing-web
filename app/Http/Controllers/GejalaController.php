<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\NilaiKeyakinan;
use Illuminate\Http\Request;


class GejalaController extends Controller
{
    public function index()

    {
        $gejala = Gejala::with('nilaiKeyakinan')->get();
        $nilai_keyakinan = NilaiKeyakinan::all();
        return view('admin.pages.gejala', [
            'gejala' => $gejala,
            'nilai_keyakinan' => $nilai_keyakinan,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_nilai_keyakinan'    => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'id_nilai_keyakinan.required' => 'Nilai tidak boleh kosong',
        ]);

        $nilai = new Gejala();
        $nilai->name = $request->name;
        $nilai->id_nilai_keyakinan = $request->id_nilai_keyakinan;
        $nilai->save();

        return redirect()->back()->with('store', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'id_nilai_keyakinan'    => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'id_nilai_keyakinan.required' => 'Nilai tidak boleh kosong',
        ]);

        $nilai = Gejala::find($id);
        $nilai->name = $request->name;
        $nilai->id_nilai_keyakinan = $request->id_nilai_keyakinan;
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
