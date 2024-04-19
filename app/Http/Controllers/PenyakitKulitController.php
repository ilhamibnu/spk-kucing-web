<?php

namespace App\Http\Controllers;

use App\Models\PenyakitKulit;
use Illuminate\Http\Request;

class PenyakitKulitController extends Controller
{
    public function index()
    {
        $artikel = PenyakitKulit::all();
        return view('admin.pages.data-penyakit-kulit', [
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

        $artikel = new PenyakitKulit();
        $artikel->judul = $request->judul;
        $artikel->slug = $request->slug;
        $artikel->isi = $request->isi;

        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        // simpan foto ke folder public/fotokost
        $file->move('penyakit-kulit', $filename);
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

        $artikel = PenyakitKulit::find($id);
        $artikel->judul = $request->judul;
        $artikel->slug = $request->slug;
        $artikel->isi = $request->isi;

        if ($request->hasFile('image')) {
            // cek apakah artikel memiliki foto, jika ada hapus foto lama
            if ($artikel->image) {
                unlink('penyakit-kulit/' . $artikel->image);
            }
            // upload foto baru
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // simpan foto ke folder public/fotokost
            $file->move('penyakit-kulit', $filename);
            $artikel->image = $filename;
        }

        $artikel->save();

        return redirect()->back()->with('update', 'Artikel berhasil diubah');
    }

    public function destroy($id)
    {
        $artikel = PenyakitKulit::find($id);

        // hapus foto dari folder penyakit-kulit
        if ($artikel->image) {
            unlink('penyakit-kulit/' . $artikel->image);
        }

        $artikel->delete();

        return redirect()->back()->with('destroy', 'Artikel berhasil dihapus');
    }
}
