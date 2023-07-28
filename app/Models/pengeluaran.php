<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengeluaran extends Model
{
    protected $table ="pengeluarans";
    protected $primarykey ='id';
    protected $fillable = [
        'id','tgl','id_kategori','keterangan','id_transaksi','total'];
    
    public function Kategori_Pengeluaran()
    {
        return $this->belongsTo(Kategori_Pengeluaran::class,'id_kategori');
    }
    public function Kategori_transaksikeluar()
    {
        return $this->belongsTo(Kategori_transaksikeluar::class,'id_transaksi');
    }
    public function User()
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
