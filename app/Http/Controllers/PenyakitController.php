<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;


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
            'name' => 'required',
            'deskrpsi' => 'required',
            'solusi' => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'deskrpsi.required' => 'Deskripsi tidak boleh kosong',
            'solusi.required' => 'Solusi tidak boleh kosong',
        ]);

        $penyakit = new Penyakit();
        $penyakit->name = $request->name;
        $penyakit->deskrpsi = $request->deskrpsi;
        $penyakit->solusi = $request->solusi;
        $penyakit->save();

        return redirect()->back()->with('store', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'deskrpsi' => 'required',
            'solusi' => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'deskrpsi.required' => 'Deskripsi tidak boleh kosong',
            'solusi.required' => 'Solusi tidak boleh kosong',
        ]);

        $penyakit = Penyakit::find($id);
        $penyakit->name = $request->name;
        $penyakit->deskrpsi = $request->deskrpsi;
        $penyakit->solusi = $request->solusi;
        $penyakit->save();

        return redirect()->back()->with('update', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $penyakit = Penyakit::find($id);
        $penyakit->delete();

        return redirect()->back()->with('destroy', 'Data berhasil dihapus');
    }
}
