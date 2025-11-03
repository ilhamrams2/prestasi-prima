@extends('layouts.admin')

@section('title', 'Tambah Staff')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Tambah Staff Baru</h2>

    <form action="{{ route('prestasiprima.admin.staff.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Nama</label>
            <input type="text" name="nama" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Jabatan</label>
            <input type="text" name="jabatan" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Kategori</label>
            <select name="kategori" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="kepala">Kepala Sekolah</option>
                <option value="kaprog">Kaprog</option>
                <option value="kesiswaan">Kesiswaan</option>
                <option value="guru_mapel">Guru Mapel</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Foto</label>
            <input type="file" name="foto" class="w-full" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Kutipan (Opsional)</label>
            <textarea name="kutipan" class="w-full border border-gray-300 rounded-lg px-3 py-2" rows="3"></textarea>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('prestasiprima.admin.staff.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</a>
            <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600">Simpan</button>
        </div>
    </form>
</div>
@endsection
