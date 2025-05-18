<x-layout title="Daftar Transaksi">
    <div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow-md border border-gray-200">
        <h1 class="text-3xl font-bold text-indigo-700 mb-6">📋 Daftar Transaksi</h1>
        <a href="{{ route('transaksi.create') }}" 
           class="block px-4 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('transactions.*') ? 'bg-gray-200 font-semibold' : '' }}">
            Tambah Transaksi
        </a>
        <table class="w-full table-auto border-collapse border border-gray-300 mt-4">
            <thead>
                <tr class="bg-indigo-100 text-indigo-800">
                    <th class="border border-gray-300 px-4 py-2 text-left">Anggota</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Buku</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Tanggal Pinjam</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Tanggal Kembali</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksis as $transaksi)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $transaksi->anggota->nama }}</td>
                        <td class="border px-4 py-2">{{ $transaksi->buku->judul_buku }}</td>
                        <td class="border px-4 py-2">{{ $transaksi->tglpinjam->format('d-m-Y') }}</td>
                        <td class="border px-4 py-2">
                            @if ($transaksi->tglkembali)
                                {{ $transaksi->tglkembali->format('d-m-Y') }}
                            @else
                                <span class="text-gray-400 italic">-</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('transaksi.edit', $transaksi->id) }}" 
                               class="text-indigo-600 hover:text-indigo-800 font-medium">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus transaksi ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500 italic">Tidak ada transaksi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>
