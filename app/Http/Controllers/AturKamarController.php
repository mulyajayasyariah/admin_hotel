<?php

namespace App\Http\Controllers;

use App\Models\aturkamar;
use App\Models\Kategori_Kamar;
use Illuminate\Http\Request;

class AturKamarController extends Controller
{
    public function AturKamar()
    {
        $dtaturkamar = aturkamar::with('Kategori_Kamar')->get();
        return view('Pengaturan.Atur_kamar.Atur_Kamar',compact('dtaturkamar'));
    }

    public function tambah()
    {
        $datkatkamar = Kategori_Kamar::all();
        return view('Pengaturan.Atur_kamar.tambah_Atur_Kamar',compact('datkatkamar'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        aturkamar::create([
            'id_kategori_kamar' => $request->id_kategori_kamar,
            'no_kamar' => $request->no_kamar,
        ]);
        return redirect('AturKamar')->with('toast_success','Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $dtkamar= aturkamar::findorfail($id);
        return view('Pengaturan.Atur_kamar.edit_Atur_Kamar',compact('dtkamar'));
    }

    public function update(Request $request, $id)
    {
        $dtupdt = aturkamar::findorfail($id);
        $dtupdt->update($request->all());
        return redirect('AturKamar')->with('toast_success','Data Berhasil Update');
    }

    public function hapus($id)
    {
        $hpskmr= aturkamar::findorfail($id);
        $hpskmr->delete();
        return back()->with('info','Data Berhasil Dihapus');
    }
}
