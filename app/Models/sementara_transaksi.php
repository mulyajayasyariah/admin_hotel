<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sementara_transaksi extends Model
{
    protected $table = 'sementara_transaksis';  
    protected $primarykey ='id';
    protected $fillable = [
        'id','id_transaksi','booking','checkin','checkout','id_nokamar','nama','statustamu','id_kategori_transaksi',
        'id_kategori_kamar','jumlahtamu','hargakamar','deposit','diskon','keterangan','total'];
        
    public function Kategori_Transaksi()
    {
        return $this->belongsTo(Kategori_Transaksi::class,'id_kategori_transaksi');
    }
        
        public $timestamps= false;
}
