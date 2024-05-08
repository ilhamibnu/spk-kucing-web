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
            'foto' => 'nullable|image',
            'link_penjelasan' => 'required'

        ], [
            'kode.required' => 'Kode tidak boleh kosong',
            'kode.unique' => 'Kode sudah ada',
            'nama.required' => 'Nama tidak boleh kosong',
            'foto.image' => 'Foto harus berupa gambar',

            'link_penjelasan.required' => 'Link penjelasan tidak boleh kosong'

        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'foto_gejala';
            $file->move($tujuan_upload, $nama_file);
        } else {
            $nama_file = null;
        }

        $nilai = new Gejala();
        $nilai->nama = $request->nama;
        $nilai->kode = $request->kode;
        $nilai->foto = $nama_file;
        $nilai->link_penjelasan = $request->link_penjelasan;
        $nilai->save();

        return redirect()->back()->with('store', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:tb_gejala,kode,' . $id . ',id',
            'foto' => 'image',
            'link_penjelasan' => 'required'

        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'kode.required' => 'Kode tidak boleh kosong',
            'kode.unique' => 'Kode sudah ada',
            'foto.image' => 'Foto harus berupa gambar',

            'link_penjelasan.required' => 'Link penjelasan tidak boleh kosong'

        ]);

        if ($request->hasFile('foto')) {
            // hapus foto lama
            $foto = Gejala::find($id);
            if ($foto->foto != null) {
                unlink('foto_gejala/' . $foto->foto);
            }

            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'foto_gejala';
            $file->move($tujuan_upload, $nama_file);
        }

        $nilai = Gejala::find($id);
        $nilai->nama = $request->nama;
        $nilai->kode = $request->kode;
        $nilai->foto = $nama_file;
        $nilai->link_penjelasan = $request->link_penjelasan;
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

        if ($nilai->foto != null) {
            unlink('foto_gejala/' . $nilai->foto);
        }

        $nilai->delete();

        return redirect()->back()->with('destroy', 'Data berhasil dihapus');
    }
}
