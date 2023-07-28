<?php

namespace App\Http\Controllers;

use App\Models\kategori_transaksikeluar;
use Illuminate\Http\Request;

class Kategori_TransaksiKeluarController extends Controller
{
    public function Kategori_TransaksiKeluar()
    {
        $dtkategori_keluar = kategori_transaksikeluar::all();
        return view('Pengaturan/Kategori_transaksi_keluar/kategori_transaksikeluar',compact('dtkategori_keluar'));
    }

    public function tambah()
    {
        return view ('Pengaturan/Kategori_transaksi_keluar/tambah_kategori_transaksikeluar');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        kategori_transaksikeluar::create([
            'nama' => $request->nama,
        ]);
        return redirect('Kategori_TransaksiKeluar')->with('toast_success','Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $dtkatkel= kategori_transaksikeluar::findorfail($id);
        return view('Pengaturan/Kategori_transaksi_keluar/edit_kategori_transaksikeluar',compact('dtkatkel'));
    }

    public function update(Request $request, $id)
    {
        $dtkatkelupd = kategori_transaksikeluar::findorfail($id);
        $dtkatkelupd->update($request->all());
        return redirect('Kategori_TransaksiKeluar')->with('toast_success','Data Berhasil Update');
    }

    public function hapus($id)
    {
        $hps_kat_kel= kategori_transaksikeluar::findorfail($id);
        $hps_kat_kel->delete();
        return redirect('Kategori_TransaksiKeluar')->with('info','Data Berhasil Dihapus');
    }
}
