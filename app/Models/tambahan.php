<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambahan extends Model
{
    protected $table = 'tambahans';  
    protected $primarykey ='id';
    protected $fillable = [
        'id',
        'id_transaksi',
        'id_kategori',
        'jumlah',
        'keterangan',
        'total',
        'id_hotel',
        'id_user'];
}
