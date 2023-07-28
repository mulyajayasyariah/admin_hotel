<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sementara_reservasi extends Model
{
    protected $table = 'sementara_reservasis';  
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
    ];
    public function metodebayar()
    {
        return $this->belongsTo(metodebayar::class,'id_metodebayar');
    }
        
    public $timestamps= false;
}
