<?php

namespace App\Http\Controllers;

use App\Models\NilaiKeyakinan;
use Illuminate\Http\Request;


class NilaiKeyakinanController extends Controller
{
    public function index()
    {
        $nilai_keyakinan = NilaiKeyakinan::all();
        return view('admin.pages.nilai-keyakinan', [
            'nilai_keyakinan' => $nilai_keyakinan,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nilai' => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'nilai.required' => 'Nilai tidak boleh kosong',
        ]);

        $nilai = new NilaiKeyakinan();
        $nilai->name = $request->name;
        $nilai->nilai = $request->nilai;
        $nilai->save();

        return redirect()->back()->with('store', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'nilai' => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'nilai.required' => 'Nilai tidak boleh kosong',
        ]);

        $nilai = NilaiKeyakinan::find($id);
        $nilai->name = $request->name;
        $nilai->nilai = $request->nilai;
        $nilai->save();

        return redirect()->back()->with('update', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $nilai = NilaiKeyakinan::find($id);
        $nilai->delete();

        return redirect()->back()->with('destroy', 'Data berhasil dihapus');
    }
}
