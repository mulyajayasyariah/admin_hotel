<?php

namespace App\Http\Controllers;

use App\Models\aturkamar;
use App\Models\checkin;
use App\Models\kamar;
use App\Models\Kategori_Transaksi;
use App\Models\metodebayar;
use App\Models\reservasi;
use App\Models\sementara_reservasi;
use App\Models\tamu;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function reservasi(Request $request)
    {
        $inputDate = $request->input('inputDate');
        $datakamar = aturkamar::all();

        $tanggalcari = $request->inputDate;
        $nokamar = aturkamar::pluck('no_kamar')->toArray();
        $startDate = Carbon::parse($inputDate);

        $tanggalmulai = [];
        if ($tanggalcari==null){
            for ($i = 0; $i <= 10; $i++) {
                $date = Carbon::now()->addDays($i);
                $tanggalmulai[] = $date->format('Y-m-d');
            }
            $caridata = reservasi::whereIn('nokamar', $nokamar)->whereIn('checkin', $tanggalmulai)->get();
        }else{
            for ($i = 0; $i <= 10; $i++) {
                $tanggalmulai[] = $startDate->copy()->addDays($i)->toDateString();
            }
            $caridata = reservasi::whereIn('nokamar', $nokamar)->whereIn('checkin', $tanggalmulai)->get();
        }
        $sebelum = Carbon::parse($tanggalcari)->subDays(10)->toDateString();
        $lastDate = end($tanggalmulai);
        return view('Reservasi.reservasi',compact('datakamar','inputDate','caridata','tanggalmulai','nokamar','lastDate','sebelum'));
    }
    public function input_reservasi(Request $request)
    {
        $acuan = 'Book-';
        $dtkattrans = Kategori_Transaksi::all();
        $dtmetbayar = metodebayar::all();
        $now = Carbon::now();
        $tgl = $now->year.$now->month.$now->day;
        $cek = reservasi::where('id_booking','LIKE','%'.$acuan.'%')->get();
        $coba = $cek->count();
        // dd($coba);
        $datatamu = tamu::all();
        if ($coba==0){
            $urut = 10000001;
            $notransaksi = 'Book-'.$tgl.$urut;
            // dd($notransaksi);
        }else{
            $terakhir = reservasi::where('id_booking','LIKE','%'.$acuan.'%')->get()->last();
            $urut = (int)substr($terakhir->id_booking, -8) +1;
            $notransaksi = 'Book-'.$tgl.$urut;
            // dd($notransaksi);
        }
        return view('Reservasi.input_reservasi',compact(
            'dtkattrans',
            'datatamu',
            'notransaksi',
            'dtmetbayar'
        ));
    }
    public function ambil_data_kamar()
    {
        $data = aturkamar::pluck('no_kamar')->toArray();
        return response()->json($data);
    }
    public function hitung_semua()
    {
        $total = sementara_reservasi::sum('total');
        return response()->json($total);
    }
    public function ambildata_katkamar(Request $request)
    {
        $id = $request->id;
        $data = aturkamar::findorfail($id);
        return response()->json($data);
    }
    public function ambilharga(Request $request)
    {
        // dd($request->all());
        $target = DB::table('harga_kamars');
        $idkattrans = $request->id_kategori_transaksi;
        $idkatkamar = $request->id_kategori_kamar;
        $row = $target->where("id_kategori_transaksi",$idkattrans)->where("id_kategori_kamar",$idkatkamar)->first();
        if (!empty($row)){
            return response()->json(compact("row"));
        }
    }
    public function sementara(Request $request)
    {
        // dd($request->all());
        $simpan_sementara=sementara_reservasi::create([
            'id_booking' => $request->id_transaksi,
            'booking'=> $request->booking,
            'checkin'=> $request->checkin,
            'checkout'=> $request->checkout,
            'nokamar'=> $request->id_nokamar,
            'id_kategori_transaksi'=> $request->id_kategori_transaksi,
            'nama'=> $request-> nama,
            'nohp'=> $request->nohp,
            'subtotal'=> $request->hargakamar,
            'diskon'=> $request->diskon,
            'total'=> $request->grandtotal,
            // 'dp'=> $request->diskon,
            // 'id_metodebayar'=> $request->id_metodebayar,
            // 'harusdibayar'=> $request->harusdibayar,
            'keterangan'=>$request->keterangan,
        ]);
        // dd($request->all());
        return response()->json($simpan_sementara);
        // tamu::create([
        //     'nik'=> $request->noktp,
        //     'nama'=> $request->nama,
        //     'alamat'=> $request->alamat,
        //     'no_hp'=> $request->nohp,
        // ]);
    }
    public function kurang_sementara()
    {
        $dataterakhir = sementara_reservasi::all()->last();
        $dataterakhir->delete();
        return response()->json(['message' => 'Berhasil Kurang Hari!']);
    }
    public function store(Request $request)
    {
        $metodebayar = $request->metodebayar;
        if($metodebayar==1){
            $totalonline = sementara_reservasi::all()->sum('total');
            $deposit = $totalonline;
        }else{
            $deposit = $request->deposit;
        }
        $isikanbayar = $request->isikanbayar;
        $sementara = sementara_reservasi::all();
        
        foreach ($sementara as $record) {
            $newRecord = new reservasi();
            $newRecord->id_booking = $record->id_booking;
            $newRecord->booking = $record->booking;
            $newRecord->checkin = $record->checkin;
            $newRecord->checkout = $record->checkout;
            $newRecord->nokamar = $record->nokamar;
            $newRecord->id_kategori_transaksi = $record->id_kategori_transaksi;
            $newRecord->nama = $record->nama;
            $newRecord->nohp = $record->nohp;
            $newRecord->subtotal = $record->subtotal;
            $newRecord->diskon = $record->diskon;
            $newRecord->total = $record->total;
            $newRecord->keterangan = $record->keterangan;
            $newRecord->dp = $deposit;
            $newRecord->id_metodebayar = $metodebayar;
            $newRecord->harusdibayar = $isikanbayar;

            $newRecord->save();
        }
        //hapus tabel sementara
        sementara_reservasi::truncate();

        $response = [
            'success' => true,
            'message' => 'Berhasil Simpan Booking',
            'redirect' => route('reservasi') // Replace 'home' with the desired route name or URL
        ];

        return response()->json($response);
    }
    public function data_reservasi()
    {
        $datareservasi = reservasi::all();
        return view('Reservasi.data_reservasi',compact('datareservasi'));
    }
}
