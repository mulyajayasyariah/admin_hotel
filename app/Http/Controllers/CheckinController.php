<?php

namespace App\Http\Controllers;

use App\Models\aturkamar;
use App\Models\checkin;
use App\Models\Datatambahan;
use App\Models\harga_kamar;
use App\Models\Kategori_Kamar;
use App\Models\Kategori_Tambahan;
use App\Models\Kategori_Transaksi;
use App\Models\metodebayar;
use App\Models\reservasi;
use App\Models\sementara_tambahan;
use App\Models\sementara_transaksi;
use App\Models\status_kamar;
use App\Models\tamu;
use App\Models\transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use SebastianBergmann\Environment\Console;

class CheckinController extends Controller
{
    public function checkin()
    {
        $datastatus = status_kamar::all();
        $datatransaksi = checkin::all();
        $jumlahtamu = status_kamar::sum('jumlahtamu');
        $datatungggakan = status_kamar::where('status',1)->wherenotnull('kekurangan')->get();
        return view('Room.checkin',compact('datastatus','datatransaksi','jumlahtamu','datatungggakan'));
    }
    public function input_checkin(Request $request)
    {
        alert('Semua Data Harus Lengkap');
        $ceksementara = sementara_transaksi::count();
        if($ceksementara>0){
            sementara_transaksi::truncate();
        }
        $ceksementambahan = sementara_tambahan::count();
        if($ceksementambahan>0){
            sementara_tambahan::truncate();
        }
        $id = $request->id;
        $now = Carbon::now();
        $dtaturkat = aturkamar::with('Kategori_Kamar')->find($id);
        $cekcheckin = status_kamar::where('id',$id)->get()->count();
        if($cekcheckin>0){
            Alert('SUDAH ADA TAMU CHECKIN !');
            return redirect('checkin');
        }
        $tanggalcaribooking =$now->format('Y-m-d');
        $datasudahbooking = reservasi::with('metodebayar')->where('nokamar',$id)->where('checkin',$tanggalcaribooking)->first();
        // dd($hitungrow);
        $tglcheckout = "";
        $totalsemuaharus = 0;
        $jumlahhari = 0;
        $carisemua="";
        $grandtotal = 0;
        $totalsemuadeposit = 0;
        if($datasudahbooking!=null){
            $carisemua = reservasi::where('id_booking',$datasudahbooking->id_booking)->get();
            $grandtotal = $carisemua->sum('total');
            $totalsemuadeposit = $carisemua->sum('dp');
            $totalsemuaharus = $carisemua->sum('harusdibayar');
            $jumlahhari = $carisemua->count();
            $rowcheckout = reservasi::where('id_booking',$datasudahbooking->id_booking)->get();
            $tglcheckout = $rowcheckout->last();

            // $carisemua = sementara_transaksi::all();
            foreach ($carisemua as $record) {
                $newRecord = new sementara_transaksi();
                $newRecord->booking = $record->booking;
                $newRecord->checkin = $record->checkin;
                $newRecord->checkout = $record->checkout;
                $newRecord->id_nokamar = $record->nokamar;
                $newRecord->nama = $record->nama;
                $newRecord->statustamu = 'Laki-laki';
                $newRecord->id_kategori_kamar = $dtaturkat->id_kategori_kamar;
                $newRecord->id_kategori_transaksi = $record->id_kategori_transaksi;
                $newRecord->jumlahtamu = '2';
                $newRecord->hargakamar = $record->subtotal;
                $newRecord->deposit = $record->dp;
                $newRecord->diskon = $record->diskon;
                $newRecord->keterangan = $record->keterangan;
                $newRecord->total = $record->total;
                $newRecord->save();
            };

        };
        // dd($totalsemuadeposit);
        $datkatkamar = Kategori_Kamar::all();
        $dtkattrans = Kategori_Transaksi::all();
        $dthargakamar= harga_kamar::all();
        $dtmetbayar = metodebayar::all();
        $tgl = $now->year.$now->month.$now->day;
        $cek = transaksi::count();
        // dd($now);
        if ($cek==0){
            $urut = 10000001;
            $notransaksi = 'Trx-'.$tgl.$id.$urut;
            // dd($notransaksi);
        }else{
            $terakhir = transaksi::all()->last();
            $urut = (int)substr($terakhir->id_transaksi, -8) +1;
            $notransaksi = 'Trx-'.$tgl.$id.$urut;
            // dd($notransaksi);
        }
        $datakattambahan = Kategori_Tambahan::all();
        $sementaratambahan = sementara_tambahan::with('Kategori_Tambahan')->get();
        $sementara_transaksi = sementara_transaksi::all();
        $datatamu = tamu::all();
        return view('Room.input_checkin',compact('id','dtaturkat','dtkattrans','datkatkamar','dthargakamar','tgl','notransaksi',
        'datakattambahan','sementaratambahan','datatamu','sementara_transaksi','datasudahbooking','totalsemuadeposit',
        'tglcheckout','grandtotal','carisemua','totalsemuaharus','jumlahhari','dtmetbayar'));
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
    public function update_data_reservasi(Request $request)
    {
        $id_transaksi = $request->id_transaksi;
        $statustamu = $request->statustamu;
        $jumlahtamu = $request->jumlahtamu;
        $allRows = sementara_transaksi::all();

        foreach ($allRows as $row) {
            $row->update(['id_transaksi' => $id_transaksi]);
            $row->update(['statustamu' => $statustamu]);
            $row->update(['jumlahtamu' => $jumlahtamu]);
        }
        return response()->json($allRows);
    }
    public function ambilhargatambahan(Request $request)
    {
        // dd($request->all());
        $target = DB::table('kategori_tambahans');
        $idkattambahan = $request->id_kategori_tambahan;
        $row = $target->where("id",$idkattambahan)->first();
        if (!empty($row)){
            return response()->json(compact("row"));
        }
    }

    public function tambah_sementara_tambahan(Request $request)
    {
        $simpan_sementara_tambahan=sementara_tambahan::create([
            'id_transaksi' => $request->id_transaksi,
            'id_kategori_tambahan' => $request->id_kategori_tambahan,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan_tambahan,
            'total' => $request->total_tambahan,
        ]);
        $mainTableData = Kategori_Tambahan::findorfail($simpan_sementara_tambahan->id_kategori_tambahan);
        // dd($mainTableData);
        $kategoritambahan = $mainTableData->nama;
        $total_semua_tambahan = sementara_tambahan::sum('total');
        $response = [
            'total_semua_tambahan' => $total_semua_tambahan,
            'id' =>$simpan_sementara_tambahan->id ,
            'id_kategori_tambahan' =>$kategoritambahan,
            'keterangan'=> $simpan_sementara_tambahan->keterangan ,
            'jumlah'=> $simpan_sementara_tambahan->jumlah ,
            'total'=> $simpan_sementara_tambahan->total ,
        ];
        return response()->json($response);
    }

    public function kurang_sementara_tambahan(Request $request)
    {
        // alert($id);
        // dd($id);
        $id = $request->id;
        $row = sementara_tambahan::findOrFail($id);
        $row->delete();
        $total_semua_tambahan = sementara_tambahan::sum('total');
        $response = [
            'total_semua_tambahan' => $total_semua_tambahan,
            'success' => true,
        ];
        // Return a JSON response indicating success
        return response()->json($response);
    }

    public function sementara(Request $request)
    {
        // dd($request->all());
        $simpan_sementara=sementara_transaksi::create([
            'id_transaksi' => $request->id_transaksi,
            'booking'=> $request->booking,
            'checkin'=> $request->checkin,
            'checkout'=> $request->checkout,
            'id_nokamar'=> $request->id_nokamar,
            'nama'=> $request-> nama,
            'statustamu'=> $request->statustamu,
            'id_kategori_kamar'=> $request->id_kategori_kamar,
            'id_kategori_transaksi'=> $request->id_kategori_transaksi,
            'jumlahtamu'=> $request->jumlahtamu,
            'hargakamar'=> $request->hargakamar,
            'deposit'=> $request->deposit,
            'diskon'=> $request->diskon,
            'keterangan'=>$request->keterangan,
            'total'=> $request->grandtotal,
        ]);
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
            $dataterakhir = sementara_transaksi::all()->last();
            $dataterakhir->delete();
            return response()->json(['message' => 'Berhasil Kurang Hari!']);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $noktp = $request->noktp;
        $id_booking = $request->id_booking;
        $id = $request->nokamar;
        $id_transaksi = $request->notransaksi;
        $nama = $request->nama;
        $alamat = $request->alamat;
        $nohp = $request->nohp;
        $idkattrans =$request->id_kategori_transaksi;
        $jumlahtamu = $request->jmlhorang;
        $statustamu = $request->jenistamu;
        $metodebayar = $request->metodebayar;
        $now = Carbon::now();
        $hariini =$now->format('Y-m-d');
        $checkdatacheckin = sementara_transaksi::where('id_nokamar',$id)->get()->count();
        // dd($checkdatacheckin);
        if($checkdatacheckin==0){
            $response = [
                'success' => true,
                'message' => 'Tidak Ada Data Checkin !',
                'redirect' => route('checkin.input_checkin', $id) // Replace 'home' with the desired route name or URL
            ];
    
            return response()->json($response);
        }
        // dd($request->id_transaksinotransaksi);
        $sementara = sementara_transaksi::all();
        foreach ($sementara as $record) {
            $newRecord = new transaksi();
            $newRecord->id_transaksi = $record->id_transaksi;
            $newRecord->booking = $record->booking;
            $newRecord->checkin = $record->checkin;
            $newRecord->checkout = $record->checkout;
            $newRecord->id_nokamar = $record->id_nokamar;
            $newRecord->nama = $record->nama;
            $newRecord->statustamu = $record->statustamu;
            $newRecord->id_kategori_transaksi = $record->id_kategori_transaksi;
            $newRecord->id_kategori_kamar = $record->id_kategori_kamar;
            $newRecord->jumlahtamu = $record->jumlahtamu;
            $newRecord->hargakamar = $record->hargakamar;
            // $newRecord->deposit = $record->column13;
            $newRecord->diskon = $record->diskon;
            $newRecord->id_metodebayar = $metodebayar;
            $newRecord->keterangan = $record->keterangan;
            $newRecord->total = $record->total;
            $newRecord->save();
        }
        //hapus tabel sementara
        sementara_transaksi::truncate();
        status_kamar::create([
            'id'=>$id,
            'id_transaksi'=>$id_transaksi,
            'status'=>'1',
            'nama'=>$nama,
            'nohp'=>$nohp,
            'id_kategori_transaksi'=>$idkattrans,
            'jumlahtamu'=>$jumlahtamu,
            'statustamu'=>$statustamu,
        ]);

        $cari_row_booking = reservasi::where('id_booking',$id_booking)->get();
        foreach ($cari_row_booking as $row) {
            $row->update(['harusdibayar' => 0]);
            $row->update(['id_transaksi' => $id_transaksi]);
            $row->update(['tgl_bayar' => $hariini]);
        }
        
        $cekdatatamu = tamu::where('nik',$noktp)->get()->count();
        if($cekdatatamu==0){
            tamu::create([
                'nik'=>$noktp,
                'nama'=>$nama,
                'alamat'=>$alamat,
                'no_hp'=>$nohp,
            ]);
        }
        $response = [
            'success' => true,
            'message' => 'Berhasil Checkin',
            'redirect' => route('checkin') // Replace 'home' with the desired route name or URL
        ];

        return response()->json($response);
    }
    public function update_tgl_lunas(Request $request)
    {
        $now = Carbon::now();
        $hariini =$now->format('Y-m-d');
        $cari_row_booking = reservasi::where('id_booking',$id_booking)->get();
        foreach ($cari_row_booking as $row) {
            $row->update(['harusdibayar' => 0]);
            $row->update(['id_transaksi' => $id_transaksi]);
            $row->update(['tgl_bayar' => $hariini]);
        }
        return response()-json($response);
    }
    public function checkout(Request $request)
    {
            // Retrieve the record you want to update
        $id = $request->id;
        $data = status_kamar::findorfail($id); // Replace $id with the actual record ID
        $data->delete();
        status_kamar::create([
            'id'=>$id,
            'status'=>'2',
        ]);
        return response()->json([
            'message' => 'Berhasil Checkout Kamar: '.$id,
            'redirect_url' => route('checkin')]);
    }

    public function ambildatacheckout(Request $request)
    {
        // dd($request->all());
        $target = DB::table('transaksis');
        $notransaksi = $request->id_transaksi;
        $row = $target->where("id_transaksi",$notransaksi)->get();
        return response()->json($row);
    }

    public function kamar_ready(Request $request)
    {
        $id=$request->id;
        $bersih = status_kamar::findorfail($id);
        $bersih->delete();

        return redirect('checkin')->with('toast_success','Data Berhasil Merubah Status Kamar!');
    }
    public function data_transaksi()
    {
        $data_transaksi = checkin::with('Kategori_Transaksi')->get();
        return view('Room.data_transaksi',compact('data_transaksi'));
    }
}