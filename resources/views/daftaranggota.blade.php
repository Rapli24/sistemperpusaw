<x-layout title="Daftar Anggota">
    <div class="max-w-5xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-indigo-700">Daftar Anggota</h1>
        
        <a href="{{ route('anggota.create') }}" 
           class="mb-4 inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
            ➕ Tambah Anggota
        </a>

        <table class="min-w-full border border-gray-200 divide-y divide-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">Alamat</th>
                    <th class="px-4 py-2 text-left">Jenis Kelamin</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($anggota as $index => $a)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $a->nama }}</td>
                        <td class="px-4 py-2">{{ $a->alamat }}</td>
                        <td class="px-4 py-2">{{ $a->jenis_kelamin }}</td>
                        <td class="px-4 py-2">{{ $a->status }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('anggota.edit', $a->id) }}" 
                               class="text-indigo-600 hover:text-indigo-800 font-medium">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('anggota.destroy', $a->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus anggota ini?');">
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
                        <td colspan="6" class="text-center py-4">Belum ada data anggota.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>
