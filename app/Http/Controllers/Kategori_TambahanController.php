<?php

namespace App\Http\Controllers;
use App\Models\kategori_tambahan;
use Illuminate\Http\Request;

class Kategori_TambahanController extends Controller
{
    public function Kategori_Tambahan()
    {
        $dtkategori_tambahan = Kategori_Tambahan::all();
        return view('Pengaturan/kategori_tambahan/Kategori_Tambahan',compact('dtkategori_tambahan'));
    }
    public function tambah()
    {
        return view ('Pengaturan/kategori_tambahan/tambah_Kategori_Tambahan');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        Kategori_Tambahan::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
        ]);
        return redirect('Kategori_Tambahan')->with('toast_success','Data Berhasil Ditambahkan!');
    }
    public function edit($id)
    {
        $dtkategori_tambahan = Kategori_Tambahan::findorfail($id);
        return view('Pengaturan/kategori_tambahan/edit_kategori_tambahan',compact('dtkategori_tambahan'));
    }

    public function update(Request $request, $id)
    {
        $dtkategori_tambahan = Kategori_Tambahan::findorfail($id);
        $dtkategori_tambahan->update($request->all());
        return redirect('Kategori_Tambahan')->with('toast_success','Data Berhasil Di Update!');
    }

    public function hapus($id)
    {
        $hps_kat_tam= Kategori_Tambahan::findorfail($id);
        $hps_kat_tam->delete();
        return back()->with('info','Data Berhasil Dihapus');
    }
}
