<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class role extends Model
{
    protected $table = 'roles';  
    protected $primarykey ='id';
    protected $fillable = [
        'id',
        'nama'
    ];
    public function hotel()
    {
        return $this->belongsTo(hotel::class,'id_hotel');
    }
    public function user()
    {
        return $this->hasMany(user::class,'id_role');
    }
}
