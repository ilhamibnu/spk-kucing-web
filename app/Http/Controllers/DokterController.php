<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;


class DokterController extends Controller
{
    public function index()
    {
        $artikel = Dokter::all();
        return view('admin.pages.data-dokter', [
            'artikel' => $artikel
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ], [
            'name.required' => 'Nama dokter wajib diisi',
            'telepon.required' => 'Nomor telepon dokter wajib diisi',
            'alamat.required' => 'Alamat dokter wajib diisi',
            'image.required' => 'Gambar wajib diisi',
            'image.image' => 'File yang diupload harus berupa gambar',
            'image.mimes' => 'Format gambar yang diupload harus jpeg, png, jpg, gif, atau svg',
        ]);

        $artikel = new Dokter();
        $artikel->name = $request->name;
        $artikel->telepon = $request->telepon;
        $artikel->alamat = $request->alamat;


        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        // simpan foto ke folder public/fotokost
        $file->move('dokter', $filename);
        $artikel->image = $filename;

        $artikel->save();

        return redirect()->back()->with('store', 'Artikel berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ], [
            'name.required' => 'Nama dokter wajib diisi',
            'telepon.required' => 'Nomor telepon dokter wajib diisi',
            'alamat.required' => 'Alamat dokter wajib diisi',
            'image.required' => 'Gambar wajib diisi',
            'image.image' => 'File yang diupload harus berupa gambar',
            'image.mimes' => 'Format gambar yang diupload harus jpeg, png, jpg, gif, atau svg',
        ]);

        $artikel = Dokter::find($id);
        $artikel->name = $request->name;
        $artikel->telepon = $request->telepon;
        $artikel->alamat = $request->alamat;



        if ($request->hasFile('image')) {
            // cek apa ada foto, jika ada hapus
            if ($artikel->image) {
                unlink('dokter/' . $artikel->image);
            }
            // upload foto baru
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // simpan foto ke folder public/fotokost
            $file->move('dokter', $filename);
            $artikel->image = $filename;
        }

        $artikel->save();

        return redirect()->back()->with('update', 'Artikel berhasil diubah');
    }

    public function destroy($id)
    {
        $artikel = Dokter::find($id);

        // cek apakah ada file foto
        if ($artikel->image) {
            // hapus foto
            unlink('dokter/' . $artikel->image);
        }

        $artikel->delete();

        return redirect()->back()->with('destroy', 'Artikel berhasil dihapus');
    }
}
