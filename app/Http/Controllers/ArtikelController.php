<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();
        return view('admin.pages.artikel', [
            'artikel' => $artikel
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ], [
            'judul.required' => 'Judul artikel wajib diisi',
            'isi.required' => 'Isi artikel wajib diisi'
        ]);

        $artikel = new Artikel;
        $artikel->judul = $request->judul;
        $artikel->isi = $request->isi;
        $artikel->save();

        return redirect()->back()->with('store', 'Artikel berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ], [
            'judul.required' => 'Judul artikel wajib diisi',
            'isi.required' => 'Isi artikel wajib diisi'
        ]);

        $artikel = Artikel::find($id);
        $artikel->judul = $request->judul;
        $artikel->isi = $request->isi;
        $artikel->save();

        return redirect()->back()->with('update', 'Artikel berhasil diubah');
    }

    public function destroy($id)
    {
        $artikel = Artikel::find($id);
        $artikel->delete();

        return redirect()->back()->with('destroy', 'Artikel berhasil dihapus');
    }
}
