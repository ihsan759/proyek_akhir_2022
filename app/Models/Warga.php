<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "warga";

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama', 'nik');
    }

    public function kk()
    {
        return $this->belongsTo(KartuKeluarga::class, 'id_kk', 'nik');
    }
}
