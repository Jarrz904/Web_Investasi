<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeris';

    protected $fillable = [
        'judul',
        'kategori',
        'gambar'
    ];

    // Accessor untuk mempermudah pemanggilan URL gambar di Blade
    public function getSrcAttribute()
    {
        return $this->gambar ? asset('storage/' . $this->gambar) : asset('images/default-galeri.jpg');
    }
}