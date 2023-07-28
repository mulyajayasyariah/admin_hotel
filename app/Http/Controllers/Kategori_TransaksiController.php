<?php

namespace App\Http\Controllers;

use App\Models\Kategori_Transaksi;
use Illuminate\Http\Request;

class Kategori_TransaksiController extends Controller
{
    public function Kategori_Transaksi()
    {
        $datkat_trans = Kategori_Transaksi::all();
        return view ('Pengaturan/Kategori_Transaksi/Kategori_Transaksi',compact('datkat_trans'));
    }

    public function tambah()
    {
        return view ('Pengaturan/Kategori_Transaksi/tambah_Kategori_Transaksi');
    }

    public function store(Request $request)
    {
        Kategori_Transaksi::create([
            'nama_transaksi' => $request->nama_transaksi,
        ]);
        return redirect('Kategori_Transaksi')->with('toast_success','Data Berhasil Di Input!');
    }
    
    public function edit($id)
    {
        $dtedit_trans= Kategori_Transaksi::findorfail($id);
        return view('Pengaturan/Kategori_Transaksi/edit_Kategori_transaksi',compact('dtedit_trans'));
    }

    public function update(Request $request, $id)
    {
        $dtupdtrans = Kategori_Transaksi::findorfail($id);
        $dtupdtrans->update($request->all());
        return redirect('Kategori_Transaksi')->with('toast_success','Data Berhasil Update');
    }
    
    public function hapus($id)
    {
        $hpskattrans= Kategori_Transaksi::findorfail($id);
        $hpskattrans->delete();
        return redirect('Kategori_Transaksi')->with('info','Data Berhasil Dihapus');
    }
}
