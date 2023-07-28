<?php

namespace App\Http\Controllers;

use App\Models\harga_kamar;
use App\Models\Kategori_Kamar;
use App\Models\Kategori_Transaksi;
use Illuminate\Http\Request;

class Harga_KamarController extends Controller
{
    public function Harga_Kamar()
    {
        $dathargakamar = harga_kamar::with('Kategori_Kamar')->get();
        return view ('Pengaturan/Harga_kamar/harga_kamar',compact('dathargakamar'));
    }

    public function tambah()
    {
        $datkatkamar = Kategori_Kamar::all();
        $datkattrans = Kategori_Transaksi::all();
        return view('Pengaturan/Harga_kamar/tambah_harga_kamar',compact('datkatkamar','datkattrans'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        harga_kamar::create([
            'id_kategori_kamar' => $request->id_kategori_kamar,
            'id_kategori_transaksi' => $request->id_kategori_transaksi,
            'harga' => $request->harga,
        ]);
        return redirect('Harga_Kamar')->with('toast_success','Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $datkatkamar = Kategori_Kamar::all();
        $dtdatharga= harga_kamar::findorfail($id);
        $datkattrans = Kategori_Transaksi::all();
        return view('Pengaturan/Harga_kamar/edit_harga_kamar',compact('dtdatharga','datkatkamar','datkattrans'));
    }

    public function update(Request $request, $id)
    {
        $dtdatharga = harga_kamar::findorfail($id);
        $dtdatharga->update($request->all());
        return redirect('Harga_Kamar')->with('toast_success','Data Berhasil Update');
    }

    public function hapus($id)
    {
        $hps_harga= harga_kamar::findorfail($id);
        $hps_harga->delete();
        return redirect('Harga_Kamar')->with('info','Data Berhasil Dihapus');
    }

}
