<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sementara_tambahan extends Model
{
    protected $table = 'sementara_tambahans';  
    protected $primarykey ='id';
    protected $fillable = [
        'id',
        'id_transaksi',
        'id_kategori_tambahan',
        'jumlah',
        'keterangan',
        'total',
        'id_hotel',
        'id_user'
    ];
    public $timestamps= false;

    public function datatambahan()
    {
        return $this->belongsTo(Datatambahan::class,'id_kategori');
    }
    public function checkin()
    {
        return $this->belongsTo(checkin::class,'id_transaksi');
    }
    public function Kategori_Tambahan()
    {
        return $this->belongsTo(Kategori_Tambahan::class,'id_kategori_tambahan');
    }
}
