<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datatambahan extends Model
{
    protected $table = 'tambahans';  
    protected $primarykey ='id';
    protected $fillable = [
        'id','id_transaksi','id_kategori','jumlah','keterangan','total','id_user','id_hotel'];

    public function Kategori_Tambahan()
    {
        return $this->belongsTo(Kategori_Tambahan::class,'id_kategori_tambahan');
    }
    public function checkin()
    {
        return $this->hasMany(checkin::class,'id_transaksi');
    }
}
