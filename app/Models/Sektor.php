<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sektor extends Model
{
    // Jika nama tabel Anda di database adalah 'sektors', baris ini bisa dihapus
    protected $table = 'sektors'; 
    protected $fillable = ['nama_sektor'];

    public function peluang()
    {
        return $this->hasMany(Peluang::class, 'sektor_id');
    }
}