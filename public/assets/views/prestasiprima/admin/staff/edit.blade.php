@extends('layouts.admin')

@section('title', 'Edit Staff')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Staff</h2>

    <form action="{{ route('prestasiprima.admin.staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Nama</label>
            <input type="text" name="nama" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ $staff->nama }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Jabatan</label>
            <input type="text" name="jabatan" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ $staff->jabatan }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Kategori</label>
            <select name="kategori" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                <option value="kepala" {{ $staff->kategori == 'kepala' ? 'selected' : '' }}>Kepala Sekolah</option>
                <option value="kaprog" {{ $staff->kategori == 'kaprog' ? 'selected' : '' }}>Kaprog</option>
                <option value="kesiswaan" {{ $staff->kategori == 'kesiswaan' ? 'selected' : '' }}>Kesiswaan</option>
                <option value="guru_mapel" {{ $staff->kategori == 'guru_mapel' ? 'selected' : '' }}>Guru Mapel</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Foto Saat Ini</label>
            <img src="{{ asset('storage/staff/' . $staff->foto) }}" alt="{{ $staff->nama }}" class="w-24 h-28 object-cover rounded mb-2">
            <input type="file" name="foto" class="w-full">
            <small class="text-gray-500">Kosongkan jika tidak ingin mengganti foto</small>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Kutipan (Opsional)</label>
            <textarea name="kutipan" class="w-full border border-gray-300 rounded-lg px-3 py-2" rows="3">{{ $staff->kutipan }}</textarea>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('prestasiprima.admin.staff.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</a>
            <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Update</button>
        </div>
    </form>
</div>
@endsection
