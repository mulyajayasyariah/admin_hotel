<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kategori_Pengeluaran;
use App\Models\kategori_transaksikeluar;
use App\Models\pengeluaran;

class PengeluaranController extends Controller
{

    public function pengeluaran(Request $request)
    {
        
        $dtpengeluaran = pengeluaran::with('Kategori_Pengeluaran')->with('user')->get();
        return view('Pengeluaran/operasional',compact('dtpengeluaran'));
    }
    public function cetaklaporan()
    {
        $dtcetakpengeluaran = pengeluaran::with('Kategori_Pengeluaran')->get();
        return view('Pengeluaran/cetak',compact('dtcetakpengeluaran'));
    }
    public function tambah()
    {
        $kat_peng_tambah = Kategori_Pengeluaran::all();
        $kat_peng_tambah_jenis = kategori_transaksikeluar::all();
        return view ('Pengeluaran/form',compact('kat_peng_tambah','kat_peng_tambah_jenis'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        pengeluaran::create([
            'tgl' => $request->tgl,
            'id_kategori' => $request->id_kategori,
            'keterangan' => $request->keterangan,
            'id_transaksi' => $request->id_transaksi,
            'id_user' => Auth()->user()->id,
            'total' => $request->total,
        ]);
        return redirect('pengeluaran')->with('toast_success','Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $kat_peng_tambah = Kategori_Pengeluaran::all();
        $kat_peng_tambah_jenis = kategori_transaksikeluar::all();
        $kat_peng= pengeluaran::with('Kategori_Pengeluaran')->findorfail($id);
        return view('Pengeluaran/edit',compact('kat_peng','kat_peng_tambah','kat_peng_tambah_jenis'));
    }

    public function update(Request $request, $id)
    {
        $kat_peng= pengeluaran::findorfail($id);
        $kat_peng->update($request->all());
        return redirect('pengeluaran')->with('toast_success','Data Berhasil Update');
    }

    public function hapus($id)
    {
        $peng= pengeluaran::findorfail($id);
        $peng->delete();
        return redirect('pengeluaran')->with('info','Data Berhasil Dihapus');
    }
}
