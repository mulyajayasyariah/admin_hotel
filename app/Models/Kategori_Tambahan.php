<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_Tambahan extends Model
{
    protected $table = 'Kategori_Tambahans';  
    protected $primarykey ='id';
    protected $fillable = [
        'id','nama','harga'];
    public function Datatambahan()
    {
        return $this->hasMany(Datatambahan::class,'id_kategori_tambahan');
    }
    public function sementara_tambahan()
    {
        return $this->hasMany(sementara_tambahan::class,'id_kategori_tambahan');
    }
    public function checkin()
    {
        return $this->hasMany(checkin::class,'id_kategori_tambahan');
    }
}
