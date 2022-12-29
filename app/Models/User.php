<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'no_hp',
        'rt',
        'rw',
        'role',
        'email',
        'password'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'id_user');
    }

    public function dokumenAdmin()
    {
        return $this->hasMany(Dokumen::class, 'id_admin');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (User $user) {
            $user->password = Hash::make($user->password);
        });

        static::updating(function (User $user) {
            if ($user->isDirty(["password"])) {
                $user->password = Hash::make($user->password);
            }
        });
    }
}
