<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran;
use App\Models\reservasi;
use App\Models\transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $bulanini = Carbon::now()->month;
        $tahunini = Carbon::now()->year;
        $datareservasi = reservasi::whereMonth('created_at', '=', $bulanini)->whereYear('created_at', '=', $tahunini)->sum('dp');
        $datatransaksi = transaksi::whereMonth('created_at', '=', $bulanini)->whereYear('created_at', '=', $tahunini)->sum('total');
        $datapengeluaran = pengeluaran::whereMonth('created_at', '=', $bulanini)->whereYear('created_at', '=', $tahunini)->sum('total');
        $totaltransaksi = $datatransaksi - $datareservasi;
        return view('dashboard',compact(
            'bulanini',
            'datareservasi',
            'totaltransaksi',
            'datatransaksi',
            'datapengeluaran'
        ));
    }
}
