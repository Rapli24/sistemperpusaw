<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Menampilkan daftar semua buku.
     */
    public function index()
    {
        $bukus = Buku::all();
        return view('daftarbuku', compact('bukus'));
    }

    /**
     * Menampilkan form untuk menambahkan buku baru.
     */
    public function create()
    {
        $bukus = Buku::all();
         return view('tambahbuku', compact('bukus'));
    }

    /**
     * Simpan buku baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required|string',
            'kategori' => 'required|string',
            'pengarang' => 'required|string',
            'penerbit' => 'required|string',
            'status' => 'required|string',
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail buku tertentu (opsional).
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Menampilkan form edit buku.
     */
    public function edit(Buku $buku)
    {
        return view('editbuku', compact('buku'));
    }

    /**
     * Update data buku.
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
          'judul_buku' => 'required|string',
            'kategori' => 'required|string',
            'pengarang' => 'required|string',
            'penerbit' => 'required|string',
            'status' => 'required|string',
        ]);

        $buku->update($request->all());

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Hapus buku.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
