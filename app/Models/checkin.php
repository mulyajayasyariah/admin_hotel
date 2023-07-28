<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkin extends Model
{
    protected $table = 'transaksis';  
    protected $primarykey ='id';
    protected $fillable = [
        'id','id_transaksi','booking','checkin','checkout','id_nokamar','nama','statustamu',
        'id_kategori_kamar','id_kategori_transaksi','jumlahtamu','hargakamar','deposit',
        'diskon','total','id_hotel','iduser'];

    public function aturkamar()
    {
        return $this->belongsTo(aturkamar::class,'id_nokamar');
    }

    public function harga_kamar()
    {
        return $this->belongsTo(harga_kamar::class,'id_kategori_kamar');
    }
    public function datatambahan()
    {
        return $this->belongsTo(Datatambahan::class,'id_transaksi');
    }
    public function sementara_tambahan()
    {
        return $this->hasMany(sementara_tambahan::class,'id_transaksi');
    }
    public function status_kamar()
    {
        return $this->belongsTo(status_kamar::class,'id','status');
    }
    public function Kategori_Transaksi()
    {
        return $this->belongsTo(Kategori_Transaksi::class,'id_kategori_transaksi');
    }
    public function Kategori_Tambahan()
    {
        return $this->belongsTo(Kategori_Tambahan::class,'id_kategori_tambahan');
    }

}
