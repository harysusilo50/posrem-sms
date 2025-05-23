<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyuluhan extends Model
{
    use HasFactory;

    protected $append = ['format_created_at', 'format_deskripsi','format_image','format_topik','format_deskripsi_artikel'];

    public function getFormatImageAttribute()
    {
        return asset('/storage/'.$this->kategori.'/' . $this->image);
    }

    public function getFormatCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->isoFormat('dddd, D MMMM Y');
    }

    public function getFormatDeskripsiAttribute()
    {
        $text = strip_tags($this->attributes['deskripsi']);

        if (!$text) {
            return null;
        }

        return mb_strlen($text) > 45 ? mb_substr($text, 0, 45) . '...' : $text;
    }

    public function getFormatDeskripsiArtikelAttribute()
    {
        $text = strip_tags($this->attributes['deskripsi']);

        if (!$text) {
            return null;
        }

        return mb_strlen($text) > 70 ? mb_substr($text, 0, 70) . '...' : $text;
    }

    public function getFormatTopikAttribute()
    {
        $text = strip_tags($this->attributes['topik']);

        if (!$text) {
            return null;
        }

        return mb_strlen($text) > 45 ? mb_substr($text, 0, 45) . '...' : $text;
    }
}
