<x-layout title="Tambah Transaksi">
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md border border-gray-200">
        <h1 class="text-3xl font-bold text-indigo-700 mb-6">➕ Tambah Transaksi Baru</h1>

        @if ($errors->any())
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('transaksi.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="anggota_id" class="block font-medium text-gray-700 mb-1">ID Anggota</label>
                <select name="anggota_id" id="anggota_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    <option value="">-- Pilih Anggota --</option>
                    @foreach ($anggotas as $anggota)
                        <option value="{{ $anggota->id }}" {{ old('anggota_id') == $anggota->id ? 'selected' : '' }}>
                            {{ $anggota->id }} - {{ $anggota->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="buku_id" class="block font-medium text-gray-700 mb-1">ID Buku</label>
                <select name="buku_id" id="buku_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    <option value="">-- Pilih Buku --</option>
                    @foreach ($bukus as $buku)
                        <option value="{{ $buku->id }}" {{ old('buku_id') == $buku->id ? 'selected' : '' }}
                            {{ $buku->status !== 'tersedia' ? 'disabled' : '' }}>
                            {{ $buku->id }} - {{ $buku->judul_buku }} 
                            {{ $buku->status !== 'tersedia' ? '(Tidak Tersedia)' : '' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="tglpinjam" class="block font-medium text-gray-700 mb-1">Tanggal Pinjam</label>
                <input type="date" name="tglpinjam" id="tglpinjam" value="{{ old('tglpinjam', date('Y-m-d')) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required>
            </div>

            <div>
                <label for="tglkembali" class="block font-medium text-gray-700 mb-1">Tanggal Kembali</label>
                <input type="date" name="tglkembali" id="tglkembali" value="{{ old('tglkembali', date('Y-m-d', strtotime('+7 days'))) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required>
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-indigo-600 text-white font-semibold py-2 rounded hover:bg-indigo-700 transition">
                    Simpan Transaksi
                </button>
            </div>
        </form>
    </div>
</x-layout>
