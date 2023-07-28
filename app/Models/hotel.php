<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    protected $table = 'hotels';
    protected $primarykey ='id'; 
    protected $fillable = [
        'id',
        'nama_hotel',
        'alamat_hotel',
        'nohp_hotel',
        'email_hotel'
    ];
    public $timestamps= false;
    public function role()
    {
        return $this->hasMany(role::class,'id');
    }
    public function user()
    {
        return $this->hasMany(user::class,'id_hotel');
    }
}
