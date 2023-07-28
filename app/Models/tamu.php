<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tamu extends Model
{
    protected $table = 'tamus';  
    protected $primarykey ='id';
    protected $fillable = [
        'id',
        'nik',
        'nama',
        'alamat',
        'no_hp'
    ];
}
