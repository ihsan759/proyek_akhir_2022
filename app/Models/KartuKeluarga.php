<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;
    use Search;

    protected $guarded = ['id_kk'];

    protected $table = "kartu_keluarga";

    protected $searchable = [
        'rt',
        'rw',
    ];

    public function kk()
    {
        return $this->hasMany(Warga::class, 'id_kk', 'nik');
    }
}
