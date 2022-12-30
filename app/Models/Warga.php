<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;
    use Search;

    protected $guarded = ['nik'];

    protected $table = "warga";

    protected $searchable = [
        'nama',
        'nik',
    ];

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama');
    }

    public function kk()
    {
        return $this->belongsTo(KartuKeluarga::class, 'id_kk', 'id_kk');
    }
}
