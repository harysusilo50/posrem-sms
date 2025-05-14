<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKesehatan extends Model
{
    use HasFactory;
    protected $append = ['format_tgl_pemeriksaan'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function kader()
    {
        return $this->belongsTo(User::class, 'kader_id', 'id');
    }

    public function getFormatTglPemeriksaanAttribute()
    {
        return Carbon::parse($this->attributes['tgl_pemeriksaan'])->isoFormat('dddd, D MMMM Y');
        // return Carbon::parse($this->attributes['tanggal'])->isoFormat('dddd, D MMMM Y | HH:mm');
    }

}
