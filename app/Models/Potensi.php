<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Potensi extends Model
{
    use HasFactory;

    // Menentukan kolom yang boleh diisi secara massal
    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'deskripsi_singkat',
        'konten_lengkap',
        'gambar',
        'lokasi_kecamatan',
    ];

    /**
     * Boot function untuk otomatis membuat slug saat judul diisi
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($potensi) {
            $potensi->slug = Str::slug($potensi->judul);
        });
    }
}