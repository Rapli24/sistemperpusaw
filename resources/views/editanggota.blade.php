<x-layout title="Edit Anggota">
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-indigo-700">Edit Anggota</h1>

        @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">{{ session('error') }}</div>
        @endif

        <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="nama" class="block font-medium mb-1">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $anggota->nama) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2" required>
                @error('nama')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="alamat" class="block font-medium mb-1">Alamat</label>
                <textarea name="alamat" id="alamat" class="w-full border border-gray-300 rounded px-3 py-2" required>{{ old('alamat', $anggota->alamat) }}</textarea>
                @error('alamat')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="jenis_kelamin" class="block font-medium mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="pria" {{ old('jenis_kelamin', $anggota->jenis_kelamin) == 'pria' ? 'selected' : '' }}>Pria</option>
                    <option value="wanita" {{ old('jenis_kelamin', $anggota->jenis_kelamin) == 'wanita' ? 'selected' : '' }}>Wanita</option>
                </select>
                @error('jenis_kelamin')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block font-medium mb-1">Status</label>
                <select name="status" id="status" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="aktif" {{ old('status', $anggota->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="tidak aktif" {{ old('status', $anggota->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                @error('status')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                Simpan Perubahan
            </button>
        </form>
    </div>
</x-layout>
