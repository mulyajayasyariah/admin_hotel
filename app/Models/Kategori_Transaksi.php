<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_Transaksi extends Model
{
    protected $table = 'kategori_transaksis';
    protected $primarykey ='id';
    protected $fillable = [
        'id','nama_transaksi'];

    public function harga_kamar()
    {
        return $this->hasMany(harga_kamar::class,'id_kategori_transaksi');
    }
    
    public function transaksi()
    {
        return $this->hasMany(transaksi::class,'id_kategori_transaksi');
    }

    public function checkin()
    {
        return $this->hasMany(checkin::class,'id_kategori_transaksi');
    }

    public function sementara_transaksi()
    {
        return $this->hasMany(sementara_transaksi::class,'id_kategori_transaksi');
    }
    public function status_kamar()
    {
        return $this->hasMany(status_kamar::class,'id_kategori_transaksi');
    }
    public function data_reservasi()
    {
        return $this->hasMany(reservasi::class,'id_kategori_transaksi');
    }

}
