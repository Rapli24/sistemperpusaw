<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggotas'; // sesuaikan dengan nama tabel database

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'alamat',
        'status',
    ];
    public function transaksis()
{
    return $this->hasMany(Transaksi::class);
}
}
