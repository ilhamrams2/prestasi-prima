@extends('layouts.admin')

@section('title', 'Tambah Prestasi')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-6">
  <h3 class="text-lg font-semibold text-gray-800 mb-4">Tambah Prestasi Baru</h3>

  <form action="{{ route('prestasiprima.admin.prestasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf

    <div>
      <label class="block font-medium text-gray-700 mb-2">Judul</label>
      <input type="text" name="judul" value="{{ old('judul') }}"
             class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:outline-none">
      @error('judul') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block font-medium text-gray-700 mb-2">Deskripsi</label>
      <textarea name="deskripsi" rows="4"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:outline-none">{{ old('deskripsi') }}</textarea>
      @error('deskripsi') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block font-medium text-gray-700 mb-2">Gambar</label>
      <input type="file" name="gambar"
             class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:outline-none">
      @error('gambar') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex justify-end gap-3">
      <a href="{{ route('prestasiprima.admin.prestasi.index') }}"
         class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition">
        Batal
      </a>
      <button type="submit"
              class="px-5 py-2 rounded-lg bg-orange-600 text-white hover:bg-orange-500 transition">
        Simpan
      </button>
    </div>
  </form>
</div>
@endsection
