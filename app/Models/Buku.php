<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'bukus'; // sesuaikan dengan nama tabel database

    protected $fillable = [
        'judul_buku',
        'kategori',
        'pengarang',
        'penerbit',
        'status',
    ];
    public function transaksis()
{
    return $this->hasMany(Transaksi::class);
}
}
