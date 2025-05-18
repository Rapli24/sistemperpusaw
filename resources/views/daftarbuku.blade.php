<x-layout title="Daftar Buku">
    <div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow-md border border-gray-200">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-indigo-700">📚 Daftar Buku</h1>
            <a href="{{ route('buku.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded shadow text-sm font-semibold">
                ➕ Tambah Buku
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-indigo-100 text-left">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Judul</th>
                    <th class="border px-4 py-2">Kategori</th>
                    <th class="border px-4 py-2">Pengarang</th>
                    <th class="border px-4 py-2">Penerbit</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bukus as $buku)
                    <tr class="bg-white hover:bg-gray-50 transition">
                        <td class="border px-4 py-2">{{ $buku->id }}</td>
                        <td class="border px-4 py-2">{{ $buku->judul_buku }}</td>
                        <td class="border px-4 py-2">{{ $buku->kategori }}</td>
                        <td class="border px-4 py-2">{{ $buku->pengarang }}</td>
                        <td class="border px-4 py-2">{{ $buku->penerbit }}</td>
                        <td class="border px-4 py-2">
                            <span class="px-2 py-1 rounded-full text-sm {{ $buku->status === 'tersedia' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                                {{ ucfirst($buku->status) }}
                            </span>
                        </td>
                        <td class="border px-4 py-2 text-center space-x-2">
                            <!-- Tombol Edit -->
                            <a href="{{ route('buku.edit', $buku->id) }}"
                               class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                                ✏️ Edit
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="inline-block"
                                  onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="border px-4 py-2 text-center text-gray-500">Tidak ada data buku.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>
