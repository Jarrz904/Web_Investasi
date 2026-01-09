<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peluang extends Model
{
    use HasFactory;

    // Menentukan nama tabel (opsional, jika nama tabel Anda 'peluangs')
    protected $table = 'peluangs';

    protected $fillable = [
        'nama_proyek', 
        'sektor_id', // Menggunakan ID untuk relasi
        'kecamatan_id', // Menggunakan ID untuk relasi
        'lokasi', 
        'lat', 
        'lng', 
        'nilai_investasi', 
        'deskripsi', 
        'gambar', 
        'status'
    ];

    /**
     * Casts: Mengubah format data secara otomatis saat diakses.
     */
    protected $casts = [
        'nilai_investasi' => 'integer',
        'lat' => 'double',
        'lng' => 'double',
    ];

    /**
     * Appends: Memastikan Accessor muncul saat model diubah menjadi Array/JSON (untuk kebutuhan Peta)
     */
    protected $appends = ['format_rupiah', 'image_url'];

    /**
     * RELASI: Peluang dimiliki oleh satu Sektor
     */
    public function sektor()
    {
        return $this->belongsTo(Sektor::class, 'sektor_id');
    }

    /**
     * RELASI: Peluang berada di satu Kecamatan
     */
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    /**
     * Accessor: Mempermudah Controller menampilkan format Rupiah di View.
     * Contoh penggunaan di Blade: {{ $item->format_rupiah }}
     */
    public function getFormatRupiahAttribute()
    {
        return 'Rp ' . number_format($this->nilai_investasi, 0, ',', '.');
    }

    /**
     * Accessor: Memastikan jika gambar kosong, akan muncul gambar default.
     */
    public function getImageUrlAttribute()
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        }
        return asset('images/default-proyek.jpg');
    }
}