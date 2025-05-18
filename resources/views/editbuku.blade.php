<x-layout title="Edit Buku">
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md border border-gray-200">
        <h1 class="text-3xl font-bold text-indigo-700 mb-6">✏️ Edit Buku</h1>

        <form action="{{ route('buku.update', $buku->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="judul_buku" class="block font-medium">Judul Buku</label>
                <input type="text" name="judul_buku" value="{{ old('judul_buku', $buku->judul_buku) }}" required
                    class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label for="kategori" class="block font-medium">Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori', $buku->kategori) }}" required
                    class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label for="pengarang" class="block font-medium">Pengarang</label>
                <input type="text" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}" required
                    class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label for="penerbit" class="block font-medium">Penerbit</label>
                <input type="text" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" required
                    class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label for="status" class="block font-medium">Status</label>
                <select name="status" required class="w-full border px-3 py-2 rounded">
                    <option value="tersedia" {{ $buku->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="dipinjam" {{ $buku->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                </select>
            </div>

            <div>
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</x-layout>
