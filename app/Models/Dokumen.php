<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokumen extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "dokumen";

    protected $guarded = ['id'];

    public function dokumen()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function dokumenAdmin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }
}
