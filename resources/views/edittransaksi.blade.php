<!-- resources/views/transaksi/edit.blade.php -->
<x-layout title="Edit Transaksi">
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md border border-gray-200 mt-10">
        <h1 class="text-3xl font-bold text-indigo-700 mb-6">✏️ Edit Transaksi</h1>

        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="anggota_id" class="block font-medium">Anggota</label>
                <select name="anggota_id" id="anggota_id" required class="w-full border px-3 py-2 rounded">
                    <option value="">-- Pilih Anggota --</option>
                    @foreach ($anggotas as $anggota)
                        <option value="{{ $anggota->id }}" {{ old('anggota_id', $transaksi->anggota_id) == $anggota->id ? 'selected' : '' }}>
                            {{ $anggota->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="buku_id" class="block font-medium">Buku</label>
                <select name="buku_id" id="buku_id" required class="w-full border px-3 py-2 rounded">
                    <option value="">-- Pilih Buku --</option>
                    @foreach ($bukus as $buku)
                        <option value="{{ $buku->id }}" {{ old('buku_id', $transaksi->buku_id) == $buku->id ? 'selected' : '' }}>
                            {{ $buku->judul_buku }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="tglpinjam" class="block font-medium">Tanggal Pinjam</label>
                <input type="date" name="tglpinjam" id="tglpinjam" value="{{ old('tglpinjam', $transaksi->tglpinjam->format('Y-m-d')) }}" required
                       class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label for="tglkembali" class="block font-medium">Tanggal Kembali</label>
                <input type="date" name="tglkembali" id="tglkembali" value="{{ old('tglkembali', optional($transaksi->tglkembali)->format('Y-m-d')) }}"
                       class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</x-layout>
