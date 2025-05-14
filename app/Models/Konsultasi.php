<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;
    protected $append = ['format_tgl_Konsultasi'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id', 'id');
    }

    public function getFormatTglKonsultasiAttribute()
    {
        return Carbon::parse($this->attributes['tgl_Konsultasi'])->isoFormat('dddd, D MMMM Y');
    }
}
