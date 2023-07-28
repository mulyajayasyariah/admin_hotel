<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\DataTambahanController;
use App\Http\Controllers\kategori_pengeluaranController;
use App\Http\Controllers\Kategori_TransaksiKeluarController;
use App\Http\Controllers\kategori_tambahanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\Kategori_KamarController;
use App\Http\Controllers\Harga_KamarController;
use App\Http\Controllers\DataTransaksiController;
use App\Http\Controllers\AturKamarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Kategori_OtaController;
use App\Http\Controllers\Kategori_TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\TriggerController;
use App\Http\Controllers\MetodeBayarController;
use App\Models\Kategori_Transaksi;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('manajemenakun','tampil')->name('tampil');
    Route::get('register','register')->name('register');
    Route::post('register','registerSimpan')->name('register.simpan');
    Route::get('useredit/{id}','useredit')->name('user.edit');
    Route::post('useredit/{id}','userupdate')->name('user.edit.update');
    Route::get('userhapus/{id}','userhapus')->name('user.hapus');
    Route::get('tambahhotel','tambahhotel')->name('tambah.hotel');
    Route::post('tambahhotelSimpan','tambahhotelSimpan')->name('tambah.hotel.simpan');
    Route::get('hoteledit/{id}','hoteledit')->name('hotel.edit');
    Route::post('hoteledit/{id}','hotelupdate')->name('hotel.edit.update');
    Route::get('hotelhapus/{id}','hotelhapus')->name('hotel.hapus');
    Route::get('tambahrole','tambahrole')->name('tambah.role');
    Route::post('tambahroleSimpan','tambahroleSimpan')->name('tambah.role.simpan');
    Route::get('roleedit/{id}','roleedit')->name('role.edit');
    Route::post('roleedit/{id}','roleupdate')->name('role.edit.update');
    Route::get('rolehapus/{id}','rolehapus')->name('role.hapus');

    Route::get('login','login')->name('login');
    Route::post('login','loginAksi')->name('login.aksi');

    Route::get('logout','logout')-> middleware('auth')->name('logout');
});


Route::middleware('auth')->group(function(){
    

    Route::controller(DashboardController::class)->prefix('dashboard')->group(function(){
    Route::get('','dashboard')->name('dashboard');
    });

    Route::controller(ReservasiController::class)->prefix('reservasi')->group(function(){
        Route::get('','reservasi')->name('reservasi');
        Route::get('input_reservasi','input_reservasi')->name('reservasi.input_reservasi');
        Route::get('ambil_data','ambil_data_kamar')->name('reservasi.ambil_data');
        Route::post('input_reservasi/sementara','sementara')->name('reservasi.tambah.sementara');
        Route::get('hapussementara','kurang_sementara')->name('reservasi.kurang.sementara');
        Route::get('hitung_semua','hitung_semua')->name('reservasi.hitung_semua');
        Route::post('input_reservasi/simpan','store')->name('reservasi.simpan.data');
        Route::get('ambil_datakatkamar','ambildata_katkamar')->name('reservasi.ambil_data_katkamar');
        Route::post('ambilharga','ambilharga')->name('ambilharga');
        Route::get('data_reservasi','data_reservasi')->name('data_reservasi');
        Route::get('edit/{id}','edit')->name('data_reservasi.edit');
        Route::post('edit/{id}','update')->name('data_reservasi.edit.update');
        Route::get('hapus/{id}','hapus')->name('data_reservasi.hapus');
    });

    Route::controller(LaporanController::class)->prefix('laporan')->group(function(){
        Route::get('','laporan')->name('laporan');
    });
    
    Route::controller(CheckinController::class)->prefix('checkin')->group(function(){
        Route::get('','checkin')->name('checkin');
        Route::get('input_checkin/{id}','input_checkin')->name('checkin.input_checkin');
        Route::post('ambilharga','ambilharga')->name('ambilharga');
        Route::post('ambilhargatambahan','ambilhargatambahan')->name('ambilhargatambahan');
        Route::get('update_data_reservasi','update_data_reservasi')->name('checkin.update_data_reservasi');
        Route::get('update_tgl_lunas','update_tgl_lunas')->name('checkin.update_tgl_lunas');
        Route::post('tambah_sementara_tambahan','tambah_sementara_tambahan')->name('tambah_sementara_tambahan');
        Route::post('kurang_sementara_tambahan/','kurang_sementara_tambahan')->name('kurang_sementara_tambahan');
        Route::post('input_checkin/sementara','sementara')->name('checkin.tambah.sementara');
        Route::get('hapussementara','kurang_sementara')->name('kurang.sementara');
        Route::post('input_checkin/simpan','store')->name('checkin.simpan.data');
        Route::post('ambildatacheckout','ambildatacheckout')->name('checkout.ambildatacheckout');
        Route::post('input_checkout/simpan','checkout')->name('checkout.simpan');
        Route::get('kamar_ready/{id}','kamar_ready')->name('checkin.kamar_ready');
        Route::get('edit/{id}','edit')->name('checkin.edit');
        Route::post('edit/{id}','update')->name('checkin.edit.update');
        Route::get('hapus/{id}','hapus')->name('checkin.hapus');
        Route::get('data_transaksi','data_transaksi')->name('data_transaksi');
    });

    Route::controller(PengeluaranController::class)->prefix('pengeluaran')->group(function(){
        Route::get('','pengeluaran')->name('pengeluaran');
        Route::get('tambah','tambah')->name('pengeluaran.tambah');
        Route::post('tambah/simpan','store')->name('pengeluaran.tambah.simpan');
        Route::get('edit/{id}','edit')->name('pengeluaran.edit');
        Route::post('edit/{id}','update')->name('pengeluaran.edit.update');
        Route::get('hapus/{id}','hapus')->name('pengeluaran.hapus');
        Route::get('cetaklaporan','cetaklaporan')->name('pengeluaran.cetaklaporan');
        Route::get('filtertgl/{filterawal}/{filterakhir}','filtertgl')->name('pengeluaran.filtertgl');
    });

    Route::controller(Kategori_PengeluaranController::class)->prefix('Kategori_Pengeluaran')->group(function(){
        Route::get('','Kategori_Pengeluaran')->name('Kategori_Pengeluaran');
        Route::get('tambah','tambah')->name('Kategori_Pengeluaran.tambah');
        Route::post('tambah/simpan','store')->name('Kategori_Pengeluaran.tambah.simpan');
        Route::get('edit/{id}','edit')->name('Kategori_Pengeluaran.edit');
        Route::post('edit/{id}','update')->name('Kategori_Pengeluaran.edit.update');
        Route::get('hapus/{id}','hapus')->name('Kategori_Pengeluaran.hapus');
    });

    Route::controller(Kategori_TransaksiKeluarController::class)->prefix('Kategori_TransaksiKeluar')->group(function(){
        Route::get('','Kategori_TransaksiKeluar')->name('Kategori_TransaksiKeluar');
        Route::get('tambah','tambah')->name('Kategori_TransaksiKeluar.tambah');
        Route::post('tambah/simpan','store')->name('Kategori_TransaksiKeluar.tambah.simpan');
        Route::get('edit/{id}','edit')->name('Kategori_TransaksiKeluar.edit');
        Route::post('edit/{id}','update')->name('Kategori_TransaksiKeluar.edit.update');
        Route::get('hapus/{id}','hapus')->name('Kategori_TransaksiKeluar.hapus');
    });

    Route::controller(Kategori_TambahanController::class)->prefix('Kategori_Tambahan')->group(function(){
        Route::get('','Kategori_Tambahan')->name('Kategori_Tambahan');
        Route::get('tambah','tambah')->name('Kategori_Tambahan.tambah');
        Route::post('tambah/simpan','store')->name('Kategori_Tambahan.tambah.simpan');
        Route::get('edit/{id}','edit')->name('Kategori_Tambahan.edit');
        Route::post('edit/{id}','update')->name('Kategori_Tambahan.edit.update');
        Route::get('hapus/{id}','hapus')->name('Kategori_Tambahan.hapus');
    });

    Route::controller(DataTambahanController::class)->prefix('DataTambahan')->group(function(){
        Route::get('','DataTambahan')->name('DataTambahan');
        Route::get('tambah','tambah')->name('DataTambahan.tambah');
        Route::post('tambah/simpan','store')->name('DataTambahan.tambah.simpan');
        Route::get('edit/{id}','edit')->name('DataTambahan.edit');
        Route::post('edit/{id}','update')->name('DataTambahan.edit.update');
        Route::get('hapus/{id}','hapus')->name('DataTambahan.hapus');
    });

    Route::controller(AturKamarController::class)->prefix('AturKamar')->group(function(){
        Route::get('','AturKamar')->name('AturKamar');
        Route::get('tambah','tambah')->name('AturKamar.tambah');
        Route::post('tambah/simpan','store')->name('AturKamar.tambah.simpan');
        Route::get('edit/{id}','edit')->name('AturKamar.edit');
        Route::post('edit/{id}','update')->name('AturKamar.edit.update');
        Route::get('hapus/{id}','hapus')->name('AturKamar.hapus');
    });
    Route::controller(MetodeBayarController::class)->prefix('MetodeBayar')->group(function(){
        Route::get('','MetodeBayar')->name('MetodeBayar');
        Route::get('tambah','tambah')->name('MetodeBayar.tambah');
        Route::post('tambah/simpan','store')->name('MetodeBayar.tambah.simpan');
        Route::get('edit/{id}','edit')->name('MetodeBayar.edit');
        Route::post('edit/{id}','update')->name('MetodeBayar.edit.update');
        Route::get('hapus/{id}','hapus')->name('MetodeBayar.hapus');
    });
    Route::controller(Kategori_KamarController::class)->prefix('Kategori_Kamar')->group(function(){
        Route::get('','Kategori_Kamar')->name('Kategori_Kamar');
        Route::get('tambah','tambah')->name('Kategori_Kamar.tambah');
        Route::post('tambah/simpan','store')->name('Kategori_Kamar.tambah.simpan');
        Route::get('edit/{id}','edit')->name('Kategori_Kamar.edit');
        Route::post('edit/{id}','update')->name('Kategori_Kamar.edit.update');
        Route::get('hapus/{id}','hapus')->name('Kategori_Kamar.hapus');
    });
    Route::controller(Harga_KamarController::class)->prefix('Harga_Kamar')->group(function(){
        Route::get('','Harga_Kamar')->name('Harga_Kamar');
        Route::get('tambah','tambah')->name('Harga_Kamar.tambah');
        Route::post('tambah/simpan','store')->name('Harga_Kamar.tambah.simpan');
        Route::get('edit/{id}','edit')->name('Harga_Kamar.edit');
        Route::post('edit/{id}','update')->name('Harga_Kamar.edit.update');
        Route::get('hapus/{id}','hapus')->name('Harga_Kamar.hapus');
    });

    Route::controller(Kategori_TransaksiController::class)->prefix('Kategori_Transaksi')->group(function(){
        Route::get('','Kategori_Transaksi')->name('Kategori_Transaksi');
        Route::get('tambah','tambah')->name('Kategori_Transaksi.tambah');
        Route::post('tambah/simpan','store')->name('Kategori_Transaksi.tambah.simpan');
        Route::get('edit/{id}','edit')->name('Kategori_Transaksi.edit');
        Route::post('edit/{id}','update')->name('Kategori_Transaksi.edit.update');
        Route::get('hapus/{id}','hapus')->name('Kategori_Transaksi.hapus');
    });
});