<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Tampilkan daftar seluruh anggota.
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view('daftaranggota', compact('anggota'));
    }

    /**
     * Tampilkan form untuk menambahkan anggota baru.
     */
    public function create()
    {
        return view('tambahanggota');
    }

    /**
     * Simpan data anggota baru.
     */
    public function store(Request $request)
    {
        $request->validate([
           'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'status' => 'required|string',
        ]);

        Anggota::create($request->all());

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail anggota tertentu.
     */
    public function show(Anggota $anggota)
    {
        return view('anggota.show', compact('anggota'));
    }

    /**
     * Tampilkan form edit untuk anggota tertentu.
     */
    public function edit(Anggota $anggota)
    {
        return view('editanggota', compact('anggota'));
    }

    /**
     * Update data anggota.
     */
    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'status' => 'required|string',
        ]);

        $anggota->update($request->all());

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diperbarui.');
    }

    /**
     * Hapus data anggota.
     */
    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }
}
