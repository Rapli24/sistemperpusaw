<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Transaksi;

class Index extends Controller
{
    public function index()
    {
        $totalBooks = Buku::count();
        $totalMembers = Anggota::count();
        $todayTransactions = Transaksi::whereDate('created_at', now()->toDateString())->count();

        // ⛳️ Pastikan nama view-nya sesuai
        return view('index', compact('totalBooks', 'totalMembers', 'todayTransactions'));
    }
}



