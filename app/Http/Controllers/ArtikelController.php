<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'slug' => 'required',
            'isi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ], [
            'judul.required' => 'Judul artikel wajib diisi',
            'slug.required' => 'Slug artikel wajib diisi',
            'isi.required' => 'Isi artikel wajib diisi',
            'image.required' => 'Gambar wajib diisi',
            'image.image' => 'File yang diupload harus berupa gambar',
            'image.mimes' => 'Format gambar yang diupload harus jpeg, png, jpg, gif, atau svg',
        ]);

        $artikel = new Artikel;
        $artikel->judul = $request->judul;
        $artikel->slug = $request->slug;
        $artikel->isi = $request->isi;

        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        // simpan foto ke folder public/fotokost
        $file->move('artikel-foto', $filename);
        $artikel->image = $filename;

        $artikel->save();

        return redirect()->back()->with('store', 'Artikel berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'slug' => 'required', // tambahkan validasi slug
            'isi' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ], [
            'judul.required' => 'Judul artikel wajib diisi',
            'slug.required' => 'Slug artikel wajib diisi',
            'isi.required' => 'Isi artikel wajib diisi',
            'image.image' => 'File yang diupload harus berupa gambar',
            'image.mimes' => 'Format gambar yang diupload harus jpeg, png, jpg, gif, atau svg',
        ]);

        $artikel = Artikel::find($id);
        $artikel->judul = $request->judul;
        $artikel->slug = $request->slug;
        $artikel->isi = $request->isi;

        if ($request->hasFile('image')) {
            // hapus foto lama
            unlink('artikel-foto/' . $artikel->image);
            // upload foto baru
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // simpan foto ke folder public/fotokost
            $file->move('artikel-foto', $filename);
            $artikel->image = $filename;
        }

        $artikel->save();

        return redirect()->back()->with('update', 'Artikel berhasil diubah');
    }

    public function destroy($id)
    {
        $artikel = Artikel::find($id);

        // hapus foto
        unlink('artikel-foto/' . $artikel->image);

        $artikel->delete();

        return redirect()->back()->with('destroy', 'Artikel berhasil dihapus');
    }
}
