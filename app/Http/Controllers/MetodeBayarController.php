<?php

namespace App\Http\Controllers;

use App\Models\metodebayar;
use Illuminate\Http\Request;

class MetodeBayarController extends Controller
{
    public function MetodeBayar()
    {
        $dtMetodeBayar = metodebayar::all();
        return view('Pengaturan.Metode_Bayar.Metode_Bayar',compact('dtMetodeBayar'));
    }

    public function tambah()
    {
        return view('Pengaturan.Metode_Bayar.tambah_Metode_Bayar');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        metodebayar::create([
            'nama' => $request->nama,
        ]);
        return redirect('MetodeBayar')->with('toast_success','Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $dtMetodeBayar= metodebayar::findorfail($id);
        return view('Pengaturan.Metode_Bayar.edit_Metode_Bayar',compact('dtMetodeBayar'));
    }

    public function update(Request $request, $id)
    {
        $dtupdt = metodebayar::findorfail($id);
        $dtupdt->update($request->all());
        return redirect('MetodeBayar')->with('toast_success','Data Berhasil Update');
    }

    public function hapus($id)
    {
        $hpskmr= metodebayar::findorfail($id);
        $hpskmr->delete();
        return back()->with('info','Data Berhasil Dihapus');
    }
}
