<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $table = "agama";

    public function agama()
    {
        return $this->hasMany(Warga::class, 'id_agama');
    }
}
