<?php

namespace App\Http\Controllers;

use App\Models\DataTambahan;
use App\Models\Kategori_Tambahan;
use Illuminate\Http\Request;

class DataTambahanController extends Controller
{
    public function DataTambahan()
    {
        $dttambahan = DataTambahan::with('Kategori_Tambahan')->get();
        return view('Room/data_tambahan', compact('dttambahan'));
    }
}
