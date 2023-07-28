<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    protected $table = 'reservasis';  
    protected $primarykey ='id';
    protected $fillable = [
        'id',
        'id_booking',
        'booking',
        'checkin',
        'checkout',
        'nokamar',
        'id_kategori_transaksi',
        'nama',
        'nohp',
        'subtotal',
        'diskon',
        'total',
        'dp',
        'id_metodebayar',
        'harusdibayar',
        'keterangan',
        'created_at',
    ];
    public function metodebayar()
    {
        return $this->belongsTo(metodebayar::class,'id_metodebayar');
    }
    public function Kategori_Transaksi()
    {
        return $this->belongsTo(Kategori_Transaksi::class,'id_kategori_transaksi');
    }
}
