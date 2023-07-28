<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metodebayar extends Model
{
    protected $table = 'metodebayars';
    protected $primarykey ='id'; 
    protected $fillable = [
        'id',
        'nama'
    ];
    public function reservasi()
    {
        return $this->hasMany(reservasi::class,'id_metodebayar');
    }
    public function sementara_reservasi()
    {
        return $this->hasMany(sementara_reservasi::class,'id_metodebayar');
    }
}
