<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aturkamar extends Model
{
    protected $table = 'kamars';  
    protected $fillable = [
        'id','no_kamar','id_kategori_kamar'];

    public $timestamps = false;

    public function Kategori_Kamar()
    {
        return $this->belongsTo(Kategori_Kamar::class,'id_kategori_kamar');
    }

    public function checkin()
    {
        return $this->hasMany(checkin::class,'id_nokamar');
    }
}
