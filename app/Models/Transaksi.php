<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Anggota;
use App\Models\Buku;

class Transaksi extends Model
{
    protected $fillable = ['anggota_id', 'buku_id', 'tglpinjam', 'tglkembali'];

    protected $casts = [
        'tglpinjam' => 'datetime',
        'tglkembali' => 'datetime',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
