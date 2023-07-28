<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_Pengeluaran extends Model
{
    protected $table = 'Kategori_Pengeluarans';  
    protected $primarykey ='id';
    protected $fillable = [
        'id','nama'];

    public function pengeluaran()
    {
        return $this->hasMany(pengeluaran::class,'id_kategori','nama');
    }
}
