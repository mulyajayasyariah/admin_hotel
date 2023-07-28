<?php

namespace App\Http\Controllers;

use App\Models\checkin;
use App\Models\Kategori_Transaksi;
use Illuminate\Http\Request;

class DataTransaksiController extends Controller
{
    public function data_transaksi()
    {
        $data_transaksi = checkin::with('Kategori_Transaksi')->get();
        return view('Room.data_transaksi',compact('data_transaksi'));
    }

}