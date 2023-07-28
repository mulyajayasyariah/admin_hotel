<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class harga_kamar extends Model
{
    protected $table = 'harga_kamars';  
    protected $primarykey ='id';
    protected $fillable = [
        'id','id_kategori_kamar','id_kategori_transaksi','harga'];

    public function kategori_kamar()
    {
        return $this->belongsTo(Kategori_Kamar::class,'id_kategori_kamar');
    }

    public function kategori_transaksi()
    {
        return $this->belongsTo(Kategori_Transaksi::class,'id_kategori_transaksi');
    }

    public function checkin()
    {
        return $this->hasMany(checkin::class,'id_kategori_kamar');
    }
}
