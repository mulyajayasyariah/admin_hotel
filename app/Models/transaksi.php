<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksis';  
    protected $primarykey ='id';
    protected $fillable = [
        'id','id_transaksi','booking','checkin','checkout','id_no_kamar','nama','statustamu','id_kategori_transaksi',
        'id_kategori_kamar','jumlahtamu','hargakamar','deposit','diskon','total',
        'id_metodebayar','id_hotel'];
    public function kategori_transaksi()
    {
        return $this->belongsTo(Kategori_Transaksi::class,'id_kategori_transaksi');
    }
}
