<?php

namespace App\Http\Controllers;

use App\Models\Kategori_Kamar;
use Illuminate\Http\Request;

class Kategori_KamarController extends Controller
{
    public function Kategori_Kamar()
    {
        $dtkatkamar = Kategori_Kamar::all();
        return view('Pengaturan/Kategori_kamar/Kategori_kamar',compact('dtkatkamar'));
    }

    public function tambah()
    {
        return view('Pengaturan/Kategori_kamar/tambah_Kategori_Kamar');
    }

    public function store(Request $request)
    {
        Kategori_Kamar::create([
            'jenis_kamar' => $request->jenis_kamar,
            'jenis_ranjang' => $request->jenis_ranjang,
            'jumlahkamar' => $request->jumlahkamar,
        ]);
        return redirect('Kategori_Kamar')->with('toast_success','Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $dtkatkamar= Kategori_Kamar::findorfail($id);
        return view('Pengaturan/Kategori_kamar/edit_Kategori_Kamar',compact('dtkatkamar'));
    }

    public function update(Request $request, $id)
    {
        $dtkatkamar = Kategori_Kamar::findorfail($id);
        $dtkatkamar->update($request->all());
        return redirect('Kategori_Kamar')->with('toast_success','Data Berhasil Update');
    }

    public function hapus($id)
    {
        $hpskatkamar= Kategori_Kamar::findorfail($id);
        $hpskatkamar->delete();
        return redirect('Kategori_Kamar')->with('info','Data Berhasil Dihapus');
    }
}
