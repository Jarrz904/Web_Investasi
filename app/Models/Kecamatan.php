<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    // Jika nama tabel Anda di database adalah 'kecamatans', baris ini bisa dihapus
    protected $table = 'kecamatans';
    protected $fillable = ['nama_kecamatan'];

    public function peluang()
    {
        return $this->hasMany(Peluang::class, 'kecamatan_id');
    }
}