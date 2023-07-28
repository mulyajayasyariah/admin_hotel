<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_Kamar extends Model
{
    protected $table = 'kategori_kamars';
    protected $primarykey ='id';
    protected $fillable = [
        'id','jenis_kamar','jenis_ranjang','jumlahkamar'];
    
    public function harga_kamar()
    {
        return $this->hasMany(harga_kamar::class,'id_kategori_kamar');
    }

    public function aturkamar ()
    {
        return $this->hasMany(aturkamar::class,'id_kategori_kamar');
    }
}
