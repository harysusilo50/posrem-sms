<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $append = ['format_tgl_lahir', 'usia'];

    protected $fillable = ['nama', 'username', 'password', 'alamat', 'no_hp', 'role', 'tgl_lahir', 'jabatan', 'role', 'jenis_kelamin'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFormatTglLahirAttribute()
    {
        return Carbon::parse($this->attributes['tgl_lahir'])->isoFormat('D MMMM Y');
    }

    public function getUsiaAttribute()
    {
        return Carbon::parse($this->attributes['tgl_lahir'])->age;
    }
}
