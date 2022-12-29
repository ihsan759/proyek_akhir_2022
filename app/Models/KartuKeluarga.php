<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "kartu_keluarga";

    public function kk()
    {
        return $this->hasMany(Warga::class, 'id_kk', 'id_kk');
    }
}
