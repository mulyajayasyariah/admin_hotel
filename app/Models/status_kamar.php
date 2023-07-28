<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status_kamar extends Model
{
    protected $table = 'status_kamars';  
    // protected $primarykey ='id';
    protected $fillable = [
    'id',
    'id_transaksi',
    'status',
    'nama',
    'nohp',
    'id_kategori_transaksi',
    'jumlahtamu',
    'statustamu'
    ];
    public $timestamps = false;

    public function checkin()
    {
        return $this->hasMany(checkin::class,'id','status');
    }
    
    public function Kategori_Transaksi()
    {
        return $this->belongsTo(Kategori_Transaksi::class,'id_kategori_transaksi');
    }
}
