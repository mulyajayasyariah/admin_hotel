<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kategori_Pengeluaran;

class Kategori_PengeluaranController extends Controller
{
    public function Kategori_Pengeluaran()
    {
        $dtKategori_Pengeluaran = Kategori_Pengeluaran::all();
        return view('Pengaturan/kategori_pengeluaran/Kategori_Pengeluaran',compact('dtKategori_Pengeluaran'));
    }

    public function tambah()
    {
        return view ('Pengaturan/kategori_pengeluaran/form');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Kategori_Pengeluaran::create([
            'nama' => $request->nama,
        ]);
        return redirect('Kategori_Pengeluaran')->with('toast_success','Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $dtpeng= Kategori_Pengeluaran::findorfail($id);
        return view('Pengaturan/kategori_pengeluaran/edit_kategori_pengeluaran',compact('dtpeng'));
    }

    public function update(Request $request, $id)
    {
        $dtpeng = Kategori_Pengeluaran::findorfail($id);
        $dtpeng->update($request->all());
        return redirect('Kategori_Pengeluaran')->with('toast_success','Data Berhasil Update');
    }

    public function hapus($id)
    {
        $hps_peng= Kategori_Pengeluaran::findorfail($id);
        $hps_peng->delete();
        return redirect('Kategori_Pengeluaran')->with('info','Data Berhasil Dihapus');
    }
}