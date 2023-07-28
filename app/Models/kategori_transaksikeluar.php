<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_transaksikeluar extends Model
{
    protected $table = 'kategori_transaksikeluars';  
    protected $primarykey ='id';
    protected $fillable = [
        'id','nama'];
    public function pengeluaran()
    {
        return $this->hasMany(pengeluaran::class,'id_transaksi');
    }
}
