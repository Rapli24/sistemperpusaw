<x-layout title="Tambah Buku">
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md border border-gray-200">
        <h1 class="text-3xl font-bold text-indigo-700 mb-6">➕ Tambah Buku Baru</h1>

        @if ($errors->any())
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('buku.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="judul_buku" class="block font-medium text-gray-700 mb-1">Judul Buku</label>
                <input type="text" name="judul_buku" id="judul_buku" value="{{ old('judul_buku') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
            </div>

            <div>
                <label for="kategori" class="block font-medium text-gray-700 mb-1">Kategori</label>
                <input type="text" name="kategori" id="kategori" value="{{ old('kategori') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
            </div>

            <div>
                <label for="pengarang" class="block font-medium text-gray-700 mb-1">pengarang
                <input type="text" name="pengarang" id="pengarang" value="{{ old('pengarang') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
            </div>

            <div>
                <label for="penerbit" class="block font-medium text-gray-700 mb-1">Penerbit</label>
                <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
            </div>

            <div>
                <label for="status" class="block font-medium text-gray-700 mb-1">Status</label>
                <select name="status" id="status"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
                    <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="dipinjam" {{ old('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                </select>
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-indigo-600 text-white font-semibold py-2 rounded hover:bg-indigo-700 transition">
                    Simpan Buku
                </button>
            </div>
        </form>
    </div>
</x-layout>
